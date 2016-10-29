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
 
</div>

             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        
                                        <th>Type</th>
                                        <th>Form</th>
                                        <th>Date</th>
                                        <th>Frequency</th>
                                        <th>Download</th>
                                        <th>Action</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($dp_governmentform as $governmentform_tb)

                                    <tr class="odd gradeX">
                                        
                                        <td>{{ $governmentform_tb->government_type }}</td>
                                        <td>{{ $governmentform_tb->government_form }}</td>
                                        <td>{{ $governmentform_tb->government_date }}</td>
                                        <td>{{ $governmentform_tb->government_frequency}}</td>
                                        <td>{{ $governmentform_tb->government_download}}</td>
                                        <td>{{ $governmentform_tb->government_action}}</td>
                                        
                                    </tr>
                               
                               @endforeach
                                    
                                </tbody>
                            </table>


 
</div>



@stop