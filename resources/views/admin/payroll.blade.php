@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>

@if ( $company->nav == 'side' )
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
                                <th>Working Days</th>
    			                <th>Created Date</th>
    			                <th>Status</th>
    			                <th>&nbsp;</th>
    			            </tr>
    			        </thead>
    			        <tbody>
    			        	@foreach( $company->payrolls as $list )
        			        	<tr>
        			        		<td>{{ 1000 + $list->id }}</td>
        			        		<td>{{ date('l, F d, Y', strtotime($list->date_start_range)) }} - {{ date('l, F d, Y', strtotime($list->date_end_range)) }}</td>
        			        		<td>{{ round(abs(strtotime($list->date_start_range)-strtotime($list->date_end_range))/86400)- 1 }} Days</td>
                                    <td>{{ date('l, F d, Y', strtotime($list->created_at)) }}</td>
                                    <td>{{ $list->status }}</td>
        			        		<td>
        			        			<center>
        				        			<a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#editPayroll{{ $list->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            @if ( $list->status != 'Paid' )
                                                {!! Form::open(['method'=>'delete','url' => ['payroll', $list->id], 'onsubmit' => 'return ConfirmDelete()', 'style' => 'display: inline;color: #adacac;']) !!}
                                                    <button type="submit" style="background-color: #f9f9f9;border: 1px solid #f9f9f9;">
                                                        <i class="fa fa-btn fa-trash-o"></i>
                                                    </button>
                                                {!! Form::close() !!}
                                            @endif
        				        			<!-- <a href="#trash" style="color: #adacac;margin: 0px 5px;font-size: 15px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
        			        			</center>
                                         <!-- Update -->
                                        <div class="modal fade" id="editPayroll{{ $list->id }}" role="dialog">
                                            <div class="modal-dialog modal-dialog-extended modal-lg">
                                                <div class="modal-content">
                                                    @if ( $list->status != 'Paid' )
                                                        {!! Form::model($list, ['method'=>'patch', 'action'=>['Admin\PayrollController@update', $list->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}       
                                                    @endif
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h3 class="modal-title">Update Payroll</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div style="padding: 0px 0px;">    
                                                                <div class="container-fluid">
                                                                    @if ( $list->id == session('parent_modal_flash_message') )
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
                                                                                        @foreach ( $list->payroll_items as $payrollItems)
                                                                                            <tr>
                                                                                                <td>{{ $payrollItems->employee->empID }}</td>
                                                                                                <td>{{ $payrollItems->employee->last_name }}, {{ $payrollItems->employee->first_name }}</td>
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
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if ( $list->status != 'Paid' )
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                {!! Form::select('status', ['Paid' => 'Paid', 'Unpaid' => 'Unpaid'], $list->status, [ 'class' => 'form-control', 'required']) !!}
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div style="padding: 0px 20px;">    
                                                                <button type="button" class="btn btn-default" data-dismiss="modal" data-number="1">Close</button>
                                                                @if ( $list->status != 'Paid' )
                                                                    {!! Form::submit('Save', ['class'=>'btn dp-primary-bg']) !!}    
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @if ( $list->status != 'Paid' )                                                        
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </div> <!-- Update End -->
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

@foreach ( $company->payrolls as $list)
    @foreach( $list->payroll_items as $items )
        <div class="modal modal2 fade" id="editPayslip{{ $items->id }}" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    {!! Form::model($items, ['method'=>'patch', 'action'=>['Admin\PayrollController@updateItems', $items->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}       
                    <div class="modal-header">
                        <h3 class="modal-title">Edit</h3>
                    </div>
                     <div class="modal-body">
                        <center>
                            @if ( $company->company_logo != '' )
                                <img src="{{ asset('upload/'.$company->company_logo) }}" style="max-height: 60px; margin-bottom: 20px;">
                            @endif
                            <p>{{ $company->business_address }}</p>
                            @if ( $company->contact_telephone != '' )
                                <p>Tel: {{ $company->contact_telephone }}</p>
                            @endif
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                @php
                                    $id= $items->id;
                                @endphp
                                <div class='row'>
                                    <div class="col-xs-5"><p>Employee Name:</p></div>
                                    <div class="col-xs-7"><p>{{ $items->employee->first_name .'  '. $items->employee->last_name }}</p></div>
                                </div>
                                <div class='row'>
                                    <div class="col-xs-5"><p>Employee Address:</p></div>
                                    <div class="col-xs-7"><p>{{ $items->employee->address }}</p></div>
                                </div>
                                <div class='row'>
                                    <div class="col-xs-5"><p>Employee ID:</p></div>
                                    <div class="col-xs-7"><p>{{ $items->employee->empID }}</p></div>
                                </div>
                                <div class='row'>
                                    <div class="col-xs-5"><p>Employee Contact:</p></div>
                                    <div class="col-xs-7"><p>{{ $items->employee->mobile_no }}</p></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class='row'>
                                    <div class="col-xs-5"><p>Salary Date:</p></div>
                                    <div class="col-xs-7"><p>{{ date('l, F d, Y', strtotime($list->date_end_range)) }}</p></div>
                                </div>
                                <div class='row'>
                                    <div class="col-xs-5"><p>Employee SSN:</p></div>
                                    <div class="col-xs-7"><p>{{ $items->employee->ssn }}</p></div>
                                </div>
                                <div class='row'>
                                    <div class="col-xs-5"><p>Mode of Payment:</p></div>
                                    <div class="col-xs-7"><p>{{ $items->employee->payment_mode }}</p></div>
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
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('basic_pay', $items->basic_pay,['id'=>'edit_payslip_basic_pay_'.$id,  'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Overtime</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('overtime', $items->overtime,[ 'id'=>'edit_payslip_overtime_'.$id, 'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Night Differential</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('night_differential', $items->night_differential,['id'=>'edit_payslip_night_differential_'.$id, 'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Double Pay</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('double_pay', $items->double_pay,['id'=>'edit_payslip_double_pay_'.$id, 'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Holiday Pay</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('holiday', $items->holiday,['id'=>'edit_payslip_holiday_'.$id, 'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Bonus</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('bonus', $items->bonus,['id'=>'edit_payslip_bonus_'.$id, 'step' => '.01' ,'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
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
                                            $totalEarnings = $items->basic_pay + $items->overtime + $items->night_differential + $items->double_pay +  $items->holiday + $items->bonus;
                                        @endphp
                                        <div class="col-sm-6" style="padding-left: 0px;">
                                            <p class="payslip-head" style="text-align: right;" id="edit_payslip_total_earnings_{{ $id }}">{{ number_format( $totalEarnings, 2, '.', ',')  }}</p>
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
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('tax', $items->tax,['id'=>'edit_payslip_tax_'.$id,'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>SSS</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('sss', $items->sss,['id'=>'edit_payslip_sss_'.$id,'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Pag-Ibig</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('pagibig', $items->pagibig,['id'=>'edit_payslip_pagibig_'.$id,'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Phil-Health</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('philhealth', $items->philhealth,['id'=>'edit_payslip_philhealth_'.$id, 'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required', 'disabled']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Absences/Tardiness:</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('absent', $items->absent,['id'=>'edit_payslip_absent_'.$id,'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Loans:</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('loans', $items->loans,['id'=>'edit_payslip_loans_'.$id, 'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Others:</p></div>
                                    <div class="col-sm-6 col-xs-6">{!! Form::number('others', $items->others,['id'=>'edit_payslip_others_'.$id,'step' => '.01' , 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'required']) !!}</div>
                                </div>
                                <div class="row">
                                    <div class="payslip-foot">
                                        <div class="col-sm-6" style="padding-right: 0px;">
                                            <p class="payslip-head">Total Deductions</p>
                                        </div>
                                        @php
                                            $totalDeductions =  $items->tax +  $items->sss +  $items->pagibig +  $items->philhealth +  $items->absent + $items->loans + $items->others;
                                        @endphp
                                        <div class="col-sm-6" style="padding-left: 0px;">
                                            <p class="payslip-head" style="text-align: right;" id="edit_payslip_total_deductions_{{ $id }}">{{ number_format( $totalDeductions, 2, '.', ',')  }}</p>
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
                                <p class="netPayRounded"><span>NET PAY ROUNDED</span> <span id="edit_payslip_net_pay_{{ $id }}">{{ number_format( $netPay, 2, '.', ',')  }}</span></p>
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
@endforeach




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


@foreach ( $company->payrolls as $list)
    @foreach( $list->payroll_items as $items )
    @php 
        $id= $items->id;
    @endphp
        <script>
            $(document).ready(function() {
                $('#edit_payslip_overtime_{{ $id }}, #edit_payslip_night_differential_{{ $id }}, #edit_payslip_double_pay_{{ $id }}, #edit_payslip_holiday_{{ $id }}, #edit_payslip_bonus_{{ $id }}, #edit_payslip_tax_{{ $id }}, #edit_payslip_sss_{{ $id }}, #edit_payslip_pagibig_{{ $id }}, #edit_payslip_philhealth_{{ $id }}, #edit_payslip_absent_{{ $id }}, #edit_payslip_loans_{{ $id }} , #edit_payslip_others_{{ $id }}'  ).keyup( function () {
                    var edit_overtime = 0.00;
                    var edit_basic_pay = 0.00;
                    var edit_night_diff = 0.00;
                    var edit_double_pay = 0.00;
                    var edit_holiday = 0.00;
                    var edit_bonus = 0.00;
                    
                    var edit_tax = 0.00;
                    var edit_sss = 0.00;
                    var edit_pagibig = 0.00;
                    var edit_philhealth = 0.00;
                    var edit_absent = 0.00;
                    var edit_loans = 0.00;
                    var edit_others = 0.00;
                    
                    if ( $('#edit_payslip_basic_pay_{{ $id }}').val() != '') { edit_basic_pay = parseFloat($('#edit_payslip_basic_pay_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_overtime_{{ $id }}').val() != '') { edit_overtime = parseFloat($('#edit_payslip_overtime_{{ $id }}').val());    };
                    
                    if ( $('#edit_payslip_night_differential_{{ $id }}').val() != '') { edit_night_diff = parseFloat($('#edit_payslip_night_differential_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_double_pay_{{ $id }}').val() != '') { edit_double_pay = parseFloat($('#edit_payslip_double_pay_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_holiday_{{ $id }}').val() != '') { edit_holiday = parseFloat($('#edit_payslip_holiday_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_bonus_{{ $id }}').val() != '') { edit_bonus = parseFloat($('#edit_payslip_bonus_{{ $id }}').val()); };
                    
                    // Deductions
                    if ( $('#edit_payslip_tax_{{ $id }}').val() != '') { edit_tax = parseFloat($('#edit_payslip_tax_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_sss_{{ $id }}').val() != '') { edit_sss = parseFloat($('#edit_payslip_sss_{{ $id }}').val());    };
                    
                    if ( $('#edit_payslip_pagibig_{{ $id }}').val() != '') { edit_pagibig = parseFloat($('#edit_payslip_pagibig_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_philhealth_{{ $id }}').val() != '') { edit_philhealth = parseFloat($('#edit_payslip_philhealth_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_absent_{{ $id }}').val() != '') { edit_absent = parseFloat($('#edit_payslip_absent_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_loans_{{ $id }}').val() != '') { edit_loans = parseFloat($('#edit_payslip_loans_{{ $id }}').val()); };
                    
                    if ( $('#edit_payslip_others_{{ $id }}').val() != '') { edit_others = parseFloat($('#edit_payslip_others_{{ $id }}').val()); };
                    
                    var edit_totalEarnings = edit_overtime + edit_basic_pay + edit_night_diff + edit_double_pay + edit_holiday + edit_bonus;
                    var edit_totalDeduction = edit_tax + edit_sss + edit_pagibig + edit_philhealth + edit_absent + edit_loans + edit_others;
                    
                    var edit_valueEarnings = edit_totalEarnings.toLocaleString(
                      undefined, // use a string like 'en-US' to override browser locale
                      { minimumFractionDigits: 2,
                        maximumFractionDigits: 2 }
                    );
                    
                    var edit_valueDeduction = edit_totalDeduction.toLocaleString(
                      undefined, // use a string like 'en-US' to override browser locale
                      { minimumFractionDigits: 2,
                        maximumFractionDigits: 2 }
                    );
                    
                    $('#edit_payslip_total_deductions_{{ $id }}').html(edit_valueDeduction);
                    $('#edit_payslip_total_earnings_{{ $id }}').html(edit_valueEarnings);
                    
                    var edit_totalNetPay = edit_totalEarnings - edit_totalDeduction;
                    
                    var edit_valueNetPay = edit_totalNetPay.toLocaleString(
                      undefined, // use a string like 'en-US' to override browser locale
                      { minimumFractionDigits: 2,
                        maximumFractionDigits: 2 }
                    );
                    
                    $('#edit_payslip_net_pay_{{ $id }}').html(edit_valueNetPay); 
                });
            });
        </script>
    @endforeach
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
@stop