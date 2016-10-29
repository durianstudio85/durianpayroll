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
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Employee">Add Basic Pay Adjustment</button>
  
  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Basic Pay</th>
                                        <th>Effictive Date</th>
                                        <th>Adjustment Date</th>
                                        <th>Adjustment Reason</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Mobile Active</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                    </tr>
                                                                      
                                </tbody>
                            </table>

</div>

<!-- ADD PAY ADJUSTMENT FORM-->

 <div class="modal fade" id="Add-Employee" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Employee Basic Pay Adjustments</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Employee Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Search Employees">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Current Basic Pay</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">New Basic Pay</label>
                  <div class="col-sm-9">
                    <div class="col-md-6">
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <select class="form-control pull-right">
                          <option>Select</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Effictive Date</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Adjustemt Date (Optional)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Adjustemt Reason (Optional)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                 
                
            </form>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="button" class="btn dp-primary-bg" value="Generate">
        </div>
      </div>
   </div>
</div>

<!-- END ADD PAY ADJUSTMENT FORM -->  









@stop