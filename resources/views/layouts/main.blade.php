<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TodoApp | @yield('title')</title>

	{{-- Latest compiled and minified CSS --}}
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	{{-- Font awesome --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('layouts.partials.navbar')

<div class="container">
	@yield('content')
</div> {{-- /.container --}}

{{-- Jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
{{-- Latest compiled and minified JavaScript --}}
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
