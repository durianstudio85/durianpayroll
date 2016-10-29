@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')
<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{ Url('company/leave-types') }}" >Leave Types</a></li>
     <li class="active"><a href="{{ Url('company/leave-entitlement') }}">Leave Entitlement</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Define policies for leave accrual and leave conversion assigned to employee ranks here. You can also set what happens to unused leave on the conversion date, as well as when an employee is terminated. Learn more about Leave Entitlement.</p><br>




		<div class="dp-right full-width dp-text-right">
		  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Leave Entitlement</button>
		 
		</div>
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Rank</th>
		                                        <th>Leave Type</th>
		                                        <th>Leave Accrued</th>
		                                        <th>For Every</th>
		                                        <th>Period</th>
		                                        <th>Accrued After</th>
		                                        <th>After Period</th> 
		                                        <th>Conversion Period</th>
		                                        <th>Created By</th>
		                                        
		                                                                              
		                                       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                   <!--  <tr class="odd gradeX">
		                                        <th>Rank</th>
		                                        <th>Leave Type</th>
		                                        <th>Leave Accrued</th>
		                                        <th>For Every</th>
		                                        <th>Period</th>
		                                        <th>Accrued After</th>
		                                        <th>After Period</th> 
		                                        <th>Conversion Period</th>
		                                        <th>Created By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop