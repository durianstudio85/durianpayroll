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
<div class="top-ytd">
  <div class="top-ytd-info">
    <p><b class="dp-primary">Year To Date Information:</b> Affects Annualization, BIR 2316 and BIR 1604 (Alphalist) Form Generation for the year specified</p>
  </div>
</div>

<div class="dp-right full-width dp-text-right">
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Add-YTD">Mass Add YTD Summary</button>
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Update-YTD">Mass Update YTD Summary</button>
  <button class="btn dp-danger-bg">Download YTD Summary (2016)</button>  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Termination Date</th>
                                        <th>Termination Reason</th>
                                        <th>Include in Last Pay</th>
                                                                             
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   <!--  <tr class="odd gradeX">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
  
                                    </tr> -->
                                                                      
                                </tbody>
                            </table>

</div>

<!-- MASS YTD SUMMARY FORM -->
<div class="modal fade" id="Mass-Add-YTD" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mass Add Employee YTD Summary</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Upload CSV file with new employee YTD Summary.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee YTD Summary Upload Field Guide</span>
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

<!-- END MASS YTD SUMMARY FORM -->


<!-- MASS UPDATED YTD SUMMARY FORM -->
<div class="modal fade" id="Mass-Update-YTD" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mass Update Employee YTD Summary</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Upload CSV file with update employee YTD Summary.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee YTD Summary Upload Field Guide</span>
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

<!-- END MASS UPDATED  YTD SUMMARY FORM -->

@stop