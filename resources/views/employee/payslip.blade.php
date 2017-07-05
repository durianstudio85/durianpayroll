@extends('employee.include.header')
@section('content')
<br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<h1>Payslip</h1>
			</div>
		</div>	
		@include('notification.flash')
	</div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid">
                @if ( !empty($time) )
                    {!! Form::model($time,['method'=>'patch','action'=>['EmployeeAccController@timeOut', $time->id],    'onsubmit' => 'return ConfirmOut()']) !!}
                        <button type="submit" class="btn dp-primary-bg">Time Out</button>
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['url'=>'timein', 'class' => 'form-horizontal']) !!}
                        <button type="submit" class="btn dp-primary-bg">Time In</button>
                    {!! Form::close() !!}
                
                @endif
                
                
            </div>
        </div>
    </div>
    <br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
			    <table width="100%" class="table table-striped table-hover">
			        <thead>
			            <tr>
			                <th>Date Range</th>
			                <th>Days</th>
			                <th>Status</th>
			                <th>Total Net Worth</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach( $myPayslip as $payslip)
				        	<tr>
				        		<td>{{ date('l, F d, Y', strtotime(Option::payrollDet($payslip->payroll_id)->date_start_range)) }} - {{ date('l, F d, Y', strtotime(Option::payrollDet($payslip->payroll_id)->date_end_range)) }}</td>
				        		<td>{{ round(abs(strtotime(Option::payrollDet($payslip->payroll_id)->date_start_range)-strtotime(Option::payrollDet($payslip->payroll_id)->date_end_range))/86400) }} Days</td>
				        		<td>{{ Option::payrollDet($payslip->payroll_id)->status }}</td>
				        		<td>{{ number_format( $payslip->total_pay, 2, '.', ',')  }}</td>
				        		<td><a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#viewPayslip_{{ $payslip->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
				        	</tr>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>

@foreach( $myPayslip as $payslip )
    <div class="modal modal2 fade" id="viewPayslip_{{ $payslip->id }}" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <h3 class="modal-title">Payslip</h3>
                    </div>
                     <div class="modal-body">
                        <center>
                        	@if( $company->getDetails($payslip->company_id)->company_logo != '' )
                        		<img src="{{ asset('upload/'.$company->getDetails($payslip->company_id)->company_logo) }}" style="max-height: 60px; margin-bottom: 20px;">
                        	@endif
                            
                            <p>{{ $company->getDetails($payslip->company_id)->business_address }}</p>
                            @if ( $company->getDetails($payslip->company_id)->contact_telephone != '' )
                                <p>Tel: {{ $company->getDetails($payslip->company_id)->contact_telephone }}</p>
                            @endif
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
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
                                    <div class="col-xs-7"><p>{{ date('l, F d, Y', strtotime(Option::payrollDet($payslip->payroll_id)->date_end_range)) }}</p></div>
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
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->basic_pay, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Overtime</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->overtime, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Night Differential</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->night_differential, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Double Pay</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->double_pay, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Holiday Pay</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->holiday, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Bonus</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->bonus, 2, '.', ',')  }}</p></div>
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
                                            $totalEarnings = $payslip->basic_pay + $payslip->overtime + $payslip->night_differential + $payslip->double_pay +  $payslip->holiday + $payslip->bonus;
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
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->tax, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>SSS</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->sss, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Pag-Ibig</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->pagibig, 2, '.', ',')  }}</p></div>                                   
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Phil-Health</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->philhealth, 2, '.', ',')  }}</p></div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Absences/Tardiness:</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->absent, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Loans:</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->loans, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6"><p>Others:</p></div>
                                    <div class="col-sm-6 col-xs-6"><p class="pull-right">{{ number_format( $payslip->others, 2, '.', ',')  }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="payslip-foot">
                                        <div class="col-sm-6" style="padding-right: 0px;">
                                            <p class="payslip-head">Total Deductions</p>
                                        </div>
                                        @php
                                            $totalDeductions =  $payslip->tax +  $payslip->sss +  $payslip->pagibig +  $payslip->philhealth +  $payslip->absent + $payslip->loans + $payslip->others;
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
                        <button type="button" class="btn btn-default"  data-dismiss="modal" >Close</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endforeach


<script>
    function ConfirmOut()
    {
        var x = confirm("Are you sure you want to out?");
        if (x)
            return true;
        else
            return false;
    }
</script>













































@stop