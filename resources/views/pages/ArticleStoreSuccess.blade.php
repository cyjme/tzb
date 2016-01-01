{{--程序名：articleStoreSuccess.blade.php--}}
{{--功能：文章发布成功页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminProvince')
@section('content')
    <h1>发布成功</h1>
    <p>点击按钮继续发布信息</p>
    <a href="/admin/newArticle"><button>继续发布</button></a>
    @endsection