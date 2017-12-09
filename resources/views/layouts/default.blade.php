<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.partials.header')
<body>
@section('container')
    <div class="flex-center position-ref">
        <div class="content">
            <div class="links">
                <a href="https://laravel.com/docs" target="_blank">Documentation</a>
                <a href="https://www.linkedin.com/in/pavel-ivanov-267965125/" target="_blank">Linked In</a>
                <a href="https://github.com/AngeIII/demo-shop">GitHub</a>
            </div>
            <div class="title m-b-md">
                <h1>@yield('title')</h1>
            </div>
            <section>
            </section>
            @include('layouts.partials.alert')
            @yield('content')
        </div>
    </div>
@show
@include('layouts.partials.scripts')
@include('layouts.partials.tracking')
</body>
</html>
