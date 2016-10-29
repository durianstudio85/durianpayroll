@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{ Url('company/methods') }}">Methods</a></li>
     <li class="active"><a href="{{ Url('company/restrictions') }}">Restrictions</a></li>
     <li><a href="{{ Url('company/assign-restrictions') }}">Assign Restrictions</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Determine the only IP addresses your employees can clock in or out from here.</p><br>

<div class="full-width">
	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Add Network Restriction</button>
	<br>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Name</th>
		                                        <th>IP Pattern</th>
		                                        <th>Description</th>

		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                       	<th>Name</th>
		                                        <th>IP Pattern</th>
		                                        <th>Description</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>




@stop