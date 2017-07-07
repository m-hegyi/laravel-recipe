@extends('layouts.master')

@section('content')

	<h1>Sign in</h1>

	<form method="POST" action="{{ route('login') }}">

		{{ csrf_field() }}

		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" class="form-control">
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password" class="form-control">
		</div>

		<button class="btn btn-primary" type="submit">Login</button>
	</form>

@endsection

@include('layouts.errors')