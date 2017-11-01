@extends('layouts.app')

@section('content')
<section class="inner_content">
 	<div class="container">
    <div class="col-lg-12">
		<div class="timeline_outer col-lg-9 col-md-9 col-sm-9">
	            <div class="blue_line"></div>
	            <div class="blue_dot_end"></div>
	            <div class="timeline_starts">
	                <div class="timeline_by_month"> 
	                    <h4 class="post_month"> <span>October 2017</span> </h4>

	                   	 <feed></feed>

	                </div> <!--timeline_by_month-->
	            </div>
            </div>
			{{-- Advertsection --}}
            <div class="col-lg-3 col-md-3 col-sm-3 advertisment_sec">
                <div class="row-fluid">
                    <h5>sponsered</h5>
                    <img src="{{asset('images/add_cover.jpg')}}" />
                    <h5>Watch free add</h5>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                </div>
                <div class="row-fluid">
                    {{-- Display User Friends --}}
                    <h5>My Friends</h5>
                       @foreach ($friends as $friend)
                            {{ $friend->name }} - {{ $friend->email }} 
                            <img src="{{ url('/')}}/storage/{{($friend->avatar) }}" alt="">
                        @endforeach
               </div>
            </div>
            </div>    
    </div>  
        {{-- Old HTML --}}

				<p class="text-center">
 					@if(Auth::id() == $user->id)
						<a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit Your Profile</a>	
 					@endif
 				</p>
            @if(Auth::id() !== $user->id )
 			    <div class="panel panel-default">
     				<div class="body">
     					<friend :profile_user_id="{{ $user->id }}"></friend>
     				</div>
     			</div>
 			@endif  
</section>

@stop