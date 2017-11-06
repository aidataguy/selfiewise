@include('partials/header')


@if (\Request::is('login'))
	<body class="login_form_outer">
@else
	<body class="home">
@endif	

    <div id="app">
        <init></init>

		@if (\Request::is('profile/*')) 
		 	 @include('layouts/nav_user')
		@elseif (\Request::is('login'))
			@include('layouts/nav_blank')
		@elseif(\Request::is('home'))
			@include('layouts/nav_user')
		@else
			@include('layouts/nav')
		@endif
        @yield('content')
        
        @if(Auth::check())
            <notification :id="'{{ Auth::id() }}'"></notification>  
        @endif
        <audio id="swal_audio" src="{{ asset('audio/notify.ogg')}}"></audio>
    </div>
  	@include('partials/footer')
</body>
</html>
