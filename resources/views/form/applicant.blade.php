{{--程序名：applicant.blade.php--}}
{{--功能：申报人信息页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    <div class="row" style="margin-bottom: 100px;">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    填写申报人信息
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'/applicant/store','id'=>'myform']) !!}
                    <div class="form-group">
                        {!! Form::label('name','姓名：') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('sex','性别：') !!}
                        {!! Form::radio('sex','男') !!}男
                        {!! Form::radio('sex','女') !!}女

                    </div>
                    <div class="form-group">
                        {!! Form::label('card_id','身份证号：') !!}
                        {!! Form::text('card_id',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <fieldset id="city_china">
                            <legend>学校</legend>
                            省份：<select class="province"></select>
                            城市：<select class="city"></select>
                            学校：<select class="area" name="school"></select>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        {!! Form::label('faculty','院系：') !!}
                        {!! Form::text('faculty',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('major','专业：') !!}
                        {!! Form::text('major',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('grade','年级：') !!}
                        {!! Form::select('grade',['13级'=>'13级','14级'=>'14级','15级'=>'15级'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('school_years','学制：') !!}
                        {!! Form::select('school_years',['两年制'=>'两年制','三年制'=>'三年制','四年制'=>'四年制','五年制'=>'五年制'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address','地址：') !!}
                        {!! Form::text('address',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('提交',['class'=>'btn btn-success form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery2.1.min.js"></script>
    <script src="/js/jquery.cxselect.min.js"></script>
    <script>
        $.cxSelect.defaults.url = '/js/cityData.json';
        $('#city_china').cxSelect({
            selects: ['province', 'city', 'area']
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myform').bootstrapValidator({
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: '姓名不能为空'
                            }
                        }
                    },
                    sex: {
                        validators: {
                            notEmpty:{
                                message:'请选择性别'
                            }
                        }
                    },
                    card_id:{
                    validators: {
                        notEmpty:{
                            message:'请输入身份证号码'
                            }
                        }
                    },
                    school:{
                        validators: {
                            notEmpty:{
                                message:'请选择学校'
                            }
                        }
                    },
                    faculty: {
                        validators: {
                            notEmpty:{
                            message:'请输入院系'    
                            }
                        }
                    },
                    major:{
                        validators: {
                            notEmpty:{
                            message:'请输入专业'
                            }
                        }
                    },
                    grade:{
                        validators: {
                            notEmpty:{
                            message:'请选择年级'
                            }
                        }
                    },
                    school_years:{
                        validators: {
                            notEmpty:{
                            message:'请选择年制'
                            }
                        }
                    },
                    address:{
                        validators: {
                            notEmpty:{
                                message:'请输入地址'
                            }
                        }
                    },
                },
            });
        });
    </script>
    @endsection