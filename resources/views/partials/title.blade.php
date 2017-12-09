@section('pageTitle')
    {{ $title }}
@endsection

@section('title')
    @if (!empty($search))
        <div class="row">
            <div class="col-md-3">
                {{ $title }}
                @if (isset($action))
                    <small>{{ $action }}</small>
                @endif
            </div>
            <div class="offset-md-5 col-md-4">
                @include('partials.search')
            </div>
        </div>
    @else
        {{ $title }}
        @if (isset($action))
            <small>{{ $action }}</small>
        @endif
    @endif
@stop