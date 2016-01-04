{{--程序名：provinceIndex.blade.php--}}
{{--功能：省团委后台首页--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：李孝川 18839965525--}}
{{--测试人：常元检 15649841368--}}

@extends('layouts.adminProvince')
@section('content')
        <!-- Morris Charts CSS -->
<link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">得奖信息统计</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$data['firstNumber']}}</div>
                        <div>一等奖</div>
                    </div>
                </div>
            </div>
            <a href="/admin/queryAwardFirst">
                <div class="panel-footer">
                    <span class="pull-left">点击查看</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$data['secondNumber']}}</div>
                        <div>二等奖</div>
                    </div>
                </div>
            </div>
            <a href="/admin/queryAwardSecond">
                <div class="panel-footer">
                    <span class="pull-left">点击查看</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-laptop fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$data['threeNumber']}}</div>
                        <div>三等奖</div>
                    </div>
                </div>
            </div>
            <a href="/admin/queryAwardThree">
                <div class="panel-footer">
                    <span class="pull-left">点击查看</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        {{--<div class="panel panel-red">--}}
            {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-xs-3">--}}
                        {{--<i class="fa fa-spinner fa-5x"></i>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-9 text-right">--}}
                        {{--<div class="huge">{{$data['noAwardNumber']}}</div>--}}
                        {{--<div>未得奖</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<a href="/admin/kejib">--}}
                {{--<div class="panel-footer">--}}
                    {{--<span class="pull-left">点击查看</span>--}}
                    {{--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
            {{--</a>--}}
        {{--</div>--}}
    </div>
</div>
<!-- /.row -->
<div class="row" >
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                不同奖项统计
            </div>
            <div class="panel-body">
                <canvas id="chart-area" width="300" height="300"/>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                各学校得奖数量
            </div>
            <div class="panel-body">
                <table class="table">
                    <th>学校名称</th>
                    <th>获奖数量</th>
                    @foreach($awards as $award)
                        <tr>
                            <td>{{$award->school}}</td>
                            <td>{{$award->COUNT}}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                各类别奖项数量统计
            </div>
            <div class="panel-body">
                <canvas id="bar" height="450" width="600"></canvas>
            </div>

        </div>
    </div>
</div>
<!-- /.row -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>


{{--获取学校作品各个分类的数量，隐藏起来，方便页面中的饼图的js调用--}}
<input type="hidden" id="a" value="{{$data['firstNumber']}}">
<input type="hidden" id="b" value="{{$data['secondNumber']}}">
<input type="hidden" id="c" value="{{$data['threeNumber']}}">

<input type="hidden" id="ziran" value="{{$data['ziran']}}">
<input type="hidden" id="zhexue" value="{{$data['zhexue']}}">
<input type="hidden" id="kejia" value="{{$data['kejia']}}">
<input type="hidden" id="kejib" value="{{$data['kejib']}}">

<script>
    var a = document.getElementById('a').value;
    var b = document.getElementById('b').value;
    var c = document.getElementById('c').value;

    var pieData = [
        {
            value: a,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "一等奖"
        },
        {
            value: b,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "二等奖"
        },
        {
            value: c,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "三等奖"
        }
    ];


    var ziran = document.getElementById('ziran').value;
    var zhexue = document.getElementById('zhexue').value;
    var kejia = document.getElementById('kejia').value;
    var kejib = document.getElementById('kejib').value;

    var barChartData = {
        labels : ["自然科学类","哲学社会类","科技制作A类","科技制作B类"],
        datasets : [
            {
                fillColor : "rgba(46,169,223,0.5)",
                strokeColor : "rgba(162,140,55,0.8)",
                highlightFill: "rgba(162,140,55,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data : [ziran,zhexue,kejia,kejib]
            }
        ]
    }

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);

        var bar = document.getElementById("bar").getContext("2d");
        window.myBar = new Chart(bar).Bar(barChartData, {
            responsive : true
        });
    };

</script>

@endsection
