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
  <button class="btn dp-primary-bg">Download Payslip</button>
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        
                                        <th>Employee Name</th>
                                        <th>Payroll Group</th>
                                        <th>Date</th>
                                        <th>Download</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($dp_bank as $bank_tb)

                                    <tr class="odd gradeX">
                                        <td><input type="checkbox"></td>
                                        <td>{{ $bank_tb->bank_employee_name }}</td>
                                        <td>{{ $bank_tb->bank_payroll_group }}</td>
                                        <td>{{ $bank_tb->bank_date }}</td>
                                        <td>{{ $bank_tb->bank_download }}</td>
                                        
                                    </tr>
                               
                               @endforeach     
                                    
                                </tbody>
                            </table>


 
</div>



@stop