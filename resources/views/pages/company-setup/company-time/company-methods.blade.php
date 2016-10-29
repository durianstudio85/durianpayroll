@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li class="active"><a href="{{ Url('company/methods') }}">Methods</a></li>
     <li><a href="{{ Url('company/restrictions') }}">Restrictions</a></li>
     <li><a href="{{ Url('company/assign-restrictions') }}">Assign Restrictions</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Enable or disable the web bundy, which allows employees to clock in from their Employee Self Service dashboards.</p><br>

<div class="full-width">
<div class="dp-bundy col-md-8">
	<span>Web Bundy Time Entry</span> 
	
		<label class="switch">
		  <input type="checkbox" checked>
		  <div class="slider round"></div>
		</label>
		

 <span>Override the company-wide setting for specific employees.</span>
</div>


	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Add Employee</button>
	<br>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Employee ID</th>
		                                        <th>Employee Name</th>
		                                        <th>Web Bundy</th>

		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                       	<th>Employee ID</th>
		                                        <th>Employee Name</th>
		                                        <th>Web Bundy</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>




@stop