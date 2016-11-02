<!DOCTYPE html>
<html>
<head>
	<title>Durian Payroll</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/helper.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<script src="{{ asset('js/Chart.min.js') }}"></script>


<body bgcolor="#f1f3f6">
<div class="login-panel">
	<div class="login-banner"><img src="{{ asset('images/Login-Banner.png') }}"></div>
	<form class="login-form" method="POST" role="form" action="{{ url('/login') }}">
	{{ csrf_field() }}
		<div class="login-feed">
			<span class="pe-7s-mail pe-2x login-icon"></span><input class="login-input" id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
			@if ($errors->has('email'))
	            <span class="help-block">
	            	<strong>{{ $errors->first('email') }}</strong>
	            </span>
            @endif
		</div>
		<div class="login-feed">
			<span class="pe-7s-lock pe-2x login-icon"></span><input id="password" type="password"  placeholder="Password" class="login-input class="form-control" name="password">
			@if ($errors->has('password'))
	            <span class="help-block">
	            	<strong>{{ $errors->first('password') }}</strong>
	            </span>
            @endif
		</div>

		<label class="control control--checkbox">Keep me logged in
      		<input type="checkbox" name="remember">
	      <div class="control__indicator"></div>
	      <a href="#" class="login-forgot-pass" href="{{ url('/password/reset') }}">Forgot password?</a>
	    </label>

	    <input type="submit" class="btn-login" value="Log In">

	</form>
</div>


<script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/npm.js') }}"></script>
</body>
</html>