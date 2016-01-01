{{--程序名：work_info3.blade.php--}}
{{--功能：作品信息提交页面3--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    {!! Form::open(['url'=>'work/store','files'=>true,'id'=>'myform']) !!}
    <input type="hidden" name="info_id" value="3">
    <div class="form-group">
        {!! Form::label('document','上传论文文档：') !!}
        {!! Form::file('document') !!}
    </div>
    <div class="form-group">
        {!! Form::label('materials','附加材料：') !!}
        {!! Form::file('materials') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('提交，进入下一步',['class'=>'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}


    <script src="/js/jquery2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myform').bootstrapValidator({
                fields: {
                    document: {
                        validators: {
                            notEmpty: {
                                message: '请上传论文文档'
                            }
                        }
                    },

                },
            });
        });
    </script>
@endsection
