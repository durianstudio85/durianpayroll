@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<div class="dp-container">
<br><br></br>
	<p>Determine your night shift hours here. Employees will be paid a premium for working during these hours. Learn more about Night Shift and Night Differential.</p><br>


<div class="dp-panel-form col-md-12">
     
        <h3>Night Shift</h3>
        <br>
        
        <div class="form-horizontal">


          <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-sm-4">Night Shift From *</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder=" ">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Night Shift To *</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder=" ">
                </div>
              </div>
              
          </div>


    
        </div>
     </div>   



    

    <div class="col-md-2 pull-right">
      <input type="button" class="btn dp-white-bg pull-left" value="Cancel">
      <input type="button" class="btn dp-primary-bg pull-right" value="Save">
      <br><br><br><br>
    </div>

		





</div>


@stop