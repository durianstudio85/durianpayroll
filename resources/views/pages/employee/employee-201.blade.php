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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('flash_message'))
                <div class="alert {{ Session::get('flash_message_important') }} ">
                    {{session('flash_message')}}
                </div>
            @endif
        </div>
    </div>
</div>




<div class="container-fluid">
    <div class="dp-right full-width dp-text-right">
        <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Employee">Add Employees</button>
        <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Employee"><i class="fa fa-upload"></i> Mass and Employees</button>
        <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Update-Mass-Employee"><i class="fa fa-upload"></i> Mass Update Employees</button>
        <button class="btn dp-danger-bg"><i class="fa fa-download"></i> Download 201</button>
    </div>

    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th><input type="checkbox"></th>
                <th>Picture</th>
                <th>Employee ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Mobile Active</th>
                <th>Created By</th>
                <th>Updated By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee_list as $employee)
            <tr class="odd gradeX">
               <td><input type="checkbox"></td>
               <td></td>
               <td>{{ $employee->employee_id }}</td>
               <td>{{ $employee->last_name }}</td>
               <td>{{ $employee->first_name }}</td>
               <td>{{ $employee->email }}</td>
               <td>{{ $employee->telephone_no }}</td>
               <td>{{ $employee->mobile_no }}</td>
               <td>{{ $employee->created_by }}</td>
               <td>{{ $employee->updated_by }}</td>
            </tr>
            @endforeach          
        </tbody>
    </table>
</div>

<!-- ADD EMPLOYEE FORM-->

<div class="modal fade" id="Add-Employee" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::open(['url'=>'employee-201', 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Employee</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('employee_id', 'Employee ID*', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('employee_id', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('last_name', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">First Name*</label>
                        <div class="col-sm-9">
                            {!! Form::text('first_name', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Middle Name</label>
                        <div class="col-sm-9">
                            {!! Form::text('middle_name', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Gender</label>
                        <div class="col-sm-9">
                            {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, [ 'class' => 'form-control', 'placeholder' => 'Select']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            {!! Form::email('email', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Telephone Number</label>
                        <div class="col-sm-9">
                            {!! Form::text('telephone_no', null,['class'=>'form-control', 'placeholder'=>'' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mobile Number</label>
                        <div class="col-sm-9">
                            {!! Form::text('mobile_no', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Generate', ['class' => 'btn dp-primary-bg']) !!}
                </div>
            </div>
        {!! Form::close() !!} 
   </div>
</div>

<!-- END ADD EMPLOYEE FORM -->  




<!-- MASS EMPLOYEE FORM -->
<div class="modal fade" id="Mass-Employee" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mass Add Employee</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Upload CSV file with all the employee details.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee 201 Field Guide</span>
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

<!-- END MASS EMPLOYEE FORM -->


<!--UPDATE MASS EMPLOYEE FORM -->
<div class="modal fade" id="Update-Mass-Employee" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Mass Update Employee</h3>
        </div>
        <div class="modal-body">

          <form class="form-horizontal">
            <span>Here, you can upload a CSV file to update employee details. Employee ID is the only column required as this is the employee identifier. All the other columns are optional and will only update if the specific column is in the CSV.
            <br><br>

            Note that some columns must have a value, and if left blank, it will delete existing values in the employee's file. Please also note that some columns are inter-dependent, meaning a value in one column requires a value in another column as well.

            Refer to the Employee 201 Upload Field Guide for more details.</span><br><br>
                <div class="form-group">
                  <label class="control-label col-sm-3">Select File</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <span class="dp-primary">Employee 201 Field Guide</span>
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

<!-- END UPDATE MASS EMPLOYEE FORM -->

@stop