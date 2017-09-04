@extends('main')

@section('content')
<div id="app">
    <div class="row _flex-spaced _flex-align-start">
        <div class="col-5 _f-orderindex-margin">
            <productspreview></productspreview>
        </div>
        <div class="col-5 _f-orderindex-margin">
            <sellsreport></sellsreport>
        </div>
        <div class="col-5 _f-orderindex-margin">
            <latestsorders></latestsorders>
        </div>
        <div class="col-5 _f-orderindex-margin">
            <employeespreview></employeespreview>
        </div>
    </div>
</div>

@endsection
