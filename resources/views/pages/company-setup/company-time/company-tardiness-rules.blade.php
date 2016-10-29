@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{ Url('company/work-days') }}">Work Days</a></li>
     <li><a href="{{ Url('company/shifts') }}">Shifts</a></li>
     <li><a href="{{ Url('company/shift/per-department') }}">Shift Per Department</a></li>
     <li class="active"><a href="{{ Url('company/tardiness-rules') }}">Tardiness Rules</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Define your tardiness rules for fixed shifts and assign them to your company ranks here. Tardiness Rules determine a grace period in which an employee can clock in after the start of the shift with no deductions, and allows you to define deduction amount applicable when employee clocks in after the grace period. Fixed shifts do not have a grace period defined by default so any late clock in is deducted in full. Learn more about Tardiness Rules.</p><br>

<div class="dp-right full-width dp-text-right">
	<button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Tardiness Rule</button>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Rank</th>
		                                        <th>Grace Period</th>
		                                        <th>Tardiness Deduction</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                       
       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                       	<th>Rank</th>
		                                        <th>Grace Period</th>
		                                        <th>Tardiness Deduction</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>



@stop