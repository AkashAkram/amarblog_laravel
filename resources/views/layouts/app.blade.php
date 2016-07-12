<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') :: আমার ব্লগ</title>


    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <link href="/css/blog-home.css" rel="stylesheet">

    <link href="/css/light-theme.css" rel="stylesheet">
<!--
  <link href="/css/default-theme.css" rel="stylesheet">
    <link href="/css/light-theme.css" rel="stylesheet">
-->

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->



    @yield('style')
    <style>



    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}"> 
                আমার <img class="nav-img" src="../images/amarblog3.png" alt="" height="35px" width="70px;"> ব্লগ
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('../login') }}">Login</a></li>
                        <li><a href="{{ url('../register') }}">Register</a></li>
                    @else
                        <li class=" "><a href="{{ url('../create') }}">Create New</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img class="user_image" src="/images/user.jpg" alt="" width="30" height="25">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('../myblog') }}"><i class=""></i>My Blogs</a></li>
                                <li><a href="../myprofile/{!! Auth::User()->id !!}"><i class=""></i>Profile</a></li>
                                <li><a href="{{ url('../logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row" style="text-align: justify">

            <div class="col-md-8">
                @yield('content')
            </div>
                <!-- Sidebar Widgets-->
            <div class="col-md-4">
                @include ('layouts.sidebar')
            </div>
      
        </div>
    </div>

    <!-- JavaScript

     -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>


  
    -->



</body>
</html>
