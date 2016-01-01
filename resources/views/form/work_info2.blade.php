{{--程序名：work_info2.blade.php--}}
{{--功能：作品信息提交页面2--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    <div class="row" style="margin-bottom:100px;">
        {!! Form::open(['url'=>'work/store','id'=>'myform']) !!}
        <input type="hidden" name="info_id" value="2">
        <div class="form-group">
            {!! Form::label('aim','目的：') !!}
            {!! Form::text('aim',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('brief','简介：') !!}

            {!! Form::textarea('brief',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('detailed','详细介绍：') !!}
            {!! Form::textarea('detailed',null,['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('提交，进入下一步',['class'=>'btn btn-success form-control']) !!}
        {!! Form::close() !!}
    </div>
    <script src="/js/jquery2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myform').bootstrapValidator({
                fields: {
                    aim: {
                        validators: {
                            notEmpty: {
                                message: '作品名称不能为空'
                            }
                        }
                    },
                    brief:{
                        validators: {
                            notEmpty:{
                                message:'请填写作品简介'
                            }
                        }
                    },
                    detailed:{
                        validators: {
                            notEmpty:{
                                message:'请填写作品详细介绍'
                            }
                        }
                    },

                },
            });
        });
    </script>
@endsection
