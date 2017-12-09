{!! Form::open(['method' => 'GET', 'class' => 'search-form'] ) !!}
<div class="input-group">
    {!! Form::select('type', [0 => 'All Time', 1 => 'Last 7 Days', 2 => 'Today'], Request::get('type'), ['class' => 'form-control', 'title'=>'Search date interval']) !!}
    {!! Form::text('q', Request::get('q'), ['class' => 'form-control', 'placeholder'=>'Search by user or product', 'title'=>'Search by user or product']) !!}
    <div class="input-group-addon">
        <button type="submit" class="btn"><span class="fa fa-search"></span>
        </button>
    </div>
</div>
{!! Form::close() !!}