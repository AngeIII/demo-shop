@if ($date)
    <span title="{{ readableTimeDifference($date->timestamp) }}">
        <?php

        if ($date->isToday()) {
            $datePart = 'Today';
        } elseif ($date->isYesterday()) {
            $datePart = 'Yesterday';
        } else {
            if ($date->format('Y') === date('Y')) {
                $format = 'M j';
            } else {
                $format = 'M j, Y';
            }

            $datePart = $date->format($format);
        }

        $datetime = $datePart . ' at ' . $date->format('g:ia');

        ?>
        {{ $datetime }}
    </span>
    @else
    &mdash;
@endif