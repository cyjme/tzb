@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    注意
                </div>
                <div class="panel-body" align="center" style="font-size: larger;">
                    您的申报作品信息已提交。<br><br>
                    返回主页后，可以在导航栏中查看自己的作品状态。
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="/">
            <div class="col-lg-2 col-lg-offset-5">
                <button class="btn btn-success btn-block">
                    返回主页
                </button>
            </div>
        </a>

    </div>
    @endsection