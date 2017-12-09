@extends('layouts.default')

@include('partials.title', [
    'title' => 'Order',
    'action' => 'Add'
])

@section('content')
    <div class="text-left"><a href="{{ route('orders.index') }}">&longleftarrow; Go Back</a></div>
    {!! Form::open(['route' => ['orders.store'], 'method' => 'POST', 'class' => 'box text-left']) !!}

    <div class="box-body">
        <div class="form-group @if ($errors->has('user_id')) has-error @endif">
            {!! Form::label('user_id', 'User*') !!}
            {!! Form::select('user_id', App\User::getList(), null, [
                'class' => 'form-control chosen-select',
                'placeholder'=>'Select user',
                'title'=>'Select user',
                'required' => false
            ]) !!}
        </div>
        <div class="form-group @if ($errors->has('product_id')) has-error @endif">
            {!! Form::label('product_id', 'Product*') !!}
            {!! Form::select('product_id', App\Product::getList(), null, [
                'class' => 'form-control chosen-select',
                'placeholder' => 'Select product',
                'title' => 'Select product',
                'required' => false
            ]) !!}
        </div>
        <div class="form-group @if ($errors->has('count')) has-error @endif">
            {!! Form::label('count', 'Quantity*') !!}
            {!! Form::number('count', 1, [
                'class' => 'form-control',
                'placeholder' => '',
                'title' => 'Input the items count',
                'min'=>'1',
                'required' => true
            ]) !!}
        </div>
        <div class="form-group">
            <label>Total</label>
            <div class="text-muted" data-target="sum">0</div>
        </div>
    </div>

    <div class="box-footer">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection