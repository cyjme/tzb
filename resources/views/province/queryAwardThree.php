@extends('layouts.adminProvince')
@section('content')
<div class="row">
    <h1>���Ƚ�</h1>
</div>
<div class="row">
    <table class="table">
        <th>��Ʒ����</th>
        <th>��Ʒ���</th>
        <th>�걨��</th>
        <th>ѧУ</th>
        <th>�鿴</th>
        @foreach($datas as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->big_class}}</td>
            <td>{{$data->people}}</td>
            <td>{{$data->school}}</td>
            <td><a href="/admin/queryWork/{{$data->workId}}"><button class="btn btn-primary">�鿴</button></a></td>
        </tr>
        @endforeach
    </table>
</div>

@endsection