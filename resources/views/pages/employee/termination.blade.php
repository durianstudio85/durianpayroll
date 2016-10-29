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
  <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Termination">Add Employee Termination Information</button>
   
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

<!-- ADD TERMINATION FORM-->

 <div class="modal fade" id="Add-Termination" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Termination</h3>
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
                  <label class="control-label col-sm-3">Termination Date *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Termination Reason *</label>
                  <div class="col-sm-9">                 
                   <select class="form-control">
                     <option>Select </option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Include in Las Pay</label>
                  <div class="col-sm-9">                 
                   <div class="checkbox">
                      <label><input type="checkbox" value="">Anualization</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Leave Conversions</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Bonuses</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Outstanding Loans</label>
                    </div>
                    
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

<!-- END ADD TERMINATION FORM -->  





@stop