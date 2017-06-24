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
    @if ( Option::getNavOption() == 'top' )
        <div class="dp-nav-menu">
            <a href="{{ Url('dashboard') }}"><i class="{{ Request::is('dashboard*') ? 'active' : '' }} pe-7s-home pe-2x"></i></a>
            <a class="" href="{{ Url('payroll') }}"><i class="{{ Request::is('payroll') ? 'active' : '' }} pe-7s-cash pe-2x"></i></a>
            <!-- <a class="" href="{{ Url('pay/account') }}"><i class="{{ Request::is('pay/account*') ? 'active' : '' }} pe-7s-credit pe-2x"></i></a> -->
            <a class="" href="{{ Url('employees') }}"><i class="{{ Request::is('employees') ? 'active' : '' }} pe-7s-add-user pe-2x"></i></a>
            <!-- <a href="#"><i class="pe-7s-clock pe-2x"></i></a> -->
        </div>
    @endif
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
                                <select class="form-control" id="position" name="position" onchange="showNewPosition()" required>
                                    <option  selected="selected" value="">Select</option>
                                    @foreach ( Option::getCurrentOption('position') as $options )
                                        <option value="{{ $options->id }}">{{ $options->name }}</option>
                                    @endforeach
                                    <option value="new">( Add New )</option>
                                </select>
                                <div id="other_div_position">
                                    {!! Form::text('other_position', null,['class'=>'form-control', 'placeholder'=>'New Position', 'id'=>'other_position', 'style'=>'']) !!}
                                </div>
                                
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
{!! Form::open(['url'=>'payroll','files'=>'true' , 'class' => 'form-horizontal']) !!}  
    <div class="modal fade" id="createPayroll" role="dialog">
        <div class="modal-dialog modal-dialog-extended modal-lg">
            <div class="modal-content">
                          
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Create Payroll</h3>
                </div>
                <div class="modal-body">
                    <div style="padding: 0px 0px;">    
                    
                        <div class="form-group">
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                {!! Form::label('', 'Select Pay Cycle', [ 'style' => 'font-size: 22px;']) !!}
                            </div>
                            <!-- <div class='col-lg-2 col-md-3 col-sm-4'>
                                {!! Form::select('status', ['first' => '1st - 15th', 'second' => '15th - 30th'], '',['class'=>'form-control', 'placeholder' => 'Select PayCycle']) !!}
                            </div> -->
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                {!! Form::text('date_start', null,['class'=>'form-control', 'placeholder'=>'Date Start' , 'onfocus' => '(this.type="date")', 'required']) !!}
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                {!! Form::select('cycle_type', ['1' => '1st', '2' => '2nd'], null,['class'=>'form-control', 'placeholder'=>'Select', 'required']) !!}
                            </div>
                        </div>
                        <div class="table-responsive">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( Option::allEmployeeList() as $employee )
                                    <tr>
                                        <td>
                                            {{ $employee->employee_id }}
                                        </td>
                                        <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                                        <td>{{ number_format($employee->basic_pay / 2, 2, '.', ',') }}</td>
                                        <td>{{ Option::Benefits()->getSSS($employee->basic_pay) / 2 }}</td>
                                        <td>{{ 100 / 2 }}</td>
                                        <td>{{ Option::Benefits()->getPhilhealth($employee->basic_pay) / 2 }}</td>
                                        <td>{{ number_format(Option::salaryTax(Option::employeeDetails($employee->id)->basic_pay, Option::employeeDetails($employee->id)->status) / 2, 2, '.', ',')  }}</td>
                                        <td>
                                            <a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#editPayslipEmployee{{ $employee->id }}"><i class="fa fa-pencil fa-btn" aria-hidden="true"></i></a>
                                            <!-- Employee Modal -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="padding: 0px 20px;">    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Save', ['class'=>'btn dp-primary-bg']) !!}    
                    </div>
                </div>
            </div>
        </div>
    </div>
 @foreach ( Option::allEmployeeList() as $employee )
    <div class="modal modal2 fade" id="editPayslipEmployee{{ $employee->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h3 class="modal-title">Edit</h3>
                </div>
                 <div class="modal-body">
                    <center>
                        <img src="{{ asset('upload/'.Option::comDetails('company_logo')) }}" style="max-height: 60px; margin-bottom: 20px;">
                        <p>{{ Option::comDetails('business_address') }}</p>
                        @if ( Option::comDetails('contact_telephone') != '' )
                            <p>Tel: {{ Option::comDetails('contact_telephone') }}</p>
                        @endif
                        {!! Form::hidden('employee_id[]', $employee->id) !!}
                    </center>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @php
                                $id= $employee->id;
                            @endphp
                            <div class='row'>
                                <div class="col-xs-5"><p>Employee Name:</p></div>
                                <div class="col-xs-7"><p>{{ Option::employeeDetails($id)->first_name .'  '. Option::employeeDetails($id)->last_name }}</p></div>
                            </div>
                            <div class='row'>
                                <div class="col-xs-5"><p>Employee Address:</p></div>
                                <div class="col-xs-7"><p>{{ Option::employeeDetails($id)->address }}</p></div>
                            </div>
                            <div class='row'>
                                <div class="col-xs-5"><p>Employee ID:</p></div>
                                <div class="col-xs-7"><p>{{ Option::employeeDetails($id)->employee_id }}</p></div>
                            </div>
                            <div class='row'>
                                <div class="col-xs-5"><p>Employee Contact:</p></div>
                                <div class="col-xs-7"><p>{{ Option::employeeDetails($id)->mobile_no }}</p></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class='row'>
                                <div class="col-xs-5"><p>Employee SSN:</p></div>
                                <div class="col-xs-7"><p>{{ Option::employeeDetails($id)->ssn }}</p></div>
                            </div>
                            <div class='row'>
                                <div class="col-xs-5"><p>Mode of Payment:</p></div>
                                <div class="col-xs-7"><p>{{ Option::employeeDetails($id)->payment_mode }}</p></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="payslip-head">EARNING</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Basic Pay</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('basic_pay[]', Option::employeeDetails($id)->basic_pay / 2,[ 'step' => '.01' , 'id'=>'payslip_basic_pay_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Overtime</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('overtime[]', 0,['step' => '.01' , 'id'=>'payslip_overtime_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Night Differential</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('night_differential[]', 0,['step' => '.01' , 'id'=>'payslip_night_differential_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Double Pay</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('double_pay[]', 0,['step' => '.01' , 'id'=>'payslip_double_pay_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Holiday Pay</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('holiday[]', 0,['step' => '.01' , 'id'=>'payslip_holiday_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Bonus</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('bonus[]', 0,['step' => '.01' ,'id'=>'payslip_bonus_'.$id,  'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>&nbsp;</p>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="payslip-foot">
                                    <div class="col-sm-6" style="padding-right: 0px;">
                                        <p class="payslip-head">Total Earnings</p>
                                    </div>
                                    @php
                                        $totalEarnings = Option::employeeDetails($id)->basic_pay / 2;
                                    @endphp
                                    <div class="col-sm-6" style="padding-left: 0px;">
                                        <p id="payslip_total_earnings_{{ $id }}" class="payslip-head" style="text-align: right;">{{ number_format( $totalEarnings, 2, '.', ',')  }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="payslip-head">DEDUCTIONS</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Income Tax</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('tax[]', Option::salaryTax(Option::employeeDetails($id)->basic_pay, Option::employeeDetails($id)->status) / 2,['step' => '.01' , 'id'=>'payslip_tax_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>SSS</p></div> 
                                <div class="col-sm-6 col-xs-6">{!! Form::number('sss[]', Option::Benefits()->getSSS(Option::employeeDetails($id)->basic_pay) / 2,['step' => '.01' , 'id'=>'payslip_sss_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Pag-Ibig</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('pagibig[]', 50.00 ,['step' => '.01' , 'id'=>'payslip_pagibig_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'',  'disabled']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Phil-Health</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('philhealth[]', Option::Benefits()->getPhilhealth(Option::employeeDetails($id)->basic_pay) / 2,['step' => '.01' , 'id'=>'payslip_philhealth_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Absences/Tardiness:</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('absent[]', 0,['step' => '.01' , 'id'=>'payslip_absent_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Loans:</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('loans[]', 0,['step' => '.01' , 'id'=>'payslip_loans_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6"><p>Others:</p></div>
                                <div class="col-sm-6 col-xs-6">{!! Form::number('others[]', 0,['step' => '.01' , 'id'=>'payslip_others_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="payslip-foot">
                                    <div class="col-sm-6" style="padding-right: 0px;">
                                        <p class="payslip-head">Total Deductions</p>
                                    </div>
                                    @php
                                        $tax =  Option::salaryTax(Option::employeeDetails($id)->basic_pay, Option::employeeDetails($id)->status);
                                        $sss = Option::Benefits()->getSSS(Option::employeeDetails($id)->basic_pay);
                                        $philhealth =Option::Benefits()->getPhilhealth(Option::employeeDetails($id)->basic_pay);
                                    
                                        $totalDeductions =  $tax + $sss + 100 + $philhealth;
                                    @endphp
                                    <div class="col-sm-6" style="padding-left: 0px;">
                                        <p id="payslip_total_deductions_{{ $id }}" class="payslip-head" style="text-align: right;">{{ number_format( $totalDeductions / 2 , 2, '.', ',')  }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @php
                                $netPay = $totalEarnings - $totalDeductions;
                            @endphp
                            <p class="netPayRounded"><span>NET PAY ROUNDED</span>  <span id="payslip_net_pay_{{ $id }}">{{ number_format( $netPay, 2, '.', ',')  }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dp-primary-bg"  data-number="2">Save</button>
                </div>
                
            </div>
        </div>
    </div>
       @endforeach
     {!! Form::close() !!}
@endif 

<!-- Payslip Modal -->

<script>
    $(document).ready(function() {
        $('#other_div_position').hide();
        $('#position').on('change', function() {
            if (this.value == 'new') {
                $('#other_div_position').show(); 
            };
            if (this.value != 'new') {
                $('#other_div_position').hide(); 
            };
        })
    });
</script>

@foreach ( Option::allEmployeeList() as $employee)
    @php 
        $id= $employee->id;
    @endphp
<script>
    $(document).ready(function() {
        $('#payslip_overtime_{{ $id }}, #payslip_night_differential_{{ $id }}, #payslip_double_pay_{{ $id }}, #payslip_holiday_{{ $id }}, #payslip_bonus_{{ $id }}, #payslip_tax_{{ $id }}, #payslip_sss_{{ $id }}, #payslip_pagibig_{{ $id }}, #payslip_philhealth_{{ $id }}, #payslip_absent_{{ $id }}, #payslip_loans_{{ $id }} , #payslip_others_{{ $id }}'  ).keyup( function () {
            var overtime = 0;
            var basic_pay = 0;
            var night_diff = 0;
            var double_pay = 0;
            var holiday = 0;
            var bonus = 0;
            
            var tax = 0;
            var sss = 0;
            var pagibig = 0;
            var philhealth = 0;
            var absent = 0;
            var loans = 0;
            var others = 0;
            
            if ( $('#payslip_basic_pay_{{ $id }}').val() != '') { basic_pay = parseFloat($('#payslip_basic_pay_{{ $id }}').val()); };
            
            if ($('#payslip_overtime_{{ $id }}').val() != '') { overtime = parseFloat($('#payslip_overtime_{{ $id }}').val());    };
            
            if ( $('#payslip_night_differential_{{ $id }}').val() != '') { night_diff = parseFloat($('#payslip_night_differential_{{ $id }}').val()); };
            
            if ( $('#payslip_double_pay_{{ $id }}').val() != '') { double_pay = parseFloat($('#payslip_double_pay_{{ $id }}').val()); };
            
            if ( $('#payslip_holiday_{{ $id }}').val() != '') { holiday = parseFloat($('#payslip_holiday_{{ $id }}').val()); };
            
            if ( $('#payslip_bonus_{{ $id }}').val() != '') { bonus = parseFloat($('#payslip_bonus_{{ $id }}').val()); };
            
            // Deductions
            if ( $('#payslip_tax_{{ $id }}').val() != '') { tax = parseFloat($('#payslip_tax_{{ $id }}').val()); };
            
            if ($('#payslip_sss_{{ $id }}').val() != '') { sss = parseFloat($('#payslip_sss_{{ $id }}').val());    };
            
            if ( $('#payslip_pagibig_{{ $id }}').val() != '') { pagibig = parseFloat($('#payslip_pagibig_{{ $id }}').val()); };
            
            if ( $('#payslip_philhealth_{{ $id }}').val() != '') { philhealth = parseFloat($('#payslip_philhealth_{{ $id }}').val()); };
            
            if ( $('#payslip_absent_{{ $id }}').val() != '') { absent = parseFloat($('#payslip_absent_{{ $id }}').val()); };
            
            if ( $('#payslip_loans_{{ $id }}').val() != '') { loans = parseFloat($('#payslip_loans_{{ $id }}').val()); };
            
            if ( $('#payslip_others_{{ $id }}').val() != '') { others = parseFloat($('#payslip_others_{{ $id }}').val()); };
            
            var totalEarnings = overtime + basic_pay + night_diff + double_pay + holiday + bonus;
            var totalDeduction = tax + sss + pagibig + philhealth + absent + loans + others;
            
            var valueEarnings = totalEarnings.toLocaleString(
              undefined, // use a string like 'en-US' to override browser locale
              { minimumFractionDigits: 2,
                maximumFractionDigits: 2 }
            );
            
            var valueDeduction = totalDeduction.toLocaleString(
              undefined, // use a string like 'en-US' to override browser locale
              { minimumFractionDigits: 2,
                maximumFractionDigits: 2 }
            );
            
            $('#payslip_total_deductions_{{ $id }}').html(valueDeduction);
            $('#payslip_total_earnings_{{ $id }}').html(valueEarnings);
            
            var totalNetPay = totalEarnings - totalDeduction;
            
            var valueNetPay = totalNetPay.toLocaleString(
              undefined, // use a string like 'en-US' to override browser locale
              { minimumFractionDigits: 2,
                maximumFractionDigits: 2 }
            );
            
            $('#payslip_net_pay_{{ $id }}').html(valueNetPay);
            
            
        });
        
    });

</script>
@endforeach


<script>
    $(document).ready(function() {
        $('#editPayroll{{ session("parent_modal_flash_message") }}').modal('show');

        $("button[data-number=2]").click(function(){
            $('.modal2').modal('hide');
        });
        
        $("button[data-number=1]").click(function(){
            $('.modal').modal('hide');
        });
    });
</script>

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