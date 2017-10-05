
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Административная панель сайта</title>

    <link media="all" type="text/css" rel="stylesheet" href="/assets/admin/css/bootstrap.min.css" >
    <link media="all" type="text/css" rel="stylesheet" href="/assets/admin/css/sb-admin-2.css" >
    <link media="all" type="text/css" rel="stylesheet" href="/assets/admin/css/font-awesome.min.css" >
    <link media="all" type="text/css" rel="stylesheet" href="/assets/admin/css/dataTables.bootstrap.css" >
    <link media="all" type="text/css" rel="stylesheet" href="/assets/admin/css/switcher-block.css" >
    <link media="all" type="text/css" rel="stylesheet" href="/assets/admin/css/codepen.css" >
    <link type="text/css" rel="stylesheet" href="/assets/admin/css/admin.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/tinymce.css?var=21212">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <script src="/assets/admin/js/jquery.min.js"></script>
    <script src="/assets/admin/js/autoresize.jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/admin/js/sb-admin-2.js"></script>
    <script src="/assets/admin/js/metisMenu.min.js"></script>
    <script src="/assets/admin/js/admin-default.js"></script>
    <script src="/assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/js/jquery.dataTables_bootstrap.js"></script>
    <script src="/assets/admin/js/tinymce/tinymce.min.js"></script>
    <script src="/assets/admin/js/admin.js"></script>

</head>
<body>
<div id="wrapper">
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/control">Административная панель сайта</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
           <a href="/" target="_blank"><i class="fa fa-globe fa-fw"></i>Просмотр сайта</a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>Admin <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Выйти</a></li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <li>
            <a href="#">
              <i class="fa fa-fw fa-book"></i> Новости
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-fw fa-tasks"></i> Категории
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-fw fa-star-half-o"></i> Заведения
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-users"></i> Пользователи
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-copy"></i> Страницы
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-fw fa-cogs"></i> Настройки
                    
            </a>
          </li>
      </ul>
    </div>
  </div>    
  </nav>
  <div id="page-wrapper" style="width: 1000px;">
    @yield('content')
  </div>
</div>
</body>
</html>