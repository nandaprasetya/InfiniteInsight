<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('asset/logo-infiniteInsight.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4.css')}}">
    @yield('addcss')
</head>
<body>
    @yield('content')
    <script src="{{asset('plugins/jquery.js')}}"></script>
    <script src="{{asset('plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/adminlte.js')}}"></script>
    <script src="{{asset('plugins/datatables.js')}}"></script>
    <script src="{{asset('plugins/select2.full.js')}}"></script>
    @yield('script')
</body>
</html>