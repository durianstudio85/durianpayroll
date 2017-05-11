<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>Durian Payroll</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/open-sans.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/helper.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">


  <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <style type="text/css">
    
    i.active {

        background-color: #1fb4ae; 
        color: #fff;    

    }
  
  </style>


</head><body onload="displayLineChart();">

<nav class="dp-nav">
  <div class="dp-logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}">
    </a>
  </div>
  <div class="dp-nav-menu">

    <a href="{{ Url('dashboard') }}"><i class="{{ Request::is('dashboard*') ? 'active' : '' }} pe-7s-home pe-2x"></i></a>
    <a class="" href="{{ Url('payroll') }}"><i class="{{ Request::is('payroll*') ? 'active' : '' }} pe-7s-cash pe-2x"></i></a>
    <a class="" href="{{ Url('pay/account') }}"><i class="{{ Request::is('pay/account*') ? 'active' : '' }} pe-7s-credit pe-2x"></i></a>
    <a class="" href="{{ Url('employee-201') }}"><i class="{{ Request::is('employee-201*') ? 'active' : '' }} pe-7s-add-user pe-2x"></i></a>
    <a href="#"><i class="pe-7s-clock pe-2x"></i></a>
    
  </div>
  <div class="dp-nav-logout dp-right">
    <a href="{{ url('/logout') }}"><i class="pe-7s-power pe-2x"></i></a>   
  </div>
  <div class="dp-nav-user">
    
  </div>
  <div class="dp-nav-setting dp-right">
    <a href="#"><i class="pe-7s-speaker pe-2x"></i></a>
    <a href="#"><i class="pe-7s-help1 pe-2x"></i></a>
    <a href="{{ Url('company/setup') }}"><i class="pe-7s-config pe-2x"></i></a>
  </div>
</nav>


  @yield('content')


@if ( App\Options\Company_user::getCompanyPosition() == 'admin' )

<!-- Add Employee -->
    <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::open(['url'=>'employees','files'=>'true' , 'class' => 'form-horizontal']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Employee</h3>
                </div>
                <div class="modal-body">
                    <div style="padding: 0px 20px;">                
                        
                        <div class="form-group">
                            {!! Form::label('employee_id', 'Employee ID*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('employee_id', null,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('last_name', null,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('first_name', null,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('middle_name', 'Middle Name', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('middle_name', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], null,['class'=>'form-control', 'placeholder'=>'Select', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::select('status', Option::TaxStatus(), 'S',['class'=>'form-control', 'required']) !!}
                            </div>
                                <!-- ['single' => 'Single', 'married' => 'Married'] -->
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::email('email', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('mobile_no', 'Mobile Number', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('mobile_no', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('position', 'Position', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                <select class="form-control" name="position" onchange="showNewPosition(this)" required>
                                    <option  selected="selected" value="">Select</option>
                                    @foreach ( Option::getCurrentOption('position') as $options )
                                        <option value="{{ $options->id }}">{{ $options->name }}</option>
                                    @endforeach
                                    <option value="new">( Add New )</option>
                                </select>
                                {!! Form::text('other_position', null,['class'=>'form-control', 'placeholder'=>'New Position', 'id'=>'other_position', 'style'=>'display: none;']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('basic_pay', 'Basic Pay', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::number('basic_pay', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="padding: 0px 20px;">    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Save', ['class'=>'btn dp-primary-bg']) !!}    
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

<!-- Create Payroll -->
    <div class="modal fade" id="createPayroll" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::open(['url'=>'payroll','files'=>'true' , 'class' => 'form-horizontal']) !!}            
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Create Payroll</h3>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 0px 0px;">    
                        
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {!! Form::date('date_start', null,['class'=>'form-control', 'placeholder'=>'Date Start']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::date('date_end', null,['class'=>'form-control', 'placeholder'=>'Date Start']) !!}
                                </div>
                            </div>

                            <table width="100%" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee ID #</th>
                                        <th>Name</th>
                                        <th>Basic Pay</th>
                                        <th>SSS</th>
                                        <th>PagIbig</th>
                                        <th>PhilHealth</th>
                                        <th>Tax</th>
                                        <th>Deductions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( Option::allEmployeeList() as $employee)
                                        <tr>
                                            <td>{{ $employee->employee_id }}</td>
                                            <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                                            <td>{{ $employee->basic_pay }}</td>
                                            <td>{{ Option::Benefits()->getSSS($employee->basic_pay) }}</td>
                                            <td>100</td>
                                            <td>{{ Option::Benefits()->getPhilhealth($employee->basic_pay) }}</td>
                                            <td>{{ number_format(Option::salaryTax($employee->basic_pay, $employee->status), 2, '.', ',')  }}</td>
                                            <td>
                                                {!! Form::hidden('employee_id[]', $employee->id) !!}
                                                {!! Form::number('deductions[]', null,['class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px;' ,  'placeholder'=>'', 'required']) !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div style="padding: 0px 20px;">    
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {!! Form::submit('Save', ['class'=>'btn dp-primary-bg']) !!}    
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function showNewPosition(elem){
            if(elem.value == 'new')
                document.getElementById('other_position').style.display = "block";
            else
                document.getElementById('other_position').style.display = "none";
        }
    </script>
@endif 

<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/npm.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.js') }}"></script>

  <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
  </script>

  

  

 
</body>
</html>