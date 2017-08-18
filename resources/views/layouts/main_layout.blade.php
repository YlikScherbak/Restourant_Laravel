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
    <link rel="icon" sizes="76x76" href="{{ asset('/images/apple-icon-76x76.png') }}">
</head>
<body>


@yield('navbar')

@yield('content')


</body>
</html>