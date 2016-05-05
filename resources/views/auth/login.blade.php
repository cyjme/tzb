@extends('layouts.main')
@section('content')
    {{--可以让myform逐渐出现，为myform  加上style="display:none;"--}}
    {{--<script>--}}
        {{--$(function(){--}}
            {{--$("#myform").fadeIn(1000);--}}
        {{--});--}}
    {{--</script>--}}
{!! csrf_field() !!}
<div  class="col-lg-4 col-lg-offset-4" >
    <div class="panel panel-default">
        <div class="panel-heading">
            <span style="font-family:sans-serif;font-size:20pt;font-weight: bolder;">登录</span>
        </div>
        <div class="panel-body">
            {!! Form::open(['url'=>'/auth/login','id'=>'myform']) !!}

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

    <script src="/js/jquery2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myform').bootstrapValidator({
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: '邮件地址不能为空'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            }
                        }
                    },


                },
            });
        });
    </script>

@endsection


