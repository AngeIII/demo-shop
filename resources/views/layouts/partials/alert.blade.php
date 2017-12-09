@foreach (['danger', 'warning', 'success', 'info'] as $type)
    @if(Session::has('alert-' . $type))
        <br/>
        <div class="alert alert-{{ $type }}">
            {{ Session::get('alert-' . $type) }}
        </div>
    @endif
@endforeach
@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif