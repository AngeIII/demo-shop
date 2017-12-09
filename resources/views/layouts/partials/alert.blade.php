@foreach (['danger', 'warning', 'success', 'info'] as $type)
    @if(Session::has('alert-' . $type))
        <br/>
        <div class="alert alert-{{ $type }}">
            {{ Session::get('alert-' . $type) }}
        </div>
    @endif
@endforeach