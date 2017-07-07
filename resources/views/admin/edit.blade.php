@extends('layouts.master')

@section('content')
	
	@include('errors')

	<div>
		<form method="POST" action="{{ route('admin.update') }}">
			<p>Name</p>
			<input class="form-control" type="text" name="name" value="{{ $recipe->name }}" required>
			<p>Preview</p>
			<input class="form-control" type="text" name="preview" value="{{ $recipe->preview }}" required>
			<p>Ingredients</p>
			<textarea class="form-control" rows="5" name="ingredients" required>{{ $ingredients }}</textarea>
			<p>Recipe</p>
			<textarea class="form-control" rows=7 name="body" required>{{ $recipe->body}}"</textarea>
			<p>Image</p>
			<img src="{{ Storage::url($recipe->img) }}">
			<input type="file" name="img" class="form-control">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $recipe->id }}">
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>

@endsection