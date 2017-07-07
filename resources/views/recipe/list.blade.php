@extends('layouts.master')

@section('content')

	@if(count($recipes))

		<div class="recipe-container">

			<h1>Your recipe(s):</h1>

			@foreach($recipes as $recipe)

				<div class="row">

					<div class="col-md-10">
							
						<p><strong>{{ $recipe->name }}</strong><span> -{{$recipe->preview}}</span></p>
						
					</div>

					<div class="col-md-1">
							
						<a href="{{ route('edit', ['recipe' => $recipe->id]) }}" class="btn btn-primary">Edit</a>

					</div>

					<div class="col-md-1">					
							
						<form method="POST" action="{{ route('list') }}" class="form-inline">

							{{ csrf_field() }}

							<input type="hidden" name="id" value=" {{ $recipe->id }}" >

							<button type="submit" class="btn btn-danger">Delete</button>

						</form>

					</div>

				</div>	

				<hr>				
				
			@endforeach

		</div>

	@else

		<div class="recipe-container">
			
			<h1>You doesn't have any recipe yet.</h1>
			
		</div>

	@endif

	<div class="container">
		<p>Add new recipe</p>
		<button class="btn btn-primary"><a href='{{ route('create') }}'>Create</a></button>
	</div>

@endsection