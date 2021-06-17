<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Title</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">
    <!-- bootstrap -->
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/extra_pages.css') }}">
	@yield('styles')
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
        @yield('content')		
		</div>
	</div>
    <!-- start js include path -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('assets/js/pages/extra_pages/login.js') }}" ></script>
    <!-- end js include path -->
    @yield('scripts')
</body>
</html>