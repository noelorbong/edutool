<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js " lang="en">
<!--<![endif]-->

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Meta -->
    <title>EduTool-Log In</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/top-icon.ico" type="image/x-icon" />
    <link rel="top-icon" href="top-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">

    <!-- Custom & Default Styles -->
    <link rel="stylesheet" type="text/css" href="css/styleLogIn.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        span.invalid-feedback {
            font-size: 9px;
            color: red;
        }
    </style>
    <!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->

</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div class="login">
        <img src="images/top-icon.png" class="avatar">
        <h3>Log In</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <p>Email @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
                @enderror</p>
            <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required placeholder="xyz@gmail.com" autocomplete="email">

            <p>Password @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}</strong>
                </span>
                @enderror</p>
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password"
                required placeholder="Your Password" autocomplete="current-password">

            <input type="submit" name="" value="Login"><br>
            <a href="/register">Create an Account.</a><br>
            <a href="/">Home Page.</a><br>
        </form>
    </div>



    <!-- jQuery Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="js/videobg.js"></script>

</body>

</html>