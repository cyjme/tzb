{{--程序名：index.blade.php--}}
{{--功能：网站首页--}}
{{--被调用程序名：调用程序名：--}}
{{--安全等级：2级 --}}
{{--编程人：常元检 15649841368--}}
{{--测试人：李孝川 18839965525--}}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>河南省挑战杯</title>
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body  style="background-color:#f8f6f6">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span style="font-weight: bold;">河南省大学生挑战杯</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--判断用户是否登录--}}
                @if(Auth::check())
                    @if($status==0)
                        <a href="/applicant/create">
                        <button type="button" class="btn btn-success navbar-btn">去填写申报资料</button>
                        </a>
                    @else
                        <a href="/query/status">
                        <button type="button" class="btn btn-success navbar-btn">查询作品状态</button>
                        </a>
                    @endif
                    <button type="button" class="btn btn-default navbar-btn">{{Auth::user()['name']}}</button>
                    <a href="/auth/logout">
                        <button type="button" class="btn btn-default navbar-btn" style="margin-right: 80px;" >退出</button>
                    </a>
                @elseif(!Auth::check())
                    <a href="/auth/login">
                        <button type="button" class="btn btn-default navbar-btn" style="margin-right: 30px;">登录</button>
                    </a>
                    <a href="/auth/register">
                        <button type="button" class="btn btn-default navbar-btn" style="margin-right: 80px;" >注册</button>
                    </a>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <!--第二层-->
    <div class="row" style="margin-top:-20px;">
        {{--<div class="col-lg-12" style="background-image: url(/images/banner3.jpg);height: 470px; padding: 180px;">--}}

            <div id="carousel-example1-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="/images/banner4.jpg" class="img-responsive" alt="Responsive image" style="width: 1400px;">
                        <div class="carousel-caption">

                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example1-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example1-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <!--第三层-->
    <div class="row" style="height: 30px;">

    </div>
    <!--外围-->
    <div class="row">
        <!--内层div-->
        <div class="col-lg-10 col-lg-offset-1">
            <!--左侧滑动图片-->
            <div class="col-lg-4">
                <div id="carousel-example2-generic" class="carousel slide" data-ride="carousel" >
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="/articles/img/{{$news[0]->img}}.png" class="img-responsive" alt="Responsive image" style="height: 280px;">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        @foreach($news as $new)
                        <div class="item">
                            <img src="/articles/img/{{$new->img}}.png" class="img-responsive" alt="Responsive image">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example2-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example2-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!--中间新闻栏-->
            <div class="col-lg-4" >
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <span style="font: 12px/1.5 'MicroSoft YaHei', 'SimSun';font-size: 17px;">新闻栏</span>
                        <i class="fa fa-bar-chart-o fa-fw" > </i>
                        <div class="pull-right">
                            <div class="btn-group"><a href="">
                                    <span style="font: 12px/1.5 'MicroSoft YaHei', 'SimSun';color: #666666;">更多>></span>
                                </a></div>
                        </div>
                    </div>
                    <div class="panel-body" style="hight:5px;line-height: 30px; ">
                        @foreach($news as $new)
                            <a href="/article/query/{{$new->id}}">{{$new->title}}</a>
                            <br>
                            @endforeach
                    </div>

                </div>
            </div>


            <!--右侧公告栏-->
            <div class="col-lg-4">
                <div class="panel panel-default  ">
                    <div class="panel-heading">
                        <span style="font: 12px/1.5 'MicroSoft YaHei', 'SimSun';font-size: 17px;">公告栏</span>
                        <i class="fa fa-bar-chart-o fa-fw" > </i>
                        <div class="pull-right">
                            <div class="btn-group"><a href="">
                                    <span style="font: 12px/1.5 'MicroSoft YaHei', 'SimSun';color: #666666;">更多>></span>
                                </a></div>
                        </div>
                    </div>

                    <div class="panel-body" style="hight:5px">
                        @foreach($notices as $notice)
                            <a href="/article/query/{{$notice->id}}">{{$notice->title}}</a>
                            <br>
                            @endforeach

                    </div>

                </div>
            </div>

        </div>

    </div>

    <!--第四层-->
    <div class="row" style="background-color:#e7eaea" >
        <!--了解挑战杯-->
        <div class="col-lg-10 col-lg-offset-1" >
            <!--了解挑战杯标签-->
            <div class="row">
                <div class="col-lg-3 col-lg-offset-1"style="width:25px; background-color:#3C0">
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                </div>

                <div class="col-lg-9 "style="">
                    <h1 style="font-family: 'MicroSoft YaHei', 'SimSun';font-weight: bold;font-size: 36px;color:#999999;">了解挑战杯</h1>
                </div>
                <hr class="col-lg-10 " style=" height:1px;background-color:#3FF">
            </div>

            <!--文字说明-->
            <div class="row col-lg-12" style="">
                <p style="font: 12px/1.5 'MicroSoft YaHei', 'SimSun';font-size: 15px;color: #666666;" >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;挑战杯是“挑战杯”全国大学生系列科技学术竞赛的简称，是由共青团中央、中国科协、教育部和全国学联、地方省级人民政府共同主办的全国性的大学生课外学术科技创业类竞赛，承办高校为国内著名大学。“挑战杯”竞赛在中国共有两个并列项目，一个是“挑战杯”全国大学生课外学术科技作品竞赛（大挑）；另一个则是“挑战杯”中国大学生创业计划竞赛（小挑）。这两个项目的全国竞赛交叉轮流开展，每个项目每两年举办一届。“挑战杯”系列竞赛被誉为中国大学生学生科技创新创业的“奥林匹克”盛会，是目前国内大学生最关注最热门的全国性竞赛，也是全国最具代表性、权威性、示范性、导向性的大学生竞赛。
                </p>
            </div>
        </div>

        <!--展示部分图片-->
        <div class="col-lg-10 col-lg-offset-1" >
            <div class="row">
                @foreach($knows as $know)
                    <div class="col-lg-3 col-md-3">
                        <a href="#" class="thumbnail">
                            <img src="articles/img/{{$know->img}}.png" class="img-responsive" alt="Responsive image">
                        </a>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>


    <!--第5层作品展示-->
    <div class="row" style=" " >

        <div class="col-lg-10 col-lg-offset-1" >
            <!---->
            <div class="row">
                <div class="col-lg-3 col-lg-offset-1"style="width:25px; background-color:#3FF">
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                </div>

                <div class="col-lg-9 "style="margin-left:50px;">
                    <h1 style="font-family:'MicroSoft YaHei', 'SimSun';font-weight: bold;font-size: 36px;color:#999999;">作品展示</h1>
                </div>
                <hr class="col-lg-10 " style="height:1px;background-color:#3FF">
            </div>
        </div>


        <div class="col-lg-10 col-lg-offset-1" >
            <div class="row">
                @foreach($shows as $show)
                <div class="col-lg-3 col-md-3">
                    <a href="#" class="thumbnail" style="margin-bottom: 0px;margin-top: 15px;">
                        <img src="/articles/img/{{$show->img}}.png" class="img-responsive" alt="Responsive image">
                    </a>
                    <div style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                        {{$show->title}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!--第六层合作伙伴-->
    <div class="row" style=" background-color:#e7eaea" >

        <div class="col-lg-10 col-lg-offset-1" >
            <!---->
            <div class="row">
                <div class="col-lg-3 col-lg-offset-1"style="width:25px; background-color:#3FF">
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                    <br>
                    &nbsp;&nbsp;
                </div>

                <div class="col-lg-9 "style="margin-left:50px;">
                    <h1 style="font-family:'MicroSoft YaHei', 'SimSun';font-weight: bold;font-size: 36px;color:#999999;">合作伙伴</h1>
                </div>
                <hr class="col-lg-10 " style="hight:1px;background-color:#3FF">
            </div>
        </div>


        <div class="col-lg-10 col-lg-offset-1" >
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="C:\Users\admin\Desktop\2.png" class="img-responsive" alt="Responsive image">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="C:\Users\admin\Desktop\2.png" class="img-responsive" alt="Responsive image">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="C:\Users\admin\Desktop\2.png" class="img-responsive" alt="Responsive image">
                    </a>
                </div>


                <div class="col-lg-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="C:\Users\admin\Desktop\2.png" class="img-responsive" alt="Responsive image">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!--底部信息-->
    <div class="row" style=" ">

        <div class="col-lg-10 col-lg-offset-1" ><!--左边-->
            <div class="col-lg-6"> <!--上半部分-->
                <div>

                </div>
            </div>

            <div><!--下半部分-->

            </div>
        </div>



        <div><!--左边-->

        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
</div>
</body>
</html>