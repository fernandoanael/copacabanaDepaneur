@extends('main')

@section('content')
<div class="row justify-content-center">
    <div class="col-5 _f-single-product-container">
        {!! Form::open(['method'=>'POST', 'route' => 'employees.storeNew']) !!}
        <div class="row justify-content-center">
            <div class="col-12">
                <?php $error = $errors->has('name') ? ' _f-employees-name-error ' : '' ; ?>
                {{Form::text('name',null,['class' => '_f-name-input'.$error , 'placeholder' => 'Employee Name'])}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('tel', 'Tel: ')}}
                {{Form::text('tel', null, ['class' => '_f-ghost-input _f-employees-input', 'placeholder' => '(000)000-0000'])}}
            @if($errors->has('tel'))
                </br>
                <small class="text-danger text-center">{{ $errors->first('tel') }}</small>
            @endif
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('address', 'Address: ')}}
                {{Form::text('address', null, ['class' => '_f-ghost-input _f-employees-input', 'placeholder' => 'Montreal'])}}
            @if($errors->has('address'))
                </br>
                <small class="text-danger text-center">{{ $errors->first('address') }}</small>
            @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('salary', 'Salary: ')}}
                {{Form::text('salary', null, ['class' => '_f-ghost-input _f-employees-input', 'placeholder' => '0'])}}
            @if($errors->has('salary'))
                </br>
                <small class="text-danger text-center">{{ $errors->first('salary') }}</small>
            @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 _f-employees-info">
                {{Form::label('position', 'Position: ')}}
                {{Form::text('position', null, ['class' => '_f-ghost-input _f-employees-input', 'placeholder' => '0'])}}
            @if($errors->has('position'))
                </br>
                <small class="text-danger text-center">{{ $errors->first('position') }}</small>
            @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <a href="{{Route('employees.index')}}" class="btn btn-dark btn-block">
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