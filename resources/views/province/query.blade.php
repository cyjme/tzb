@extends('layouts.adminProvince')
@section('content')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <style>
        .form-group{
            margin-top: 27px;
            font-size: large;
        }
    </style>

    <div class="row">
        <h1>作品详情</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('','作品名称：') !!}
                {{$data->name}}
            </div>
            <div class="form-group">
                {!! Form::label('','作品类别：') !!}
                {{$data->big_class}}<br>
            </div>
            <div class="form-group">
                {!! Form::label('','申报人：') !!}
                {{$data->people}}<br>
            </div>
            <div class="form-group">
                {!! Form::label('','作品撰写目的：') !!}
                <br>
                {{$data->aim}}
            </div>
            <div class="form-group">
                {!! Form::label('','作品的科学性、先进性及独特之处：：') !!}
                <br>
                {{$data->brief}}
            </div>
            <div class="form-group">
                {!! Form::label('','文档下载：') !!}
                <a href="/admin/download/{{$data->document_name}}"><button class="btn btn-success">点击下载</button></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3>设置作品奖项：</h3>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-5">
                <input type="hidden" id="workId" value="{{$data->id}}">
                <select class="form-control" id="statusSelect">
                    <option value="yi">一等奖</option>
                    <option value="er">二等奖</option>
                    <option value="san">三等奖</option>
                </select>
            </div>
            <button class="btn btn-primary" id="setButton">设置奖项</button>
        </div>
    </div>

    <div class="row" style="height: 250px;">
    </div>

    <script src="/js/jquery.min.js"></script>
    <script>
        $(function(){
            $("#setButton").click(function(){
                var status = document.getElementById('statusSelect').value;
                var workId = document.getElementById('workId').value;
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'/admin/setReward',
                    data:{workId:workId,award:status,_token:token},
                    success:function(){
                        alert('设置成功');
                    },
                    error:function(){
                        alert('设置失败');
                    }
                });
            });
        });
    </script>
    @endsection