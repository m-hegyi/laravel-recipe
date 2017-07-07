@extends('layouts.master')

@section('content')

@if(Session::has('info'))

	<div>
		<p class="alert alert-info">{{ Session::get('info')}}</p>
	</div>

@endif

	<div>
		<button class="btn btn-primary"><a href='{{ route('admin.create') }}'>Create</a></button>
	</div>

@foreach($recipes as $recipe)

	<div>
		<p>{{ $recipe->name }}<span> -{{$recipe->preview}}</span></p>
		<button><a href="{{ route('admin.edit', ['recipe' => $recipe->id]) }}">Edit</a></button>
		<button><a href="{{ route('admin.delete', ['id' => $recipe->id])}}">Delete</a></button>
	</div>

@endforeach

@endsection