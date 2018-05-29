@extends('layouts.app')

@section('content')

      <!-- main -->
  <div class="main">
    <h1>Fingerprint Login</h1>
    <div class="main-w3lsrow">
      <!-- login form -->
      <div class="login-form login-form-left"> 
        <div class="agile-row">
          <div class="head">
            <h2>Login </h2>
            <span class="fa fa-lock"></span>
          </div>          
          <div class="clear"></div>
          <div class="login-agileits-top">  
            <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
              <input type="text" class="name" name="username" Placeholder="Username" required=""/>
              <input type="password" class="password" name="password" Placeholder="Password" required=""/>
              <input type="submit" value="Login Now"> 
            </form>   
          </div> 

        </div>  
      </div>  
    </div>
    <!-- //login form -->
    
    <!-- copyright -->
    <div class="copyright">
      <p> © 2018 Fingerprint. All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">Epoa</a></p>
    </div>
    <!-- //copyright --> 
  </div>  
  <!-- //main -->
@endsection
