<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>Durian Payroll</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/open-sans.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/helper.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
      
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/dist/css/selectize.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/dist/css/selectize.bootstrap3.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/dist/css/selectize.defualt.css') }}">
        <script src="{{ asset('assets/selectize/dist/js/selectize.js') }}"></script>
        <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style type="text/css">
            i.active { background-color: #1fb4ae;  color: #fff;}
        </style>

    </head>
    <body onload="displayLineChart();">

        <nav class="dp-nav">
            <div class="dp-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"></a>
            </div>
            @if ( Option::company()->nav == 'top' )
                <div class="dp-nav-menu">
                    <a href="{{ Url('dashboard') }}"><i class="{{ Request::is('dashboard*') ? 'active' : '' }} pe-7s-home pe-2x"></i></a>
                    <a class="" href="{{ Url('payroll') }}"><i class="{{ Request::is('payroll') ? 'active' : '' }} pe-7s-cash pe-2x"></i></a>
                    <!-- <a class="" href="{{ Url('pay/account') }}"><i class="{{ Request::is('pay/account*') ? 'active' : '' }} pe-7s-credit pe-2x"></i></a> -->
                    <a class="" href="{{ Url('employees') }}"><i class="{{ Request::is('employees') ? 'active' : '' }} pe-7s-add-user pe-2x"></i></a>
                    <!-- <a href="#"><i class="pe-7s-clock pe-2x"></i></a> -->
                </div>
            @endif
            <div class="dp-nav-logout dp-right">
                <a href="{{ url('/logout') }}"><i class="pe-7s-power pe-2x"></i></a>   
            </div>
            <div class="dp-nav-user"></div>
            <div class="dp-nav-setting dp-right">
                <a href="#"><i class="pe-7s-speaker pe-2x"></i></a>
                <a href="#"><i class="pe-7s-help1 pe-2x"></i></a>
                <a href="{{ Url('company/setup') }}"><i class="pe-7s-config pe-2x"></i></a>
            </div>
        </nav>
        @include('pages.company-setup.include.admin-sidebar')
        @yield('content')
        @include('modal.addEmployee')
        @include('modal.addPayroll')
        <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/npm.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.uniform.min.js') }}"></script>
        <script src="{{ asset('assets/js/selectize.js') }}"></script>
        <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
    </body>
</html>