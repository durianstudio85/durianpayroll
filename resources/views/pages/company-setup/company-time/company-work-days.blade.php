@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li class="active"><a href="{{ Url('company/work-days') }}">Work Days</a></li>
     <li><a href="{{ Url('company/shifts') }}">Shifts</a></li>
     <li><a href="{{ Url('company/shift/per-department') }}">Shift Per Department</a></li>
     <li><a href="{{ Url('company/tardiness-rules') }}">Tardiness Rules</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>The regular working schedule of the company. Employees who do not have a shift assigned to them for a specific day will automatically default to the company's Work Days.</p><br>




		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Day of the Week</th>
		                                        <th>Type</th>
		                                        <th>Work Start</th>
		                                        <th>Work Break Start</th>
		                                        <th>Work Break End</th>
		                                        <th>Work End</th>
		                                        <th>Hours Worked</th>
		                                        <th>Updated</th>
		                                        
		                                                                              
		                                       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                   <!--  <tr class="odd gradeX">
		                                         <th>Day of the Week</th>
		                                        <th>Type</th>
		                                        <th>Work Start</th>
		                                        <th>Work Break Start</th>
		                                        <th>Work Break End</th>
		                                        <th>Work End</th>
		                                        <th>Hours Worked</th>
		                                        <th>Updated</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop