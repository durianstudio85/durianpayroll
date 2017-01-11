@extends('header_footer')


@section('content')

<div class="dp-submenu">
  
       <ul>
        <li><a href="{{ Url('payroll') }}"> Payroll </a></li>
        <li><a href="{{ Url('payslip') }}"> Payslip </a></li>
        <li><a href="{{ Url('bank') }}"> Bank </a></li>
        <li><a href="{{ Url('governmentforms') }}"> Government Form </a></li>
        <li><a href="{{ Url('bonus') }}"> Bonus </a></li>
        <li><a href="{{ Url('commision') }}"> Commision </a></li>
      </ul>
    
</div>



<div class="container">
<div class="dp-right full-width dp-text-right">
  <button class="btn dp-primary-bg">+  Add</button>
  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>Group Type</th>
                                        <th>Recipients</th>
                                        <th>Bonus Date</th>
                                        <th>Amount</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                             
                                    
                                </tbody>
                            </table>


 
</div>



@stop