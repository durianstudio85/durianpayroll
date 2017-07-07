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
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                {!! Form::text('date_start', null,['class'=>'form-control', 'placeholder'=>'Date Start' , 'onfocus' => '(this.type="date")', 'required']) !!}
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                {!! Form::select('cycle_type', ['15' => '15th', '30' => '30th'], null,['class'=>'form-control', 'placeholder'=>'Select', 'required']) !!}
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
                                @foreach( Option::company()->employees as $list )
                                    <tr>
                                        <td>
                                            {{ $list->empID }}
                                        </td>
                                        <td>{{ $list->last_name }}, {{ $list->first_name }}</td>
                                        <td>{{ number_format($list->basic_pay / 2, 2, '.', ',') }}</td>
                                        <td>{{ Option::Benefits()->getSSS($list->basic_pay) / 2 }}</td>
                                        <td>{{ Option::Benefits()->getPagibig($list->basic_pay) / 2 }}</td>
                                        <td>{{ Option::Benefits()->getPhilhealth($list->basic_pay) / 2 }}</td>
                                        <td>{{ number_format(Option::salaryTax($list->basic_pay, $list->status) / 2, 2, '.', ',') }}</td>
                                        <td>
                                            <a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#editPayslipEmployee{{ $list->id }}"><i class="fa fa-pencil fa-btn" aria-hidden="true"></i></a>
                                            <!-- Payslip Modal -->
                                            <div class="modal modal2 fade" id="editPayslipEmployee{{ $list->id }}" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                            <h3 class="modal-title">Edit</h3>
                                                        </div>
                                                         <div class="modal-body">
                                                            <center>
                                                                @if( Option::company()->company_logo )
                                                                    <img src="{{ asset('upload/'.Option::company()->company_logo) }}" style="max-height: 60px; margin-bottom: 20px;">
                                                                @endif
                                                                
                                                                <p>{{ Option::company()->business_address }}</p>
                                                                @if ( Option::company()->contact_telephone != '' )
                                                                    <p>Tel: {{ Option::company()->contact_telephone }}</p>
                                                                @endif
                                                                {!! Form::hidden('employee_id[]', $list->id) !!}
                                                            </center>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-6 col-xs-12">
                                                                    @php
                                                                        $id= $list->id;
                                                                    @endphp
                                                                    <div class='row'>
                                                                        <div class="col-xs-5"><p>Employee Name:</p></div>
                                                                        <div class="col-xs-7"><p>{{ $list->first_name .'  '. $list->last_name }}</p></div>
                                                                    </div>
                                                                    <div class='row'>
                                                                        <div class="col-xs-5"><p>Employee Address:</p></div>
                                                                        <div class="col-xs-7"><p>{{ $list->address }}</p></div>
                                                                    </div>
                                                                    <div class='row'>
                                                                        <div class="col-xs-5"><p>Employee ID:</p></div>
                                                                        <div class="col-xs-7"><p>{{ $list->empID }}</p></div>
                                                                    </div>
                                                                    <div class='row'>
                                                                        <div class="col-xs-5"><p>Employee Contact:</p></div>
                                                                        <div class="col-xs-7"><p>{{ $list->mobile_no }}</p></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xs-12">
                                                                    <div class='row'>
                                                                        <div class="col-xs-5"><p>Employee SSN:</p></div>
                                                                        <div class="col-xs-7"><p>{{ $list->ssn }}</p></div>
                                                                    </div>
                                                                    <div class='row'>
                                                                        <div class="col-xs-5"><p>Mode of Payment:</p></div>
                                                                        <div class="col-xs-7"><p>{{ $list->payment_mode }}</p></div>
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
                                                                        <div class="col-sm-6 col-xs-6">{!! Form::number('basic_pay[]', $list->basic_pay / 2,[ 'step' => '.01' , 'id'=>'payslip_basic_pay_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
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
                                                                                $totalEarnings = $list->basic_pay / 2;
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
                                                                        <div class="col-sm-6 col-xs-6">{!! Form::number('tax[]', Option::salaryTax($list->basic_pay, $list->status) / 2,['step' => '.01' , 'id'=>'payslip_tax_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-xs-6"><p>SSS</p></div> 
                                                                        <div class="col-sm-6 col-xs-6">{!! Form::number('sss[]', Option::Benefits()->getSSS($list->basic_pay) / 2,['step' => '.01' , 'id'=>'payslip_sss_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-xs-6"><p>Pag-Ibig</p></div>
                                                                        <div class="col-sm-6 col-xs-6">{!! Form::number('pagibig[]', Option::Benefits()->getPagibig($list->basic_pay) / 2 ,['step' => '.01' , 'id'=>'payslip_pagibig_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'',  'disabled']) !!}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-xs-6"><p>Phil-Health</p></div>
                                                                        <div class="col-sm-6 col-xs-6">{!! Form::number('philhealth[]', Option::Benefits()->getPhilhealth($list->basic_pay) / 2,['step' => '.01' , 'id'=>'payslip_philhealth_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'', 'disabled']) !!}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-xs-6"><p>Absences/Tardiness:</p></div>
                                                                        <div class="col-sm-6 col-xs-6">{!! Form::number('absent[]', 0,['step' => '.01' , 'id'=>'payslip_absent_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-xs-6"><p>Loans:</p></div>
                                                                        <div class="col-sm-6 col-xs-6">{!! Form::number('loans[]', '',['step' => '.01', 'max'=> '' , 'id'=>'payslip_loans_'.$id, 'class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px; float:right;' ,  'placeholder'=>'']) !!}</div>
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
                                                                                $tax =  Option::salaryTax($list->basic_pay, $list->status);
                                                                                $sss = Option::Benefits()->getSSS($list->basic_pay);
                                                                                $philhealth =Option::Benefits()->getPhilhealth($list->basic_pay);
                                                                                $pagibig = Option::Benefits()->getPagibig($list->basic_pay);
                                                                                
                                                                            
                                                                                $totalDeductions =  $tax + $sss + $pagibig + $philhealth;
                                                                            @endphp
                                                                            <div class="col-sm-6" style="padding-left: 0px;">
                                                                                <p id="payslip_total_deductions_{{ $id }}" class="payslip-head" style="text-align: right;">{{ number_format( ($totalDeductions / 2) , 2, '.', ',')  }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    @php
                                                                        $netPay = $totalEarnings - ($totalDeductions / 2);
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
{!! Form::close() !!}



@foreach ( Option::company()->employees as $employee)
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






<script type="text/javascript">
    $(document).ready(function(){
        $("button[data-number=2]").click(function(){
            $('.modal2').modal('hide');
        });
        
        $("button[data-number=1]").click(function(){
            $('.modal').modal('hide');
        });
    })
</script>



