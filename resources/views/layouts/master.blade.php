<!DOCTYPE html>
<html lang = "{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Recipes') }}</title>

		<!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

	</head>
	<body>

		@include('layouts.header')

		@yield('main')
		
		<div class="container">

			@yield('content')

			@yield('comments')
		</div>
		
		@include('layouts.footer')
	</body>
</html>