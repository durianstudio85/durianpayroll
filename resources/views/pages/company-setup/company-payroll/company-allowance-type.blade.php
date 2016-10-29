@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br><br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li class="active"><a href="{{Url('company/allowance-type')}}" >Allowance Type</a></li>
     <li><a href="{{Url('company/bonus-type')}}">Bonus Type</a></li>
     <li><a href="{{Url('company/commission-type')}}">Commission Type</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Create your allowance types here, and determine whether they are taxed, untaxed or partially taxed. You can determine allowance amounts and schemes when assigning allowances to your employees in their details page. Learn more about Allowance Types.</p><br>


<div class="full-width">
	<button class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#">Add Allowance Type</button>
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
		                                        <th>Taxable</th>
		                                        <th>Maximum Non-Taxable Amount</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>








    

   


</div>

@stop