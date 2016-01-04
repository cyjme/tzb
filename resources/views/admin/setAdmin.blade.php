{{--程序名：setAdmin.blade.php--}}
{{--功能：设置管理员页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：1级（重要，权限控制）--}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.main')
@section('content')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <h1>设置管理员</h1>
    <table class="table">
        <tr>
            请输入用户邮箱：<input type="text" id="addEmail">
        </tr>
        <tr>
            请输入学校名称：<input type="text" id="addSchool">
        </tr>
        <tr>
            <button class="addAdmin">添加管理员</button>
        </tr>
    </table>


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
    <script src="/js/jquery2.1.min.js"></script>
    <script>
        $(function(){
            $(".addAdmin").click(function(){
                var addEmail = document.getElementById('addEmail').value;
                var addSchool = document.getElementById('addSchool').value;
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'/admin/addAdmin',
                    data: {email:addEmail,school:addSchool,_token:token},
                    success:function(){
                        alert("添加成功");
                    },
                    error:function(msg){
                        alert(msg)
                    }
                });
            });
        });
    </script>
@endsection