@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<div class="dp-container">
<br><br><br>
	<p>Create your loan types here. Loan amounts, term and payment schemes can be defined when you assign loans to your employees in their details page. Learn more about Loans.</p><br>

<div class="full-width">
	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Add Loan Type</button>
	<br>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Loan Type</th>
		                                        <th>Loan Description</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                           
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                        <th>Loan Type</th>
		                                        <th>Loan Description</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


@stop