@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<br><br><br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
     <li class="active"><a href="{{Url('company/payslip-template-wizard')}}" >Payslip Template Wizard</a></li>
     <li><a href="{{Url('company/settings')}}" >Settings</a></li>
    
  </ul>
</div>

<div class="dp-container">

	<p>Determine your night shift hours here. Employees will be paid a premium for working during these hours. Learn more about Night Shift and Night Differential.</p><br>


<div class="dp-panel-form col-md-12">
     
        <h3>Select a Template</h3>
        <br>
        
        <div class="form-horizontal">

                  <label class="checkbox-inline">
                  <div class="dp-portrait"></div>
				      <label class="radio-inline">
					      <input type="radio">Portrait A4 Size
					    </label>
				    </label>
 

                  <label class="checkbox-inline">
                  <div class="dp-portrait"></div>
				      <label class="radio-inline">
					      <input type="radio">More Payslip Templates Coming Soon
					    </label>
				   </label>
          
         


    
        </div>
     </div>   



    

    <div class="col-md-2 pull-right">
      <input type="button" class="btn dp-white-bg pull-left" value="Cancel">
      <input type="button" class="btn dp-primary-bg pull-right" value="Save">
      <br><br><br><br>
    </div>


</div>



@stop