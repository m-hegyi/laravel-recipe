@extends('layouts.master')

@section('content')

	<h1>Registration</h1>

	<form method="POST" action="{{ route('registration') }}">

		{{ csrf_field() }}

		<div class="form-group">
			<label for="name">Name: </label>
			<input type="text" name="name" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">E-mail: </label>
			<input type="email" name="email" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">Password: </label>
			<input type="password" name="password" class="form-control">
		</div>

		<div class="form-group">
			<label for="name">Password confirmation: </label>
			<input type="password" name="password_confirmation" class="form-control">
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Registration</button>
		</div>
	</form>


	@include('layouts.errors')

@endsection