@extends('layouts.adminProvince')
@section('content')
    <div class="row">
            <h1>发布内部通知</h1>
            <p>
                该通知消息只有各学校团委可以看到！
            </p>
            <hr>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['url'=>'admin/storeInformation']) !!}
                <div class="form-group">
                    {!! Form::label('title','标题：') !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content','内容：') !!}
                    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('确认发布',['class'=>'btn btn-success form-control']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        
    </div>
    @endsection