@extends('layouts.app')

@section('content')
 	<div class="container">
 		<div class="col-lg-4">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					<p class="text-center">
 						{{ $user-> name }}'s Profile.
					</p>
 				</div>
 				<div class="panel-body text-center">
 					<img src="{{ Storage::url($user->avatar)}}" alt="" class="img-circle" width="100em" height="100em">
 				</div>
 				<p class="text-center">
 					Location: {{ $user->profile->location }}
 				</p>

 				
 				<p class="text-center">
 					@if(Auth::id() == $user->id)
						<a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit Your Profile</a>	
 					@endif
 				</p>
 			</div>
 			@if(Auth::id() !== $user->id )
 			<div class="panel panel-default">
 				<div class="body">
 					<friend :profile_user_id="{{ $user->id }}"></friend>
 				</div>
 			</div>
 			@endif
 			
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					<p class="text-center">
 						About Me!!!
 					</p>
 					<div class="panel-body">
	 					<p class="text-center">
	 						{{ $user->profile->about }}

	 					</p>
 						
 					</div>
 				</div>
 			</div>
 			
 		</div>
 	</div>


@stop