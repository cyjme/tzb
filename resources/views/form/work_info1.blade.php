{{--程序名：work_info1.blade.php--}}
{{--功能：作品信息提交页面1--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12" >
            <h1>作品名称与类别</h1>
            {!! Form::open(['url'=>'work/store','id'=>'myform']) !!}
            <input type="hidden" name="info_id" value="1">
            <div class="form-group">
                {!! Form::label('name','作品名称：') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('big_class','大类：') !!}
                {!! Form::select('big_class',[
                '自然科学类学术论文'=>'自然科学类学术论文',
                '哲学社会科学类社会调查报告和学术论文'=>'哲学社会科学类社会调查报告和学术论文',
                '科技发明制作'=>'科技发明制作',
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('small_class','小类：') !!}
                {!! Form::select('small_class',['小类一'=>'小类一','小类二'=>'小类二']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('提交，进入下一步',['class'=>'btn btn-success form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script src="/js/jquery2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myform').bootstrapValidator({
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: '作品名称不能为空'
                            }
                        }
                    },
                },
            });
        });
    </script>
    @endsection