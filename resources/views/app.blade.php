<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel App</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="/css/jquery.Jcrop.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script src="/js/jquery.Jcrop.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Laravel App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">首页</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/users/avatar"><i class="fa fa-user"></i>更换头像</a></li>
                <li><a href="#"><i class="fa fa-cog"></i>更换密码</a></li>
                <li><a href="/logout"><i class="fa fa-sign-out"></i>退出登陆</a></li>
              </ul>
            </li>
            <li><img src="{{Auth::user()->avatar}}" class="img-circle" width="50pxv" alt="64x64"></li>
            </form>
            @else
            <li class="active"><a href="/login">登陆</a></li>
            <li><a href="/users/register">注册</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      @yield('content')

  </body>
</html>
