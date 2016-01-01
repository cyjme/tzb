{{--程序名：addSpecialist.blade.php--}}
{{--功能：添加专家页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminProvince')
@section('content')
    <div class="row">
        <h1>添加专家信息</h1>
        <hr>
    </div>


    {!! Form::open(['url'=>'/admin/storeSpecialist']) !!}
        <div class="form-group">
            {!! Form::label('name','姓名：') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','邮箱：') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone','联系电话：') !!}
            {!! Form::text('phone',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('unit','单位：') !!}
            {!! Form::text('unit',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('good_field','擅长领域：') !!}
            {!! Form::text('good_field',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('class','对应挑战杯类别：') !!}
            {!! Form::text('class',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('添加',['class'=>'btn btn-success form-control']) !!}
        </div>
    {!! Form::close() !!}
    @endsection