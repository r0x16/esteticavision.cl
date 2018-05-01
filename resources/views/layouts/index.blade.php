<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/all.css">
    @yield('styles')
    @yield('headerscripts')
</head>
<body>
    @include('include.header')
    @yield('body')
    @include('include.footer')
    <script src="/js/vendor/jquery.min.js"></script>
    <script src="/js/vendor/popper.min.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    @yield('footerscripts')
</body>
</html>