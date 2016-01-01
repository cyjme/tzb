{{--程序名：schoolUp.blade.php--}}
{{--功能：校团委上报作品页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminSchool')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>当点击‘确认上报’按钮后，即将将本校的‘审核通过作品’上报至省团委</h2>
        </div>
        <div class="col-lg-12">
            <a href="/admin/schoolUpStore"><button class="btn btn-danger">确认上报</button></a>
        </div>
    </div>
    <!-- /.row -->
@endsection