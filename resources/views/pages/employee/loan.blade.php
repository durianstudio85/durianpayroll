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
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Loan">Add Loan</button>
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Loan">Mass Add Loan</button>
  <button class="btn dp-danger-bg">Download Loans</button>  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Reference Number</th>
                                        <th>Loan Type</th>
                                        <th>Date Approved</th>
                                        <th>Principal Amount</th>
                                        <th>Remaining Balance</th>
                                        <th>Long Term</th>
                                        <th>Scheme</th>
                                       
                                       
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

<!-- ADD EMPLOYEE LOAN FORM-->

 <div class="modal fade" id="Add-Loan" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Employee Loan</h3>
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
                  <label class="control-label col-sm-3" >Reference Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Loan Type</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                        <option>Select</option>                       
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Date Approved*</label>
                  <div class="col-sm-9">                 
                   <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Principal Amount*</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" >Remaining Balance*</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" >Long Term (Months)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-3" >Scheme*</label>
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

<!-- END ADD EMPLOYEE FORM -->  



<!-- MASS LOAN FORM -->
<div class="modal fade" id="Mass-Loan" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Employee Loan</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Upload CSV file with new employee Loans.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee Loans Upload Field Guide</span>
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

<!-- END MASS EMPLOYEE FORM -->

@stop