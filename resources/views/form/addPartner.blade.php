{{--程序名：addPartner.blade.php--}}
{{--功能：添加队伍成员页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加队友信息
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'/partner/store']) !!}
                    <div class="form-group">
                        {!! Form::label('name','姓名：') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('sex','性别：') !!}
                        {!! Form::select('sex',['男'=>'男','女'=>'女']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('school','学校：') !!}
                        {!! Form::select('school',[
                        '郑州大学'=>'郑州大学',
                        '许昌学院'=>'许昌学院',
                        '河南大学'=>'河南大学',
                        '河南理工大学'=>'河南理工大学',
                        '华北水利水电大学'=>'华北水利水电大学',
                        '安阳工学院'=>'安阳工学院',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('faculty','院系：') !!}
                        {!! Form::text('faculty',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('grade','年级：') !!}
                        {!! Form::select('grade',['13级'=>'13级','14级'=>'14级','15级'=>'15级'])!!}
                    </div>
                    {!! Form::submit('提交',['class'=>'btn btn-success form-control']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endsection