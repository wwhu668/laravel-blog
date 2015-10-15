<!DOCTYPE html>
<html lang="zh-cn">

<head>
<meta charset="utf-8">
<title>WWHBlog Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<!-- MetisMenu CSS -->
<link rel="stylesheet" href="{{ asset('bower_components/metisMenu/dist/metisMenu.min.css') }}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('dist/css/sb-admin-2.css') }}">
<!-- Custom Fonts -->
<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('css/select2.css') }}">
@yield('top')
</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           	<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>
            <!-- /.navbar-header -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-top-links navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
            @if (!Auth::guest())
                @include('left_nav') 
            @endif
            <!-- /.navbar-top-links -->
            @yield('nav')
        </nav>

        <div id="page-wrapper">
	        @yield('content')
        </div>

    </div>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>

    <!--  Select2 -->
    <script src="{{ asset('js/select2.min.js') }}"></script>
@yield('footer')
</body>

</html>


