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
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Adjustments">Add Adjustments</button>
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Adjustments">Mass Add Adjustments</button>
  <button class="btn dp-danger-bg">Download Adjustments</button>  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Adjustment Reason</th>
                                        <th>Type</th>
                                        <th>Payroll Date Adj.</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Updated By</th>
                                        <th>Updated Date</th>
                                       
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <!--  <tr class="odd gradeX">
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                      
                                    </tr> -->
                                                                      
                                </tbody>
                            </table>

</div>

<!-- ADD Adjustments FORM-->

 <div class="modal fade" id="Add-Adjustments" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Adjustment</h3>
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
                  <label class="control-label col-sm-3">Amount*</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control">
                   <i>To be deducted or added to the payroll</i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Type*</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Taxable Income</option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Payroll Date*</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                     <option></option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Reason*</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                    <i>To be deducted or added to the payroll</i>
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

<!-- END ADD Adjustments FORM -->  



<!-- MASS Adjustments FORM -->
<div class="modal fade" id="Mass-Adjustments" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mass Add Employee Adjustments</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Upload CSV file with new employee adjustments.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee Adjustments Upload Field Guide</span>
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

<!-- END MASS Adjustments FORM -->

@stop