@extends('layouts.master')

@section('content')
	
	@include('layouts.errors')

	<div class="recipe-container">
		<form method="POST" action="{{ route('admin.update') }}">
			{{ csrf_field() }}
		
			<div class="form-group">		
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" value="{{ $recipe->name }}" required>
			</div>

			<div class="form-group">
				<label for="preview">Preview</label>
				<input class="form-control" type="text" name="preview" value="{{ $recipe->preview }}" required>
			</div>

			<div class="form-group">
				<label for="ingredients">Ingredients</label>
				<textarea class="form-control" rows="5" name="ingredients" required>{{ $ingredients }}</textarea>
			</div>

			<div class="form-group">
				<label for="body">Recipe</label>
				<textarea class="form-control" rows=7 name="body" required>{{ $recipe->body}}"</textarea>
			</div>

			<div class="form-group">
				<label for="img">Image</label>
				<img src="{{ Storage::url($recipe->img) }}" name="img">
			</div>

			<div class="form-group">
				<input type="file" name="img" class="form-control">
			</div>

			<input type="hidden" name="id" value="{{ $recipe->id }}">

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>

		</form>
	</div>

@endsection