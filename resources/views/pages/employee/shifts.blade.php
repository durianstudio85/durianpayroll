@extends('header_footer')


@section('content')

<div class="dp-submenu">
  
       <ul>
        <li><a href="{{ Url('employee-201') }}"> 201 Files </a></li>
        <li><a href="{{ Url('earnings') }}"> Earnings </a></li>
        <li><a href="{{ Url('payAdjustment') }}"> Basic Pay Adjustments </a></li>
        <li><a href="{{ Url('allowance') }}"> Allowances </a></li>
        <li><a href="{{ Url('loan') }}"> Loans </a></li>
        <li><a href="{{ Url('deduction') }}"> Deductions </a></li>
        <li><a href="{{ Url('adjustment') }}"> Adjustments </a></li>
        <li><a href="{{ Url('shifts') }}"> Shifts </a></li>
        <li><a href="{{ Url('leaves') }}"> Leaves </a></li>
        <li><a href="{{ Url('termination') }}"> Terminations </a></li>
        <li><a href="{{ Url('YTD-summary') }}"> YTD Summary </a></li>
      </ul>
    
</div>




<div class="container">
<div class="dp-right full-width dp-text-right">
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Shift">Add Shift</button>
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Shift">Mass Add Shift</button>
  <button class="btn dp-danger-bg">Download Shift</button>  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                        <th>Sun</th>
                                        <th>Valid From</th>
                                        <th>Valid Until</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Updated By</th>                                       
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <!--  <tr class="odd gradeX">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th> 
                                      
                                    </tr> -->
                                                                      
                                </tbody>
                            </table>

</div>

<!-- ADD SHIFT FORM-->

 <div class="modal fade" id="Add-Shift" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Shift</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Employee Name*</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Search Employees">
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="control-label col-sm-3">Monday *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Tuesday *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Wednesday *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Thursday *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Friday *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Saturday *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Sunday *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Valid From *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Valid To*</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>

                
     
            </form>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="button" class="btn dp-primary-bg" value="Add">
        </div>
      </div>
   </div>
</div>

<!-- END ADD SHIFT FORM -->  



<!-- MASS SHIFT FORM -->
<div class="modal fade" id="Mass-Shift" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mass Add Employee Shift</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Upload CSV file with new employee Shift.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee Shift Upload Field Guide</span>
                  </div>
                </div>
            </form>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="button" class="btn dp-primary-bg" value="Upload">
        </div>
      </div>
   </div>
</div>

<!-- END MASS SHIFT FORM -->

@stop