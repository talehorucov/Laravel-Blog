<!doctype html>
<html class="no-js" lang="az">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </div>
    <!-- JS Area Start Here -->
    @include('user.partials._js')
    <script>
        function postCardAll() {
            $.ajax({
                type: 'GET',
                url: '{{ route('user.post.all') }}',
                success: (res) => {
                    $('#postall').html(res)
                }
            })
        }
    </script>
    <!-- JS Area End Here -->
</body>

</html>
