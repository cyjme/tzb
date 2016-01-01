{{--程序名：schoolAlter.blade.php--}}
{{--功能：校团委待修改作品页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminSchool')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">待修改作品</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <tr>
                    <th>作品名称</th>
                    <th>类别</th>
                    <th>院系</th>
                    <th>作者</th>
                    <th>详细信息</th>
                </tr>
                @foreach($results as $result)
                    <tr style="font-size: large">
                        <td>{{$result->workName}}</td>
                        <td>{{$result->big_class}}</td>
                        <td>{{$result->faculty}}</td>
                        <td>{{$result->applicantName}}</td>
                        <td>
                            <a href="/admin/schoolQuery/{{$result->workId}}"><button class="btn btn-primary">查看</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{--table over--}}
        </div>
    </div>
@endsection