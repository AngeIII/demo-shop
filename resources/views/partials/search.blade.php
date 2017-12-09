{!! Form::open(['method' => 'GET', 'class' => 'search-form'] ) !!}
<div class="input-group">
    {!! Form::text('q', Request::get('q'), ['class' => 'form-control']) !!}
    <div class="input-group-addon">
        <button type="submit" class="btn"><span class="fa fa-search"></span>
        </button>
    </div>
</div>
{!! Form::close() !!}