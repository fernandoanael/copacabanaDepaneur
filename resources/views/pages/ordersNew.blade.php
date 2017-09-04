@extends('main')

@section('content')

<div id="app">
    <div class="row _f-flex-spaced">
        <div class="col-7">
            <productsselector></productsselector>
        </div>
        <div class="col-4">
            <ordernewform></ordernewform>
        </div>
    </div>
</div>

@endsection