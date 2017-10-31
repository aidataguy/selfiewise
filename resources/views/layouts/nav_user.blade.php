<header class="default">
<div class="container">    
    <a href="{{url('/')}}" class="logo"><img src="{{asset('images/Logo_black.png')}}" /></a>
    
    <div class="header_right pull-right">
    	
        <div class="search_bar"> 
            <i class="fa fa-search"></i>
            <input type="text" class="input_search" />
        </div>

        <div class="pull-left">
            @if(Auth::check())
                <a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}"><i class="fa fa-home"></i></a>
            @endif

            
            <unread></unread></i>
            <a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">
            <span><img src="{{ Auth::user()->avatar }}" alt="" class="nav-image img-circle"></span>{{ Auth::user()->name }}</a>
		</div> 
        
</header>
	
	