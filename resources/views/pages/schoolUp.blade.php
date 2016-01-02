{{--程序名：schoolUp.blade.php--}}
{{--功能：校团委上报作品页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminSchool')
@section('content')
    <div class="row">
        <h1>上传作品申报书</h1>
        {!! Form::open(['url'=>'/work/pdf','files'=>true,'id'=>'myform']) !!}
        <input type="hidden" name="info_id" value="3">
        <div class="form-group">
            {!! Form::label('document','请上传pdf格式的申报书：') !!}
            {!! Form::file('document') !!}
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
    </div>
    <!-- /.row -->
@endsection