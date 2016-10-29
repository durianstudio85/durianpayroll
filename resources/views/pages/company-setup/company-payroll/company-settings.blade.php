@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')
<br><br><br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{Url('company/payslip-template-wizard')}}" >Payslip Template Wizard</a></li>
     <li class="active"><a href="{{Url('company/settings')}}" >Settings</a></li>
    
  </ul>
</div>


<div class="dp-container">
	<p>Activate your custom payslip templates here.</p><br>





		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Name</th>
		                                        <th>Holiday Type</th>
		                                        <th>Date Type</th>
		                                        <th>Dates</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>

		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                        <th>Name</th>
		                                        <th>Holiday Type</th>
		                                        <th>Date Type</th>
		                                        <th>Dates</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop