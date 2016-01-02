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
            <h1 class="page-header">省团委管理</h1>
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
                            <div class="huge">{{$data['zirannumber']}}</div>
                            <div>自然科学类</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/ziran">
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
                            <div class="huge">{{$data['zhexuenumber']}}</div>
                            <div>哲学社会科学类</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/zhexue">
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
                            <div class="huge">{{$data['kejianumber']}}</div>
                            <div>科技发明制作Α类!</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/kejia">
                    <div class="panel-footer">
                        <span class="pull-left">点击查看</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-spinner fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$data['kejibnumber']}}</div>
                            <div>科技发明制作Β类</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/kejib">
                    <div class="panel-footer">
                        <span class="pull-left">点击查看</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" >
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    作品分类饼图
                </div>
                <div class="panel-body">
                    <canvas id="chart-area" width="300" height="300"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    各院校作品数量
                </div>
                <div class="panel-body">
                    <table class="table">
                        <th>学校名称</th>
                        <th>作品数量</th>
                    @foreach($schools as $school)
                            <tr>
                                <td>{{$school->school}}</td>
                                <td>{{$school->COUNT}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="">

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
<input type="hidden" id="a" value="{{$data['zirannumber']}}">
<input type="hidden" id="b" value="{{$data['zhexuenumber']}}">
<input type="hidden" id="c" value="{{$data['kejianumber']}}">
<input type="hidden" id="d" value="{{$data['kejibnumber']}}">
<script>
    var a = document.getElementById('a').value;
    var b = document.getElementById('b').value;
    var c = document.getElementById('c').value;
    var d = document.getElementById('d').value;

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
            label: "哲学社会科学类"
        },
        {
            value: c,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "科技发明制作Α类"
        },
        {
            value: d,
            color: "#949FB1",
            highlight: "#A8B3C5",
            label: "科技发明制作Β类"
        }

    ];

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
    };



    window.onload = function(){


        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
    }
</script>

        @endsection
