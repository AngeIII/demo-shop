<?php

use Illuminate\Support\Facades\Request;

/**
 * Generate sorter link.
 *
 * @param string $field
 * @param string $title
 * @param string $default asc|desc.
 *
 * @return string
 */
function sorterLink($field, $title = null, $default = 'desc')
{
    $sort = explode(',', Request::get('sort'));
    $attributes = ['class' => 'sorter'];

    if ($title === null) {
        $title = ucfirst(str_replace('_', ' ', $field));
    }

    if (count($sort) !== 2) {
        $sort = ['', ''];
    }

    $active = $sort[0] === $field;

    if ($active) {
        $order = $sort[1] === 'desc' ? 'asc' : 'desc';
        $attributes['class'] .= ' sorted-' . $sort[1];
    } else {
        $order = $default;
    }

    $query = array_merge(
        Request::query(),
        ['sort' => $field . ',' . $order]
    );

    $url = request()->url();

    if ($query) {
        $url .= '?' . http_build_query($query);
    }

    return link_to($url, $title, $attributes);
}

/**
 * Return readable time difference.
 *
 * @param mixed $datetime
 *
 * @return string
 */
function readableTimeDifference($datetime)
{
    if ($datetime instanceof Carbon\Carbon) {
        return $datetime->diffForHumans();
    }

    $timestamp = is_numeric($datetime) ? $datetime : strtotime($datetime);

    return Carbon\Carbon::createFromTimestamp($timestamp)->diffForHumans();
}
