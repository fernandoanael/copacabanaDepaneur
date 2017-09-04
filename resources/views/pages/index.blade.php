@extends('main')

@section('content')
<div id="app">
    <div class="row _flex-spaced _flex-align-start">
        <div class="col-5">
            <productspreview></productspreview>
        </div>
        <div class="col-5">
            <sellsreport></sellsreport>
        </div>
        <div class="col-5">
            <latestsorders></latestsorders>
        </div>
        <div class="col-5">
            <employeespreview></employeespreview>
        </div>
    </div>
</div>

@endsection
