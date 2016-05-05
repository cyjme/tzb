{{--程序名：schoolIndex.blade.php--}}
{{--功能：校团委后台首页--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}

@extends('layouts.adminSchool')
@section('content')
    <div class="row" style="padding-top: 20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                通知公告
            </div>
            <div class="panel-body">
                <table class="table">
                    @foreach($infos as $info)
                    <tr>
                        <td>
                        <a href="/queryInfo/{{$info->id}}" style="font-size:25px;">{{$info->title}}</a>
                        </td>
                        <td>
                            <span style="font-size:20px;">{{$info->created_at}}</span>
                        </td>
                    </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection