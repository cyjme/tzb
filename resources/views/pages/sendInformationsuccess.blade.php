{{--程序名：storeSpecialistSuccess.blade.php--}}
{{--功能：存储专家信息成功页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminProvince')
@section('content')
    <h1>发布成功</h1>
    <p>点击按钮继续发布</p>
    <a href="/admin/sendInformation"><button class="btn btn-success">继续发布</button></a>
@endsection