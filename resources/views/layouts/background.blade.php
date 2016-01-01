{{--程序名：main.blade.php--}}
{{--功能：网站前台页面模版--}}
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
    <title>挑战杯</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-image: url();">
<div class="container-fluid">
{{--导航条--}}
    <div style="height: 80px;"></div>
    <nav class="navbar navbar-default navbar-fixed-top" >
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="/">河南省大学生挑战杯</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#chang" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " id="chang">
                <ul class="nav navbar-nav" >

                </ul>

                <ul class="nav navbar-nav navbar-right">
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
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <div class="container">
        @yield('content')
    </div>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>