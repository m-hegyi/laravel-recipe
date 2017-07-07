@extends('layouts.master')

@section('content')

	@include('layouts.errors')

	<div class="recipe-container">
		<form method="POST" action="{{ route('create') }}" enctype="multipart/form-data">

			{{ csrf_field() }}

			<div class="form-group">
				<label for="name">Name:</label>
				<input class="form-control" type="text" name="name" required>
			</div>

			<div class="form-group">
				<label for="preview">Short text for preview:</label>
				<input class="form-control" type="text" name="preview" required>
			</div>

			<div class="form-group">
				<label for="ingredients">Ingredients:</label>
				<textarea class="form-control" rows="5" name="ingredients" required></textarea>
			</div>

			<div class="form-group">
				<label for="body">Recipe:</label>
				<textarea class="form-control" rows=7 name="body" required></textarea>
			</div>

			<div class="form-group">
				<label for="img">Image</label>
				<input type="file" name="img" class="form-control" name="img">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>

@endsection