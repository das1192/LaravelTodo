<!doctype html>
<html lang="en" dir="ltr">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="author" content="DasOcean">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title></title>
		<!-- favicon -->
		
		<!-- Bootstrap -->
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body>
                    <div class="container mt-45">
					<!-- Main Content Area Start -->
					@yield('content')
					<!-- Main Content Area End -->
                    </div>
					<div class="mt-85"></div>

		
		<script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
    	
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/jqueryui.min.js')}}"></script>
		@yield('scripts')
	</body>

</html>
