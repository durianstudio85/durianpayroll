@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{ Url('company/methods') }}">Methods</a></li>
     <li><a href="{{ Url('company/restrictions') }}">Restrictions</a></li>
     <li class="active"><a href="{{ Url('company/assign-restrictions') }}">Assign Restrictions</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Assign existing network restrictions to your employees here. Restrictions can be assigned to departments, positions, ranks or individual employees. You can also determine the length of the assignment here. Learn more about Network Restrictions.</p><br>

<div class="full-width">
	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Assign Restriction</button>
	<br>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Assign To</th>
		                                        <th>Restricted To</th>
		                                        <th>Date From</th>
		                                        <th>Date To</th>

		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                        <th>Assign To</th>
		                                        <th>Restricted To</th>
		                                        <th>Date From</th>
		                                        <th>Date To</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>




@stop