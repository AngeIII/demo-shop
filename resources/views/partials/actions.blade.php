<?php

if (!isset($controller)) {
    throw new \Exception('$controller not specified');
}

if (!isset($disabled)) {
    $disabled = [];
}

?>
<div class="action-buttons">
    @foreach ($buttons as $button)

        {{-- Custom button. Just output everything as is. --}}
        @if (substr($button, 0, 1) === '!')
            {!! substr($button, 1) !!}
        @endif

        @if ($button === 'empty')
            <span class="btn btn-empty"><i class="fa fa-circle"></i></span>
        @endif

        @if ($button === 'show')
            @if (in_array($button, $disabled))
                <span class="btn btn-default disabled"><i class="fa fa-eye"></i></span>
            @else
                <a href="/{{ $controller }}/{{ $item->id }}" class="btn btn-default" title="Show">
                    <i class="fa fa-eye"></i>
                </a>
            @endif
        @endif

        @if ($button === 'edit')
            @if (in_array($button, $disabled))
                <span class="btn btn-default disabled"><i class="fa fa-pencil"></i></span>
            @else
                <a href="/{{ $controller }}/{{ $item->id }}/edit" class="btn btn-default" title="Edit">
                    <i class="fa fa-pencil"></i>
                </a>
            @endif
        @endif

        @if ($button === 'delete')
            @if (in_array($button, $disabled))
                <span class="btn btn-default disabled"><i class="fa fa-trash"></i></span>
            @else
                {!! Form::open(['route' => [$controller.'.destroy', $item->id], 'method' => 'DELETE', 'data-confirm' => 1]) !!}
                <button type="submit" class="btn btn-primary" title="Delete">
                    <i class="fa fa-trash"></i>
                </button>
                {!! Form::close() !!}
            @endif
        @endif

    @endforeach
</div>