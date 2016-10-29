<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>Durian Payroll</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/open-sans.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/helper.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">


    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

  <script src="{{ asset('js/Chart.min.js') }}"></script>

</head><body onload="displayLineChart();">

<nav class="dp-nav">
  <div class="dp-logo">
    <img src="{{ asset('images/logo.png') }}">
  </div>
  <div class="dp-nav-menu">
    <a href="{{ Url('dashboard') }}"><i class="pe-7s-home pe-2x"></i></a>
    <a href="{{ Url('payroll') }}"><i class="pe-7s-cash pe-2x"></i></a>
    <a href="{{ Url('pay/account') }}"><i class="pe-7s-credit pe-2x"></i></a>
    <a href="{{ Url('employee-201') }}"><i class="pe-7s-add-user pe-2x"></i></a>
    <a href="#"><i class="pe-7s-clock pe-2x"></i></a>
  </div>
  <div class="dp-nav-logout dp-right">
    <a href="#"><i class="pe-7s-power pe-2x"></i></a>   
  </div>
  <div class="dp-nav-user">
    
  </div>
  <div class="dp-nav-setting dp-right">
    <a href="#"><i class="pe-7s-speaker pe-2x"></i></a>
    <a href="#"><i class="pe-7s-help1 pe-2x"></i></a>
    <a href="{{ Url('company/setup') }}"><i class="pe-7s-config pe-2x"></i></a>
  </div>
</nav>



  @yield('content')




<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/npm.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
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