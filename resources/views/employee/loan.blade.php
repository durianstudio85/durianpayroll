@extends('employee.include.header')
@section('content')
<br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<h1>Loans</h1>
			</div>
		</div>	
		@include('notification.flash')
	</div>
    <br>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
                 <div class="dp-right full-width dp-text-right">
                    <button class="btn dp-primary-bg" data-toggle="modal" data-target="#apply_loan">Apply Loan Request</button>
                </div>  
			    <table width="100%" class="table table-striped table-hover">
			        <thead>
			            <tr>
			                <th>Date Start</th>
			                <th>Amount</th>
                            <th>Amount per Pay</th>
                            <th>Balance</th>
                            <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
                        @foreach( $employee->loans as $list )
    			        	<tr>
                                <td>{{ $list->date_start }}</td>
                                <td>{{ number_format($list->loan_amount, 2, '.', ',')  }}</td>
                                <td>{{ number_format($list->amount_per_pay, 2, '.', ',') }}</td>
                                <td>{{ number_format($list->balance($list->id), 2, '.', ',') }}</td>
                                <td>
                                    @if($list->status == 1)
                                        Pending
                                    @elseif($list->status == 2)
                                        Approve
                                    @else
                                        Paid
                                    @endif
                                </td>
                                <td>
                                    <a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#loanChild-{{ $list->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>

@foreach( $employee->loans as $list )
    <div class="modal fade" id="loanChild-{{ $list->id }}" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Loan</h3>
                </div>
                <div class="modal-body">
                    <div style="padding: 0px 0px;">  
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <table width="100%" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Payment Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $list->loan_items as $items )
                                                <tr>
                                                    <td>{{ $items->date }}</td>
                                                    <td>{{ number_format($items->amount, 2, '.', ',')  }}</td>
                                                    <td>
                                                        @if($items->status == 1)
                                                            Pending
                                                        @elseif($items->status == 2)
                                                            Approve
                                                        @else
                                                            Paid
                                                        @endif
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
                <div class="modal-footer">
                    <div style="padding: 0px 20px;">    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        {!! Form::submit('Apply', ['class'=>'btn dp-primary-bg']) !!} 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach



<div class="modal fade" id="apply_loan" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {!! Form::open(['url'=>'employee/loans','files'=>'true', 'class' => 'form-horizontal']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Apply Loan</h3>
                </div>
                <div class="modal-body">
                    <div style="padding: 0px 0px;">    
                        <div class="container-fluid">
                            @if(Session::has('parent_modal_flash_message'))
                                <div class="row">
                                    <div class="col-md-12 alert-custom">
                                        <div class="alert alert-success">
                                            {{ session('child_modal_flash_message') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('date_start', 'Date Start', ['class' => 'col-sm-3 control-label']); !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('date_start', null,[ 'onfocus' => '(this.type="date")', 'placeholder'=>'Date Start', 'class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('amount', 'Amount', ['class' => 'col-sm-3 control-label']); !!}
                                        <div class="col-sm-9">
                                            {!! Form::number('amount', '',['id'=>'amount',  'step' => '.01','placeholder'=> '0.00', 'class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('amount', 'No. of Payment', ['class' => 'col-sm-3 control-label']); !!}
                                        <div class="col-sm-9">
                                            {!! Form::number('no_of_payments', '',['id'=>'no_of_payment', 'class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('amount', 'Amount Per Pay', ['class' => 'col-sm-3 control-label']); !!}
                                        <div class="col-sm-9">
                                            {!! Form::number('amount_per_pay', '',['step' => '.01', 'id'=>'amount_per_pay', 'class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="padding: 0px 20px;">    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        {!! Form::submit('Apply', ['class'=>'btn dp-primary-bg']) !!} 
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
       $('#no_of_payment, #amount').keyup( function () {
            var amount = 0;
            var no_of_payment = 1;
            
            if ( $('#no_of_payment').val() != '') 
            { 
                no_of_payment = parseFloat($('#no_of_payment').val()); 
            };
            
            if ( $('#amount').val() != '') 
            { 
                amount = parseFloat($('#amount').val()); 
            };
            
            var totalAmount = amount / no_of_payment;
            
            $('#amount_per_pay').val(totalAmount);
       });
    });
</script>
@stop