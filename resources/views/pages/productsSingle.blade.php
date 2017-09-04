@extends('main')

@section('content')

<div class="row justify-content-center">
    <div class="col-5 _f-single-product-container">
        {!! Form::model($product, ['method'=>'PUT', 'route' => ['products.update', $product->id]]) !!}
        <div class="row">
            <div class="col-12">
                {{Form::text('name',null,['class' => '_f-name-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5 _f-products-info">
                {{Form::label('price', 'Price: ')}}
               $ {{Form::text('price', null, ['class' => '_f-ghost-input _f-products-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5 _f-products-info">
                {{Form::label('cost', 'Cost: ')}}
               $ {{Form::text('cost', null, ['class' => '_f-ghost-input _f-products-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5 _f-products-info">
                {{Form::label('stock', 'Stock: ')}}
                {{Form::text('stock', $product->stock->quantity, ['class' => '_f-ghost-input _f-products-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <a href="{{Route('products.index')}}" class="btn btn-dark btn-block">
                    Back 
                </a>
            </div>
            <div class="col-6">
                {{Form::submit('Save', ['class' => 'btn btn-success btn-block _f-products-btn-save'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <a href="{{Route('products.delete',$product->id)}}" class=" _f-products-delete-btn">
                    Delete
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>



@endsection