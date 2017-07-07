<div class="recipes-header">
	<div class="container">
		<nav class="recipes-nav">
			<a class="recipes-nav-item" href="{{ route('index') }}">Home</a>
			
			@if (Auth::user())

				<a class="recipes-nav-item" href="{{ route('list') }}">My recipes</a>
				<a class="recipes-nav-item" href="{{ route('create')}}">Add new recipe</a>
				<a class="recipes-nav-item nav-item-right" href=" {{ route('logout') }}">Log out</a>
				<a class="recipes-nav-item nav-item-right nav-item-username" href="">{{ Auth::user()->name }}</a>

			@else()

				<a class="recipes-nav-item nav-item-right" href="{{ route('login') }}">Login</a>
				<a class="recipes-nav-item nav-item-right" href="{{ route('registration') }}">Registration</a>

			@endif
		</nav>
	</div>
</div>