@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{ Url('company/work-days') }}">Work Days</a></li>
     <li><a href="{{ Url('company/shifts') }}">Shifts</a></li>
     <li class="active"><a href="{{ Url('company/shift/per-department') }}">Shift Per Department</a></li>
     <li><a href="{{ Url('company/tardiness-rules') }}">Tardiness Rules</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Assign shifts to entire departments here. You can still override an employee’s department shift by assigning a shift via the employee’s details page.</p><br>

<div class="dp-right full-width dp-text-right">
	<button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Shift Per Department</button>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Department Name</th>
		                                        <th>Monday</th>
		                                        <th>Tuesday</th>
		                                        <th>Wednesday</th>
		                                        <th>Thursday</th>
		                                        <th>Friday</th>
		                                        <th>Saturday</th>
		                                       	<th>Sunday</th>
		                                        <th>Valid From</th>
		                                        <th>Valid Until</th>
       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                       	<th>Department Name</th>
		                                        <th>Monday</th>
		                                        <th>Tuesday</th>
		                                        <th>Wednesday</th>
		                                        <th>Thursday</th>
		                                        <th>Friday</th>
		                                        <th>Saturday</th>
		                                       	<th>Sunday</th>
		                                        <th>Valid From</th>
		                                        <th>Valid Until</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>



@stop