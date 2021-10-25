<!doctype html>
<html class="no-js" lang="az">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NewsEdge | Home 7</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    @include('user.partials._css')
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        @include('user.partials._header')
        <!-- Header Area End Here -->

        <!-- Content Area Start Here -->
        @yield('content')
        <!-- Content Area End Here -->

        <!-- Footer Area Start Here -->
        @include('user.partials._footer')
        <!-- Footer Area End Here -->

        <!-- Canvas Area Start Here -->
        @include('user.partials._canvas')
        <!-- Canvas Area End Here -->
    </div>
    <!-- JS Area Start Here -->
    @include('user.partials._js')
    <!-- JS Area End Here -->
</body>

</html>
