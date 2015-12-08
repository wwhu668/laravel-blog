<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8">
<?php $setups = json_decode(file_get_contents('setups.txt')); ?>
<title>{{ $title }}</title>
<meta name="keywords" content="{{ $keywords }}" />
<meta name="description" content="{{ $description }}" />
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" id="twentyfifteen-fonts-css" href="{{ asset('fhome/css') }}" >
<link rel="stylesheet" id="genericons-css" href="{{ asset('fhome/genericons.css') }}">
<link rel="stylesheet" id="twentyfifteen-style-css" href="{{ asset('fhome/style.css') }}">
</head>
<body>
    



<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="http://localhost/#content">Skip to content</a>

    @include('sidebar')    

	<div id="content" class="site-content">
	    <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                @yield('content')   
		    </main><!-- .site-main -->
	    </div><!-- .content-area -->
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
            {{ $setups->footer }}
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div>
<script type="text/javascript" src="{{ asset('fhome/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.js') }}"></script>
@include('pjax::pjax')
<script type="text/javascript" src="{{ asset('fhome/jquery-migrate.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('fhome/skip-link-focus-fix.js') }}"></script>
<script type="text/javascript" src="{{ asset('fhome/comment-reply.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fhome/functions.js') }}"></script>
</body>
</html>
