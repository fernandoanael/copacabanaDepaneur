<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('stylesheets')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light _f-bg-light">
        <a class="navbar-brand" href="{{Route('home')}}">Copacabana Depaneur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{Route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('orders.index')}}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('products.index')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('employees.index')}}">Employees</a>
            </li>
            </ul>
            <a href="{{Route('orders.new')}}" class="btn btn-success _f-btn-new-order">New Order</a>
        </div>
    </nav>
    <div class="container">