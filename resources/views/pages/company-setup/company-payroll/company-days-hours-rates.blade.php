@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<div class="dp-container">
<br><br><br>
	<p>These are the default salary rates based on the combination of different Day, Holiday and Time Types as set by the Philippine government. These can be edited but only if you are familiar with Philippine labor laws. Learn more about Day/Hour Rates.</p><br>





		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Date Type</th>
		                                        <th>Holiday Type</th>
		                                        <th>Time Type</th>
		                                        <th>Abbrevation Type</th>
		                                        <th>Rate</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                           
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                        <th>Date Type</th>
		                                        <th>Holiday Type</th>
		                                        <th>Time Type</th>
		                                        <th>Abbrevation Type</th>
		                                        <th>Rate</th>
		                                        
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>



@stop