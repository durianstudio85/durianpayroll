@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>

@if ( Option::getNavOption() == 'side' )
    <div class="dp-container">
@else
    <div class="container-fluid">
@endif
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<h1>Payroll</h1>
			</div>
		</div>	
		@include('notification.flash')
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
			    <div class="dp-right full-width dp-text-right">
			        <button class="btn dp-primary-bg" data-toggle="modal" data-target="#createPayroll">Create Payroll</button>
			        <!-- <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Employee"><i class="fa fa-upload"></i> Mass and Employees</button> -->
			        <!-- <button class="btn dp-danger-bg"><i class="fa fa-download"></i> Download 201</button> -->
			    </div>
                <div class="">
    			    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
    			        <thead>
    			            <tr>
    			                <th>Payroll #</th>
    			                <th>Date Range</th>
                                <th>Days</th>
    			                <th>Created Date</th>
    			                <th>Status</th>
    			                <th>&nbsp;</th>
    			            </tr>
    			        </thead>
    			        <tbody>
    			        	@foreach( $payroll as $list )
        			        	<tr>
        			        		<td>{{ 1000 + $list->id }}</td>
        			        		<td>{{ date('l, F d, Y', strtotime($list->date_start_range)) }} - {{ date('l, F d, Y', strtotime($list->date_end_range)) }}</td>
        			        		<td>{{ round(abs(strtotime($list->date_start_range)-strtotime($list->date_end_range))/86400) }} Days</td>
                                    <td>{{ date('l, F d, Y', strtotime($list->created_at)) }}</td>
                                    <td>{{ $list->status }}</td>
        			        		<td>
        			        			<center>
        				        			<a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#editPayroll{{ $list->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            {!! Form::open(['method'=>'delete','url' => ['payroll', $list->id], 'onsubmit' => 'return ConfirmDelete()', 'style' => 'display: inline;color: #adacac;']) !!}
                                                <button type="submit" style="background-color: #f9f9f9;border: 1px solid #f9f9f9;">
                                                    <i class="fa fa-btn fa-trash-o"></i>
                                                </button>
                                            {!! Form::close() !!}
        				        			<!-- <a href="#trash" style="color: #adacac;margin: 0px 5px;font-size: 15px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
        			        			</center>
        			        		</td>
        			        	</tr>
    			        	@endforeach
    			        </tbody>
    			    </table>
                </div>              
			</div>
		</div>
	</div>
</div>

<script>
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<!-- Create Payroll -->

@foreach($payroll as $modalList)
    <div class="modal fade" id="editPayroll{{ $modalList->id }}" role="dialog">
        <div class="modal-dialog modal-dialog-extended modal-lg">
            <div class="modal-content">
                {!! Form::model($modalList, ['method'=>'patch', 'action'=>['PayrollController@update', $modalList->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}       
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Update Payroll</h3>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 0px 0px;">    
                            <div class="container-fluid">
                                @if ( $modalList->id == session('parent_modal_flash_message') )
                                    @if(Session::has('parent_modal_flash_message'))
                                        <div class="row">
                                            <div class="col-md-12 alert-custom">
                                                <div class="alert alert-success">
                                                    {{ session('child_modal_flash_message') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
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
                                                        <th>Total Deductions</th>
                                                        <th>Total Pay</th>
                                                        <th>..</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($modalList->id))
                                                    @foreach ( Option::getPayrollItems($modalList->id) as $payrollItems)
                                                        <tr>
                                                            <td>{{ Option::employeeName($payrollItems->employee_id)->employee_id }}</td>
                                                            <td>{{ Option::employeeName($payrollItems->employee_id)->last_name }}, {{ Option::employeeName($payrollItems->employee_id)->first_name }}</td>
                                                            <td>{{ number_format( $payrollItems->basic_pay, 2, '.', ',')  }}</td>
                                                            <td>{{ number_format( $payrollItems->sss, 2, '.', ',')  }}</td>
                                                            <td>{{ number_format( $payrollItems->pagibig, 2, '.', ',')  }}</td>
                                                            <td>{{ number_format( $payrollItems->philhealth, 2, '.', ',')  }}</td>
                                                            <td>{{ number_format( $payrollItems->tax, 2, '.', ',')  }}</td>
                                                            <td>{{ number_format( $payrollItems->deduction, 2, '.', ',')  }}</td>
                                                            <td>{{ number_format( $payrollItems->total_pay, 2, '.', ',')  }}</td>
                                                            <td>
                                                                <a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;" data-toggle="modal" data-target="#editPayslip{{ $payrollItems->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        {!! Form::select('status', ['Paid' => 'Paid', 'Unpaid' => 'Unpaid'], $modalList->status, [ 'class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div style="padding: 0px 20px;">    
                            <button type="button" class="btn btn-default" data-dismiss="modal" data-number="1">Close</button>
                            {!! Form::submit('Save', ['class'=>'btn dp-primary-bg']) !!}    
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endforeach
<div>
@if (isset($modalList->id))
    @foreach ( Option::getPayrollItems($modalList->id) as $payrollItems)
        <div class="modal modal2 fade" id="editPayslip{{ $payrollItems->id }}" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    {!! Form::model($payrollItems, ['method'=>'patch', 'action'=>['PayrollController@update', $modalList->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}       
                    {!! Form::hidden('parent_id', $modalList->id) !!}
                    {!! Form::hidden('child_id', $payrollItems->id) !!}
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
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                @php
                                    $id= $payrollItems->employee_id;
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
                                    <div class="col-xs-5"><p>Salary Date:</p></div>
                                    <div class="col-xs-7"><p>{{ date('l, F d, Y', strtotime($modalList->date_end_range)) }}</p></div>
                                </div>
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
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('basic_pay', $payrollItems->basic_pay,[ 'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Overtime</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('overtime', $payrollItems->overtime,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Night Differential</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('night_differential', $payrollItems->night_differential,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Double Pay</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('double_pay', $payrollItems->double_pay,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Holiday Pay</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('holiday', $payrollItems->holiday,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Bonus</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('bonus', $payrollItems->bonus,['step' => '.01' ,'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
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
                                            $totalEarnings = $payrollItems->basic_pay + $payrollItems->overtime + $payrollItems->night_differential + $payrollItems->double_pay +  $payrollItems->holiday + $payrollItems->bonus;
                                        @endphp
                                        <div class="col-sm-6" style="padding-left: 0px;">
                                            <p class="payslip-head" style="text-align: right;">{{ number_format( $totalEarnings, 2, '.', ',')  }}</p>
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
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('tax', $payrollItems->tax,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>SSS</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('sss', $payrollItems->sss,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Pag-Ibig</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('pagibig', 100.00,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Phil-Health</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('philhealth', $payrollItems->philhealth,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Absences/Tardiness:</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('absent', $payrollItems->absent,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Loans:</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('loans', $payrollItems->loans,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Others:</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('others', $payrollItems->others,['step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="payslip-foot">
                                        <div class="col-sm-6" style="padding-right: 0px;">
                                            <p class="payslip-head">Total Deductions</p>
                                        </div>
                                        @php
                                            $totalDeductions =  $payrollItems->tax +  $payrollItems->sss +  $payrollItems->pagibig +  $payrollItems->philhealth +  $payrollItems->absent + $payrollItems->loans + $payrollItems->others;
                                        @endphp
                                        <div class="col-sm-6" style="padding-left: 0px;">
                                            <p class="payslip-head" style="text-align: right;">{{ number_format( $totalDeductions, 2, '.', ',')  }}</p>
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
                                <p class="netPayRounded"><span>NET PAY ROUNDED</span>  {{ number_format( $netPay, 2, '.', ',')  }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"  data-number="2">Close</button>
                        {!! Form::submit('Update', ['class'=>'btn dp-primary-bg']) !!}    
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div>

@stop