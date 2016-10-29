@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<div class="dp-container">
<br><br><br>
	<p>Create Approval Groups here. Approval groups approve requests made through Employee Self Service, and are assigned to an employee for each of the following workflows: timesheet, leave, loan, expense and overtime. Each Approval Group can have multiple levels of approvers, and are assigned to each employee via their details page. Learn more about Approval Workflows.</p><br>




		<div class="dp-right full-width dp-text-right">
		  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Approval Group</button>
		 
		</div>
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Approval Group</th>
		                                        <th>Approvers</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                                                              
		                                       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                   <!--  <tr class="odd gradeX">
		                                        <th>Approval Group</th>
		                                        <th>Approvers</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop