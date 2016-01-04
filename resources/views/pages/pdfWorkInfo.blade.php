@extends('layouts.adminSchool')
@section('content')
    <div class="row">
        <h1>您上传的信息为：</h1>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>作品名称：</td>
                <td>{{$info['name']}}</td>
            <tr>
                <td>学校名称：</td>
                <td>{{$info['school']}}</td>
            </tr>
            <tr>
                <td>申报人：</td>
                <td>{{$info['people']}}</td>
            </tr>
            <tr>
                <td>作品类别：</td>
                <td>{{$info['big_class']}}</td>
            </tr>
            <tr>
                <td>作品目的：</td>
                <td>{{$info['aim']}}</td>
            </tr>
        </table>
    </div>
    <div class="row">
        {!! Form::label('','作品独特之处、先进性：') !!}<br>
        {{$info['brief']}}
    </div>
    @endsection