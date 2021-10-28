<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/plugins/images/favicon.png') }}">
    <title>Admin - Giriş</title>
    <!-- Bootstrap Core CSS -->
    @include('admin.partials._css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel"></div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Admin Girişi</h3>
                <form class="form-horizontal new-lg-form" id="loginform" method="POST"
                    action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-group  m-t-20">
                        <div class="col-xs-12">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" required placeholder="Email ünvanı">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label>Şifrə</label>
                            <input class="form-control" name="password" type="password" required placeholder="Şifrə">
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($message = session('error'))
                        <span class="text-danger">{{ $message }}</span>
                    @endif
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-info pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Yadda Saxla </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button
                                class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light"
                                type="submit">Daxil Ol</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </section>
    @include('admin.partials._js')
</body>

</html>
