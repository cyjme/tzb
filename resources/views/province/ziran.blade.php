@extends('layouts.adminProvince')
@section('content')
    <div class="row">
        <h1>自然科学类</h1>
    </div>
    <div class="row">
        <table class="table">
            <th>作品名称</th>
            <th>申报人</th>
            <th>学校</th>
            <th>查看&&评奖</th>
            @foreach($datas as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->people}}</td>
                    <td>{{$data->school}}</td>
                    <td><a href="/admin/queryWork/{{$data->id}}"><button class="btn btn-primary">查看</button></a></td>
                </tr>
                @endforeach
        </table>
    </div>

    @endsection