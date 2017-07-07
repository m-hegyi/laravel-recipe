@extends('layouts.master')

@section('content')

	<div class="recipe-page">

		<div class="recipe-name">
		
			<h2>{{ $recipe->name }}</h2>

		</div>

		<hr>

		<div>
			
			<p class="recipe-created">Created by {{ $recipe->user->name }} at <span>{{ $time }}</span></p>
			
		</div>

		<div class="rows">

			<div class="col-md-5">
				<h2><strong>Ingredients:</strong></h2>

				<ul class="recipe-list-ul">

					@foreach($ingredients as $ingredient)

					<li class="recipe-list-li">{{ $ingredient }}</li>

					@endforeach

				</ul>

			</div>

			<div class="col-md-7">
				
				<img src="{{ Storage::url($recipe->img) }}" class="recipe-img recipe-img-big">

			</div>

		</div>

		<div class="recipe-recipe">

			<h1><strong>Recipe:</strong></h1>

			<p class="recipe-body-p">{{ $recipe->body }}</p>
			
		</div>

	</div>

@endsection