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
    <a href="{{Route('employees.new')}}" class="_f-new-btn"> New Employee </a>
</div>
<div id="app">
    <employeesindex></employeesindex>
</div>

@endsection