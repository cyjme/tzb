{{--程序名：newArticle.blade.php--}}
{{--功能：省团委发布文章页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：李孝川 18839965525--}}
{{--测试人：常元检 15649841368--}}
@extends('layouts.adminProvince')
@section('content')
    <div class="row">
        <h1>发布文章</h1>
        <hr>
    </div>

    {!! Form::open(['url'=>'/admin/articleStore','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('type','请选择信息类型：') !!}
            {!! Form::select('type',['news'=>'新闻','notice'=>'公告','know'=>'了解','show'=>'展示','banner'=>'轮播图']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('title','请输入文章标题：') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content','请输入文章内容：') !!}
            <br>
            {!! Form::textArea('content',null,['class'=>'from-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('img','请选择图片：') !!}
            {!! Form::file('img',null) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('发布文章',['class'=>'btn btn-success form-control']) !!}
        </div>
    {!! Form::close() !!}
    @endsection