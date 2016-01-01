{{--程序名：userPower.blade.php--}}
{{--功能：列出所有管理员页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：1级（重要，权限控制）--}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    <h1>学校管理员</h1>
    <table class="table">
        <tr>
            <th>姓名</th>
            <th>邮箱</th>
        </tr>
        @foreach($schoolAdmins as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
        </tr>
            @endforeach
    </table>

    <h1>省团委管理员</h1>
    <table class="table">
        <tr>
            <th>姓名</th>
            <th>邮箱</th>
        </tr>
        @foreach($provinceAdmins as $user)
            <tr>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
            </tr>
        @endforeach
    </table>

@endsection