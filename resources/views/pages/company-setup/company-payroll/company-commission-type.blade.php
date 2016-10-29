@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<br><br><br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li><a href="{{Url('company/allowance-type')}}" >Allowance Type</a></li>
     <li><a href="{{Url('company/bonus-type')}}">Bonus Type</a></li>
     <li  class="active"><a href="{{Url('company/commission-type')}}">Commission Type</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Create your commission types here. You can set whether they are taxed, untaxed or partially taxed. You can determine commission amounts when you assign the commission type to an employee in the Commission section of the Payroll tab. Learn more about Commissions.</p><br>


<div class="full-width">
	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Add Commission Type</button>
	<br>
</div>



		
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Name</th>
		                                        <th>Taxable</th>
		                                        <th>Maximum Non-Taxable Amount</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                           
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                  <!--  <tr class="odd gradeX">
		                                        <th>Name</th>
		                                        <th>Amount</th>
		                                        <th>Plan</th>
		                                        <th>Tax Details</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>








    

   


</div>



@stop