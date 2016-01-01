{{--程序名：specialistStatistics.blade.php--}}
{{--功能：专家库信息统计页面--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
@extends('layouts.adminProvince')
@section('content')
    <script src="/js/Chart.js"></script>


    <div class="row">
        <h1>专家信息统计</h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    各类别专家统计
                </div>
                <div class="panel-body">
                    <canvas id="chart-area" width="300" height="300"/>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h1>所有专家列表</h1>
        <hr>
    </div>
    <div class="row">
        <div>
            <table class="table table-bordered">
                <th>姓名</th>
                <th>单位</th>
                <th>适应挑战杯类别</th>
                <th>联系电话</th>
                <th>擅长领域</th>
                @foreach($datas as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->unit}}</td>
                        <td>{{$data->class}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->good_field}}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>

    {{--获取各个分类专家的数量，隐藏起来，方便页面中的饼图的js调用--}}
    <input type="hidden" id="a" value="{{$fenlei['a']}}">
    <input type="hidden" id="b" value="{{$fenlei['b']}}">
    <input type="hidden" id="c" value="{{$fenlei['c']}}">
    <script>
        var a = document.getElementById('a').value;
        var b = document.getElementById('b').value;
        var c = document.getElementById('c').value;
        var pieData = [
            {
                value: a,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "自然科学类"
            },
            {
                value: b,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "哲学社会类"
            },
            {
                value: c,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "科技发明类"
            }
        ];

        window.onload = function(){
            var ctx = document.getElementById("chart-area").getContext("2d");
            window.myPie = new Chart(ctx).Pie(pieData);
        };
    </script>

@endsection