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
			                <th>Date</th>
			                <th>Time In</th>
                            <th>Time Out</th>asdasdas
                            <th>Note</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
                        @foreach( $employee->attendance as $list )
    			        	<tr>
                                <td>{{ date('l, F d, Y', strtotimes($list->date)) }}</td>
                                <td>{{ date('h:i A', strtotime($list->time_in)) }}asdasasdas</td>
                                <td>{{ date('h:i A', strtotime($list->time_out)) }}</td>
                                <td>{{ $list->note }}asdasd</td>
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
@stop