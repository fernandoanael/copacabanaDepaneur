@extends('main')

@section('content')
<div class="row justify-content-center">
    <div class="col-5 _f-single-product-container">
        {!! Form::open(['method'=>'POST', 'route' => 'products.storeNew']) !!}
        <div class="row justify-content-center">
            <div class="col-12">
                <?php $error = $errors->has('name') ? ' _f-products-name-error ' : '' ; ?>
                {{Form::text('name',null,['class' => '_f-name-input'.$error , 'placeholder' => 'ProductName'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5 _f-products-info">
                {{Form::label('price', 'Price: ')}}
               $ {{Form::text('price', null, ['class' => '_f-ghost-input _f-products-input', 'placeholder' => '0.00'])}}
            @if($errors->has('price'))
                </br>
                <small class="text-danger text-center">{{ $errors->first('price') }}</small>
            @endif
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-5 _f-products-info">
                {{Form::label('cost', 'Cost: ')}}
               $ {{Form::text('cost', null, ['class' => '_f-ghost-input _f-products-input', 'placeholder' => '0.00'])}}
            @if($errors->has('cost'))
                </br>
                <small class="text-danger text-center">{{ $errors->first('cost') }}</small>
            @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5 _f-products-info">
                {{Form::label('stock', 'Stock: ')}}
                {{Form::text('stock', null, ['class' => '_f-ghost-input _f-products-input', 'placeholder' => '0'])}}
            @if($errors->has('stock'))
                </br>
                <small class="text-danger text-center">{{ $errors->first('stock') }}</small>
            @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <a href="{{Route('products.index')}}" class="btn btn-dark btn-block">
                    Back 
                </a>
            </div>
            <div class="col-6">
                {{Form::submit('Save', ['class' => 'btn btn-success btn-block'])}}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection