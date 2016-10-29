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
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Deduction">Add Deductions</button>
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Deduction">Mass Add Deductions</button>
  <button class="btn dp-danger-bg">Download Deductions</button>  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Deduction Type</th>
                                        <th>Deduction Amount Per Day</th>
                                        <th>Valid From</th>
                                        <th>Valid To</th>
                                       
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <!--  <tr class="odd gradeX">
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                      
                                    </tr> -->
                                                                      
                                </tbody>
                            </table>

</div>

<!-- ADD DEDUCTION FORM-->

 <div class="modal fade" id="Add-Deduction" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Deduction</h3>
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
                  <label class="control-label col-sm-3">Deduction Type</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                        <option>Select</option>                       
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Deduction Amount Per Day*</label>
                  <div class="col-sm-9">                 
                   <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Valid From*</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
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

<!-- END ADD DEDUCTION FORM -->  



<!-- MASS DEDUCTION FORM -->
<div class="modal fade" id="Mass-Deduction" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mass Add Employee Deductions</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Upload CSV file with new employee deduction.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee Deduction Upload Field Guide</span>
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

<!-- END MASS DEDUCTION FORM -->

@stop