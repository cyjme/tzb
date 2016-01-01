{{--程序名：schoolIndex.blade.php--}}
{{--功能：校团委后台首页--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>学校管理</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/js/Chart.js"></script>
</head>

<body>

<div id="wrapper">


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">挑战杯系统</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            {{--判断用户是否登录--}}
            @if(Auth::check())
                <button type="button" class="btn btn-default navbar-btn">{{Auth::user()['name']}}</button>
                <a href="/auth/logout">
                    <button type="button" class="btn btn-default navbar-btn" style="margin-right: 80px;" >退出</button>
                </a>
            @elseif(!Auth::check())
                <a href="/auth/login">
                    <button type="button" class="btn btn-default navbar-btn" style="margin-right: 30px;">登录</button>
                </a>
                <a href="/auth/logout">
                    <button type="button" class="btn btn-default navbar-btn" style="margin-right: 80px;" >退出</button>
                </a>
            @endif
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/admin/schoolIndex"><i class="fa fa-dashboard fa-fw"></i>学校管理</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>所有作品<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/schoolWait">待审核</a>
                            </li>
                            <li>
                                <a href="/admin/schoolPass">审核通过</a>
                            </li>
                            <li>
                                <a href="/admin/schoolAlter">待修改</a>
                            </li>
                            <li>
                                <a href="/admin/schoolNot">已淘汰</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="/admin/schoolUp"><i class="fa fa-cloud-upload fa-fw"></i>作品上报</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">学校管理</h1>
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
                                <i class="fa fa-envelope-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$count['wait']}}</div>
                                <div>待审核作品!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/schoolWait">
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
                                <i class="fa fa-smile-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$count['pass']}}</div>
                                <div>审核通过作品!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/schoolPass">
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
                                <i class="fa fa-clock-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$count['alter']}}</div>
                                <div>待修改作品!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/schoolAlter">
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
                                <i class="fa fa-frown-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$count['not']}}</div>
                                <div>已淘汰作品!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/schoolNot">
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
                        各院系提交作品数量
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <th>院系</th>
                            <th>数量</th>
                            @foreach($facultyNum as $num)
                            <tr>
                                <td>{{$num->faculty}}</td>
                                <td>{{$num->number}}</td>
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

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

{{--获取学校作品各个分类的数量，隐藏起来，方便页面中的饼图的js调用--}}
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


</body>

</html>
