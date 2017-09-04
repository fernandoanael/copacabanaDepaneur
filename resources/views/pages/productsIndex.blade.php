@extends('main')

@section('content')

<div class="_f-flex-center">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
    @endif
</div>

<div class="_f-flex-center">
    <a href="{{Route('products.new')}}" class="_f-new-btn"> New Product </a>
</div>

<div id="app">
    <productsindex></productsindex>
</div>


@endsection
