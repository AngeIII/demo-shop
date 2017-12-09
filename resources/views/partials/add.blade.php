<?php

$title = !empty($title) ? $title : 'Add new';

if (!empty($controller)) {
    $url = route($controller . '.create');
} elseif (empty($url)) {
    throw new Exception('Missing one of required params: `$url` or `$controller`.');
}

?>
<div>
    <a href="{{ $url }}" class="btn btn-primary">
        <span class="fa fa-plus"></span> {{ $title }}
    </a>
</div>
<br/>