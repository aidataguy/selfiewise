@include('partials/header')

    <!-- Mixins-->
    <!-- Pen Title-->
    <div class="pen-title">
      <a href="{{url('/')}}" class="login_logo"><img src="images/Logo.png"></a>
    </div>

    <div class="container">
      <div class="card"></div>
      <div class="card">
        <h1 class="title">Login</h1>
        
        <a href="{{url('/login/facebook')}}" class="fb_login"><img src="images/facebook.png" alt=""></a>
        
        <div class="or">or</div>
        
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
          <div class="input-container">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            <label for="email">Email Address</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            <label for="password">Password</label>
            <div class="bar"></div>
          </div>
          <div class="button-container">
            <button type="submit"><span>Go</span></button>
          </div>
          <div class="footer"><a href="{{ url('/password/reset') }}">Forgot your password?</a></div>
        </form>
      </div>
      <div class="card alt">
         <div class="toggle">
            <div class="signup_div"><span>sign up</span><i class="fa fa-sign-in"></i></div></div>
        <h1 class="title">Register
          <div class="close"></div>
        </h1>
        <form>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required/>
            <label for="#{label}">Username</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required/>
            <label for="#{label}">Password</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required/>
            <label for="#{label}">Repeat Password</label>
            <div class="bar"></div>
          </div>
          <div class="button-container">
            <button><span>Next</span></button>
          </div>
        </form>
      </div>
    </div>
@include('partials/footer')