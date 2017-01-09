@extends('header_footer')


@section('content')

<div class="dp-submenu">
  
       <ul>
        <li><a href="{{ Url('payroll') }}"> Payroll </a></li>
        <li><a href="{{ Url('payslip') }}"> Payslip </a></li>
        <li><a href="{{ Url('bank') }}"> Bank </a></li>
        <li><a href="{{ Url('governmentforms') }}"> Government Form </a></li>
        <li><a href="{{ Url('bonus') }}"> Bonus </a></li>
        <li><a href="{{ Url('commision') }}"> Commision </a></li>
      </ul>
    
</div>




<div class="container">
<div class="dp-right full-width dp-text-right">
  <button class="btn dp-primary-bg">Export Payroll Register</button>&nbsp;&nbsp;<button class="btn dp-primary-bg" data-toggle="modal" data-target="#myModal">+  Generate Payroll</button>
  
</div>
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>Payroll Group</th>
                                        <th>Pay Run</th>
                                        <th>Pay Period</th>
                                        <th>Company</th>
                                        <th>Employee</th>
                                        <th>Gross Income</th>
                                        <th>Net Pay</th>
                                        <th>Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                              
                                    <tr class="odd gradeX">
                                        <td><input type="checkbox"></td>
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


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Add Payroll</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Payroll Group</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                        <option>Monthly</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" >Payroll Date</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="pwd">Date From</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="pwd">Date To</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control">
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
@stop