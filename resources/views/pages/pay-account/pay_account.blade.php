@extends('header_footer')

@section('content')

<br/><br/><br/>
<div class="container">
<br><br>
    <div class="col-md-12 pay-account-banner dp-border">
        <br><br>
        <h4>Durian Payroll Account gives you the ability to easily disburse payments to your employees. Your company does not currently have a<br><br> Durian Accout yet. Create one right now completely free!</h4><br>

        <a href="{{ Url('pay/account/create') }}" class="btn dp-primary-bg"><h4>Create new Durian Payroll Account</h4></a>
        <br><br>
    </div>
 
</div>



@stop