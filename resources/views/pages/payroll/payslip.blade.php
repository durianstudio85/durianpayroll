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
                                        <th>Issued On</th>
                                        <th>Access by Employee</th>
                                        <th>Download</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($dp_payslip as $payslip_tb)

                                    <tr class="odd gradeX">
                                        
                                        <td>{{ $payslip_tb->payslip_employee_name }}</td>
                                        <td>{{ $payslip_tb->payslip_payroll_group }}</td>
                                        <td>{{ $payslip_tb->payslip_issued_on }}</td>
                                        <td>{{ $payslip_tb->payslip_access_by_employee }}</td>
                                        <td>{{ $payslip_tb->payslip_download }}</td>
   
                                    </tr>
                               
                                @endforeach
                                    
                                </tbody>
                            </table>


 
</div>



@stop