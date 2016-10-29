@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<div class="dp-container">
<br><br><br>
	<p>Create your deduction types here. Deduction examples would be Health Plans and Gym Memberships. When assigning deductions to your employees, you can determine the amount deducted per pay as well as how long the deduction will be valid for. Learn more about deductions.</p><br>

<div class="full-width">
	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Add Other Deductions</button>
	<br>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Other Deduction Type</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                           
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                        <th>Other Deduction Type</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>



@stop