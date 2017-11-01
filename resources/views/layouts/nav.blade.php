  <header class="default">

        @if (\Request::is('/'))
            <div class="top_home_img" >
                <img src="/images/home_img.jpg" alt="" />
                <div class="hover_text">Click,Upload <br /> and Win</div>
            </div>
        @else
            
        @endif
        
        <nav class="navbar navbar-default navbar-fixed brand-center bootsnav on no-full" id="navbarMain">
                    <div class="container">
                        <div class="navbar-header">
                            {{-- Hamburger --}}
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false" >
                            <i class="fa fa-bars"></i>
                            </button>
                            <!-- Branding Image -->
                            <a class="navbar-brand" href="{{ url('/') }}">
                               <img src="{{asset('images/Logo.png')}}" alt="" />
                            </a>
                        </div>

                        <div class="navbar-collapse collapse" id="navbar-menu navbarCollapse" aria-expanded="false" style="height: 0px;">
                            <!-- Left Side Of Navbar -->
                            <div class="col-half left"> 
                                        <ul class="nav navbar-nav navbar-left">                 
                                            <li><a href="#about">ABOUT US </a></li>
                                            <li><a href="#gallery"> GALLERY </a></li>
                                            <li><a href="#feature">FEATURES </a></li>
                                     @if(Auth::check())
                                        <li><a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">My Profile</a></li>
                                        
                                    @endif
                                </ul>
                            </div>
                            <div class="col-half right">    
                                <ul class="nav navbar-nav navbar-left">
                                            <li><a href="#testimonial"> TESTIMONIAL</a></li>
                                    
                                    <li><a href="#contact">CONTACT US </a></li>
                                    @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">LOGIN</a></li>
                            {{-- <li><a href="{{ url('/register') }}">REGISTER</a></li> --}}
                           
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                          
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        </ul>
                    </div>
            </div>
        </nav>
    </header>