@extends('layouts.default')
@section('content')
    @include('partials.title', [
        'title' => 'Orders',
        'search' => true
    ])
    @include('partials.add', ['title'=>'Add new Order','controller' => 'orders'])


    @include('partials.list', [
        'items' => $items,
        'sortable' => true
    ])

    @if ($items->count())
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $items->appends(Request::all())->render() !!}
            </div>

            <div class="pagination-info">
                Total: {{ number_format($items->total()) }} entries
            </div>
        </div>
    @endif
@endsection