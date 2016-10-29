@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{ Url('company/work-days') }}">Work Days</a></li>
     <li class="active"><a href="{{ Url('company/shifts') }}">Shifts</a></li>
     <li><a href="{{ Url('company/shift/per-department') }}">Shift Per Department</a></li>
     <li><a href="{{ Url('company/tardiness-rules') }}">Tardiness Rules</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Define your employees’ daily work schedule here. An employee’s attendance is based on whether he is clocked in or not during the hours as determined by the shift that has been assigned to him. Learn more about Shifts.</p><br>

<div class="dp-right full-width dp-text-right">
	<button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Shift</button>
</div>


		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Shift Name</th>
		                                        <th>Shift Work Start</th>
		                                        <th>Shift Work End</th>
		                                        <th>Shift Break Start</th>
		                                        <th>Shift Break End</th>
		                                        <th>Short Break in Minutes</th>
		                                        <th>Hours Worked ...</th>
       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                       	<th>Shift Name</th>
		                                        <th>Shift Work Start</th>
		                                        <th>Shift Work End</th>
		                                        <th>Shift Break Start</th>
		                                        <th>Shift Break End</th>
		                                        <th>Short Break in Minutes</th>
		                                        <th>Hours Worked ...</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop