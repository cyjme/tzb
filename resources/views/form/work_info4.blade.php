{{--程序名：work_info4.blade.php--}}
{{--功能：作品信息提交页面4--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    {!! Form::open(['url'=>'/work/store','files'=>true]) !!}
    <input type="hidden" name="info_id" value="4">
    <div class="form-group">
        {!! Form::label('image_address','作品图片：') !!}
        {!! Form::file('image') !!}
    </div>
    <div class="form-group">
        {!! Form::label('video_address','作品视频：') !!}
        {!! Form::file('video') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('提交，进入下一步',['class'=>'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection