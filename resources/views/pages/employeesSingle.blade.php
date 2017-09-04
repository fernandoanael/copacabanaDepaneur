@extends('main')

@section('content')

<div class="row justify-content-center">
    <div class="col-5 _f-single-product-container">
        {!! Form::model($employee, ['method'=>'PUT', 'route' => ['employees.update', $employee->id]]) !!}
        <div class="row">
            <div class="col-12">
                {{Form::text('name',null,['class' => '_f-name-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('tel', 'Tel: ')}}
                {{Form::text('tel', null, ['class' => '_f-ghost-input _f-employees-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('address', 'Address: ')}}
                {{Form::text('address', null, ['class' => '_f-ghost-input _f-employees-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('salary', 'Salary: ')}}
               $ {{Form::text('salary', null, ['class' => '_f-ghost-input _f-employees-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('position', 'position: ')}}
                {{Form::text('position', null, ['class' => '_f-ghost-input _f-employees-input'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <a href="{{Route('employees.index')}}" class="btn btn-dark btn-block">
                    Back 
                </a>
            </div>
            <div class="col-6">
                {{Form::submit('Save', ['class' => 'btn btn-success btn-block _f-products-btn-save'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <a href="{{Route('employees.delete',$employee->id)}}" class=" _f-products-delete-btn">
                    Fire
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>



@endsection