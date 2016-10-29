@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')
<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li class="active"><a href="{{ Url('company/leave-types') }}">Leave Types</a></li>
     <li><a href="{{ Url('company/leave-entitlement') }}">Leave Entitlement</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Define your leave types here. You can determine if the leave type is paid or unpaid and requires leave credit and supporting documents. When assigning the leave type to an employee through their details page, you can determine how many hours leave credit the employee has for that particular leave type. Learn more about Leave Types and assigning Leave Types to employees.</p><br>




		<div class="dp-right full-width dp-text-right">
		  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Leave Type</button>
		 
		</div>
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Leave Type</th>
		                                        <th>Abreviation</th>
		                                        <th>Requires Leave Credit</th>
		                                        <th>Payable</th>
		                                        <th>Required Document</th>

		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                                                              
		                                       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                   <!--  <tr class="odd gradeX">
		                                        <th>Leave Type</th>
		                                        <th>Abreviation</th>
		                                        <th>Requires Leave Credit</th>
		                                        <th>Payable</th>
		                                        <th>Required Document</th>

		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop