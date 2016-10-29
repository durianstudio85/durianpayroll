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
                                        <th>Type</th>
                                        <th>Employees</th>
                                        <th>Payroll</th>
                                        <th>Amount</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Updated By</th>
                                        <th>Updated Date</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($dp_commision as $commision_tb)

                                    <tr class="odd gradeX">
                                        <td><input type="checkbox"></td>
                                        <td>{{ $commision_tb->commision_type }}</td>
                                        <td>{{ $commision_tb->commision_employees }}</td>
                                        <td>{{ $commision_tb->commision_payroll }}</td>
                                        <td>{{ $commision_tb->commision_amount}}</td>
                                        <td>{{ $commision_tb->commision_created_by}}</td>
                                        <td>{{ $commision_tb->commision_created_date}}</td>
                                        <td>{{ $commision_tb->commision_updated_by}}</td>
                                        <td>{{ $commision_tb->commision_updated_date}}</td>
                                    </tr>
                               
                               @endforeach         
                                    
                                </tbody>
                            </table>


 
</div>



@stop