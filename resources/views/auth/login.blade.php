{{--程序名：login.blade.php--}}
{{--功能：登录页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2--}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    {{--可以让myform逐渐出现，为myform  加上style="display:none;"--}}
    {{--<script>--}}
        {{--$(function(){--}}
            {{--$("#myform").fadeIn(1000);--}}
        {{--});--}}
    {{--</script>--}}
{!! csrf_field() !!}
<div id="myform" class="col-lg-4 col-lg-offset-4" >
    <div class="panel panel-default">
        <div class="panel-heading">
            <span style="font-family:sans-serif;font-size:20pt;font-weight: bolder;">登录</span>
        </div>
        <div class="panel-body">
            {!! Form::open(['url'=>'/auth/login']) !!}

            <div class="form-group">
                {!! Form::label('email','Email：') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','密码：') !!}<br>
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::checkbox('remember','remember') !!}记住密码
            </div>

            <div class="form-group">
                {!! Form::submit('登录',['class'=>'btn btn-success form-control']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection


