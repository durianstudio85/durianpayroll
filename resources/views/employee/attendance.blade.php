@extends('employee.include.header')
@section('content')
<br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<h1>Attendance</h1>
			</div>
		</div>	
		@include('notification.flash')
	</div>
    <br>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
                 <div class="dp-right full-width dp-text-right">
                    <!-- <button class="btn dp-primary-bg" data-toggle="modal" data-target="#apply_loan">Apply Loan Request</button> -->
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