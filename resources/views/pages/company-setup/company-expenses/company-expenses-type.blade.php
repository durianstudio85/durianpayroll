@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<div class="dp-container">
<br><br><br>
	<p>If your company has multiple locations or branches, define them here. Employee work locations can be determined via assignment in the employee’s details page, which work in conjunction with location-specific holidays.</p><br>




		<div class="dp-right full-width dp-text-right">
		  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Expenses Type</button>
		 
		</div>
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Expense Type</th>
		                                        <th>Expense Minimum Amount</th>
		                                        <th>Expense Maximum Amount</th>
		                                        <th>Expense Require Receipt</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                                                              
		                                       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                   <!--  <tr class="odd gradeX">
		                                        <th>Expense Type</th>
		                                        <th>Expense Minimum Amount</th>
		                                        <th>Expense Maximum Amount</th>
		                                        <th>Expense Require Receipt</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop