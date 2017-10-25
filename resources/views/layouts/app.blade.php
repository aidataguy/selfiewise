<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/sweetalert.css"> -->
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li><a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">My Profile</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            <button id="btn-login" type="button" class="btn btn-primary btn-md">
                                <span> Login with Facebook</span>
                            </button>
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
        @yield('content')
        <notification :id="'{{ Auth::id() }}'"></notification>  
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        $.ajaxSetup({ cache: true }); // since I am using jquery as well in my app
        $.getScript('//connect.facebook.net/en_US/sdk.js', function () {
            // initialize facebook sdk
            FB.init({
                appId: '1995189227431620', // replace this with your id
                status: true,
                cookie: true,
                version: 'v2.8',
            });

            // attach login click event handler
            $("#btn-login").click(function(){
                FB.login(processLoginClick, {scope:'public_profile,email,user_friends', return_scopes: true});  
            });
        });
    });

        // function to send uid and access_token back to server
        // actual permissions granted by user are also included just as an addition
        function processLoginClick (response) {    
            var uid = response.authResponse.userID;
            var access_token = response.authResponse.accessToken;
            var permissions = response.authResponse.grantedScopes;
            var data = { uid:uid, 
                         access_token:access_token, 
                         _token:'{{ csrf_token() }}', // this is important for Laravel to receive the data
                         permissions:permissions 
                       };        
            postData("{{ url('/login') }}", data, "post");
        }

        // function to post any data to server
        function postData(url, data, method) 
        {
            method = method || "post";
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", url);
            for(var key in data) {
                if(data.hasOwnProperty(key)) 
                {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", data[key]);
                    form.appendChild(hiddenField);
                 }
            }
        document.body.appendChild(form);
        form.submit();
    }

</script>
    @include('sweet::alert')
</body>
</html>
