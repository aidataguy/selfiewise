@extends('layouts.app')

@section('content')
 <post></post>
{{-- @if($posts = App\Post::all())
	@foreach($posts as $post)
		<br>
		<img src="{{ $post->user->avatar }}" alt="">	<br>
		{{ $post->user->name}} <br>
		<br>
	    {{ $post->content }}

	@endforeach
@endif --}}
@endsection
