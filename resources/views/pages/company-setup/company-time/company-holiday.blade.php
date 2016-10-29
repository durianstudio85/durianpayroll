@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<div class="dp-container">
<br><br></br>
	<p>Default Philippine holidays are listed here, and you can determine dates for moveable holidays. Local or company holidays can also be added. Employees are paid a premium when working on holidays, and you can determine if an employee will get paid for unworked holidays in their details page. Learn more about Holidays and Premium Pay.</p><br>




		<div class="dp-right full-width dp-text-right">
		  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#">Add Holiday</button>
		 
		</div>
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