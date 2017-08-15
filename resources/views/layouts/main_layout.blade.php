<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@if(isset($title)){{ $title }} @else Restaurant @endif</title>
    <link  rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" media="screen"/>
    <link  rel="stylesheet" href="{{ asset('/css/style.css') }}" media="screen"/>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="{{ asset('/js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}" media="screen"></script>
</head>
<body>


@yield('navbar')

@yield('content')
{{--<div class="container" th:fragment="navbar">
    <div class="row">
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand pull-left" href="https://prog.kiev.ua" target="_blank">
                        <img th:src="@{/images/logo100.png}"
                             style="max-width:100px; max-height: 40px; margin-top: -7px;"> </img>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav">
                        <li><a th:href="@{/waiter/tables}">Tables</a></li>
                        <li><a th:href="@{/waiter/myorders}">My orders</a></li>
                        <li><p class="navbar-text"
                               th:text="${#calendars.format(#calendars.createNow(), 'dd MMM yyyy HH:mm')}"></p></li>
                    </ul>
                    <div class="navbar-form navbar-right">
                        <a href="/logout" class="btn btn-primary">
                            <i class="glyphicon glyphicon-log-out"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}


{{--<div class="container" th:fragment="adminnavbar">
    <div class="row">
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand pull-left" href="https://prog.kiev.ua" target="_blank">
                        <img th:src="@{/images/logo100.png}"
                             style="max-width:100px; max-height: 40px; margin-top: -7px;"> </img>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav">
                        <li><p class="navbar-text">Administrator </p></li>
                        <li><a th:href="@{/admin/main}">Main page</a></li>
                        <li><p class="navbar-text"
                               th:text="${#calendars.format(#calendars.createNow(), 'dd MMM yyyy HH:mm')}"></p></li>
                    </ul>
                    <div class="navbar-form navbar-right">
                        <a href="/logout" class="btn btn-primary">
                            <i class="glyphicon glyphicon-log-out"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}


</body>
</html>