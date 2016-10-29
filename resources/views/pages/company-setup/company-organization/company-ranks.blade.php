@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')
<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
    <li><a  href="{{ Url('company/departments') }}">Departments</a></li>
    <li><a  href="{{ Url('company/positions') }}">Positions</a></li>
    <li class="active"><a  href="{{ Url('company/ranks') }}">Ranks</a></li>
    <li><a  href="{{ Url('company/employment-type') }}">Employment Type</a></li>
  </ul>
</div>


<div class="dp-container">

	<p>Specify employment types applicable to your company. We have created couple of standard types for your convenience.</p><br>




		<div class="dp-right full-width dp-text-right">
		  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Rank">Add Rank</button>
		 
		</div>
		             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
		                                <thead>
		                                    <tr>
		                                        <th>Rank Name</th>
		                                        <th>Rank Description</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                                                              
		                                       
		                                       
		                                    </tr>
		                                </thead>
		                                <tbody>
		                                   <!--  <tr class="odd gradeX">
		                                        <th>Position Name</th>
		                                       <th>Rank Description</th>
		                                        <th>Created By</th>
		                                        <th>Updated By</th>
		                                        
		                                      
		                                    </tr> -->
		                                                                      
		                                </tbody>
		                            </table>





</div>


<!-- ADD Rank FORM-->

 <div class="modal fade" id="Add-Rank" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Rank</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Rank Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-3">Rank Description</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-3">Created By</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Updated By</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
  
            </form>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="button" class="btn dp-primary-bg" value="Save">
        </div>
      </div>
   </div>
</div>

<!-- END ADD Position FORM -->


@stop