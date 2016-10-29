@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<div class="dp-container">
<br><br><br>
	<p>To be included in payroll, employees must belong to a Payroll Group. Payroll Groups define details such as pay frequency, the payroll period, day factor, pay day and the payroll calendar. Employees are assigned to payroll groups via their details page. Learn more about Payroll Groups.</p><br>

<div class="full-width">
	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Add Payroll Group</button>
	<br>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Payroll Group</th>
		                                        <th>Payroll Cycle</th>
		                                        <th>Day Factor</th>
		                                        <th>Hours Per Day</th>
		                                        <th>Next Pay Run</th>
		                                        <th>Employee</th>

		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                        th>Payroll Group</th>
		                                        <th>Payroll Cycle</th>
		                                        <th>Day Factor</th>
		                                        <th>Hours Per Day</th>
		                                        <th>Next Pay Run</th>
		                                        <th>Employee</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop