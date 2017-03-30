<!DOCTYPE html>
<html>
<head>
    <title>Durian Payroll</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/helper.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="{{ asset('js/Chart.min.js') }}"></script>


<body bgcolor="#f1f3f6">

<div class="login-panel">
    <form class="login-form" method="POST" role="form" action="{{ url('/register') }}">
    {{ csrf_field() }}
        
        <p class="register-feed">Sign Up for a Free Account</p>
        <p class="register-feed-2">No commitment. No credit card required.</p>

        <input class="register-input" id="companyname" type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}">

        
        <input class="register-input firstname" id="firstname" type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
            
        <input class="register-input lastname" id="lastname" type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
       

        <div class="clearfix"></div>

        <input class="register-input" id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        <input class="register-input" id="password" type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
             @endif

        <input class="register-input" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif

        <input type="submit" class="btn-login" value="Register">

        <p class="register-feed-2">By clicking on "Register", you <br> confirm that you accept the <a href="#" class="register-terms">Terms of Service</a></p>

        <hr>

        <p class="register-feed-2 login-now">Already have an account? <a href="{{ url('/login') }}" class="register-terms">Login Now!</a></p>

    </form>
</div>


<script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/npm.js') }}"></script>
</body>
</html>