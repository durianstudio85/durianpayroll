@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')


<div class="dp-container">

<br><br><br>



<p>Basic information about your company. The Company Logo you upload here will be visible in the top left corner of the navigation bar as well as your payslips, clock in app and 
bank advice.</p><br>




    <div class="dp-panel-form col-md-12">
     
        <h3>Company Information</h3>
        <br>
        
        <div class="form-horizontal">


          <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-sm-4">Business Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder=" ">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Trade Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder=" ">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" >Organization Type</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder=" ">
                </div>
              </div>
          </div>



           <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-sm-4" >Company Logo</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control" placeholder=" ">
                </div>
              </div>
          </div>
     



    
        </div>
     </div>   



  

    <div class="dp-panel-form col-md-12">
        <h3>Business Address</h3>
        <br>
        
        <div class="form-horizontal">

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-sm-4">Address</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder=" ">
                        </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">City</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>

              </div>

               <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-sm-4">Zip Code</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder=" ">
                        </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">Country</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>
              </div>

        </div>
     </div>



    <div class="dp-panel-form col-md-12">
        <h3>Contact Information</h3>
        <br>
        
        <div class="form-horizontal">

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-sm-4">Email Address</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" placeholder=" ">
                        </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">Telephone</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="control-label col-sm-4">Fax</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder=" ">
                        </div>
                  </div>
              </div>

               <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-sm-4">Website</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder=" ">
                        </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">Telephone Ext.</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">Mobile</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>
              </div>

        </div>
     </div>



    <div class="dp-panel-form col-md-12">
        <h3>Government Registration</h3>
        <br>
        
        <div class="form-horizontal">

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-sm-4">Business Category</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder=" ">
                        </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">RDO</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="control-label col-sm-4">HDMF</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder=" ">
                        </div>
                  </div>
              </div>

               <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label col-sm-4">TIN</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder=" ">
                        </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">SSS</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">Philhealth</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" placeholder=" ">
                        </div>
                   </div>
              </div>

        </div>
     </div>

    <div class="col-md-2 pull-right">
      <input type="button" class="btn dp-white-bg pull-left" value="Cancel">
      <input type="button" class="btn dp-primary-bg pull-right" value="Submit">
      <br><br><br><br>
    </div>


</div>

@stop