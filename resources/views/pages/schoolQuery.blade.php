{{--程序名：schoolQuery.blade.php--}}
{{--功能：校团委查看作品详情页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminSchool')
@section('content')
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">作品详细信息</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            作品名称：
            {{$result->workName}}<br>
            作品类别（大类）：
            {{$result->big_class}}<br>
            作品类别（小类）：
            {{$result->small_class}}<br>
            作品目的：
            {{$result->aim}}<br>
            作品简介：
            {{$result->brief}}<br>
            作品详细介绍：
            {{$result->detailed}}<br>
            作品论文文档：
            {{$result->document_address}}<br>
            作品附加材料：
            {{$result->materials_address}}<br>
            作品图片：
            {{$result->image_address}}<br>
            <h3>申报人信息</h3>
            姓名：
            {{$result->applicantName}}<br>
            院系：
            {{$result->faculty}}<br>
            身份证号：
            {{$result->card_id}}<br>
            年级：
            {{$result->grade}}<br>
            学制：
            {{$result->school_years}}<br>
            性别：
            {{$result->sex}}<br>
            专业：
            {{$result->major}}<br>
            地址：
            {{$result->address}}<br>
            作品状态：
            {{$result->status}}<br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3>设置作品状态：</h3>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-5">
                <input type="hidden" id="workId" value="{{$result->workId}}">
                <select class="form-control" id="statusSelect">
                    <option value="schoolWait">等待审核</option>
                    <option value="schoolPass">审核通过</option>
                    <option value="schoolAlter">需要修改</option>
                    <option value="schoolNot">淘汰</option>
                </select>
            </div>

            <button class="btn btn-primary" id="setButton">设置状态</button>
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
                    url:'/admin/schoolSetStatus',
                    data:{workId:workId,status:status,_token:token},
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