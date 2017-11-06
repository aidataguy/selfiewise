@extends('layouts.app')

@section('content')

	<section class="inner_content">
    	<div class="container"> 
        	<div class="col-lg-12 coverpic_outer">
        		<div class="cover_image"><img src="{{ asset('images/bg.jpg')}} "/></div>
                <div class="col-lg-12">
                	<div class="display_pic pull-left"><img src="{{  Auth::User()->avatar }}" /></div>
                    <div class="edit_box pull-right">
                    	<ul>
                        	<li><a href="">Update Cover Photo </a></li>
                            <li><a href="">  Update Profile Photo</a></li>                            
                        </ul>
                        <a href="{{ route('profile.edit') }}" class="edit_profile"><i class="fa fa-edit"></i>Edit Profile</a>
                    </div>
                    
                </div>
                
           	</div>
        	<div class="col-lg-12 profile_outer">
            	<div class="col-lg-3 col-md-3 col-sm-3">
                 	<div class="personal_detail">
                        <div class="row-fluid">
                            <h5><i class="fa fa-user-plus"></i>personal detail</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error</p>
                            <p> sit voluptatem accusantium doloremque laudantium,totam rem aperiam, eaque ipsa quae ab illo inventore 
                            veritatis</p>
                        </div>
                   	</div>
                    
                    <div class="personal_detail">
                        <div class="row-fluid">
                            <h5><i class="fa-image fa"></i>photos</h5>
                            <ul class="photo_sec">
                            	<li class="col-lg-4"><a href=""><img src="images/profile_phot_sec.jpg" alt="" /></a></li>
                                <li class="col-lg-4"><a href=""><img src="images/profile_phot_sec.jpg" alt="" /></a></li>
                                <li class="col-lg-4"><a href=""><img src="images/profile_phot_sec.jpg" alt="" /></a></li>
                                <li class="col-lg-4"><a href=""><img src="images/profile_phot_sec.jpg" alt="" /></a></li>
                                <li class="col-lg-4"><a href=""><img src="images/profile_phot_sec.jpg" alt="" /></a></li>
                                <li class="col-lg-4"><a href=""><img src="images/profile_phot_sec.jpg" alt="" /></a></li>
                                
                            </ul>
                        </div>
                   	</div>
                    
                    <div class="personal_detail">
                        <div class="row-fluid">
                        @if($count = App\Friendship::where('status','=','1')->count()	)
                           <h5><i class="fa-image fa"></i>Friends - <span>{{ $count }}</span></h5>
                           @foreach ($friends as $friend)
                            <ul class="friend_sec">
                            	
	                            	<li class="col-lg-4">
	                            		<img src="images/profile_phot_sec.jpg" alt="" />
	                                	<a href="{{ url($friend->name) }}">
	                                    	<img src="{{ url($friend->avatar) }}" alt="" />
	                                        <h5>{{ $friend->name }}</h5>
	                                	</a>
	                                </li>
                                @endforeach 
                        	@endif
                            </ul>
                            <a href="" class="more">more</a>
                        </div>
                   	</div>
                </div>
            	<div class="profile_timeline col-lg-9 col-md-9 col-sm-9">
                    <div class="timeline_starts">
                    	<div class="timeline_by_month">	
							@if($posts = App\Post::all())	
								@foreach($posts as $post)
		                            <article>
		                                <div class="post">
		                                    <div class="row-fluid post_top">
		                                        <div class="small_pic"><img src="{{ $post->user->avatar }}" /></div>
		                                        <h3>{{ $post->user->name}}</h3>
		                                        <div class="post_date">October 25,2017 </div>
		                                    </div>
		                                    <img src="images/img1.jpg" class="post_img" alt="" />
		                                    <p>{{ $post->content }}</p>
		                                    
		                                    <hr />
		                                    <div class="row-fluid post_btm">
		                                        <div class="post_like">
		                                            <i class="fa fa-heart"></i> <span>5 likes</span>
		                                        </div>
		                                        <div class="post_comment"> <input type="text" /> </div>
		                                        <div class="post_property">
		                                        	<i class="fa fa-ellipsis-v"></i>
		                                        	<div class="report_box">
		                                            	<div><a href="">report</a> </div>
		                                                <div><a href="">block </a></div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    
		                                </div>
		                            </article>
		                            
		                         @endforeach
								@endif   
                            
                   		</div> <!--timeline_by_month-->
                    </div>
                    
                </div>
                
                
            </div>    
    	</div>	
    </section>
{{-- Existing Content --}}
 {{-- <post></post> --}}

@endsection
