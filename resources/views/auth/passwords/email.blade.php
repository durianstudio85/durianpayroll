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
            <form class="login-form" method="POST" role="form" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
                <p class="register-feed">Reset Password</p>
                <p class="register-feed-2"></p>
                <input class="register-input" id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                <input type="submit" class="btn-login" value="Send Password Reset Link">
                <!-- <p class="register-feed-2">By clicking on "Register", you <br> confirm that you accept the <a href="#" class="register-terms">Terms of Service</a></p> -->
                <hr>
                <p class="register-feed-2 login-now">Already have an account? <a href="{{ url('/login') }}" class="register-terms">Login Now!</a></p>
            </form>
        </div>
        <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/npm.js') }}"></script>
    </body>
</html>