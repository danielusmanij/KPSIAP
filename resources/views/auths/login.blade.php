<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>SIAP</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="{{asset('assets/img/logo-color.png')}}" alt="Klorofil Logo"></div>
                            <p class="lead">Sistem Informasi Akademik ter-Padu</p>
                        </div>
                        <form class="form-auth-small" action="/login" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="txtNoInduk" class="control-label sr-only">Nomor Induk</label>
                                <input type="text" class="form-control" id="txtNoInduk" name="txtNoInduk" placeholder="Nomor Induk" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="txtPassword" class="control-label sr-only">Kata Sandi</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Kata Sandi" required>
                            </div>
                            <input value="Masuk" name="btnSignIn"
                                   class="btn btn-primary btn-lg btn-block"
                                   type="submit">
                            @if (session('message'))
                                <br><br>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-times-circle"></i> {{session('message')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
</body>

</html>
