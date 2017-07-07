@extends('layouts.master')

@section('main')

	<div class="recipe-main">
		<div class="container">
			<h1 class="main-center">Recipes</h1>
		</div>
	</div>

@endsection

@section('content')


	<div class="row">
		
		@foreach($recipes as $recipe)

			<div class="col-md-4 col-lg-3">

				<div class="recipebox">

					<p class="recipebox-name">{{$recipe->name}}</a></p>

					<div class="recipebox-overlay-container">

						<div class="recipebox-img">
							<img src="{{ Storage::url($recipe->img) }}" class="recipe-img">
						</div>

						<div class="recipebox-overlay">

							<p class="recipebox-preview">{{ $recipe->preview }}</p>

							<div class="recipebox-btn-middle">
								<a href="recipe/{{$recipe->id}}" class="recipebox-link"><div class="recipebox-btn">More</div></a>
							</div>

						</div>

					</div>
				</div>
			</div>

		@endforeach
		
	</div>

@endsection