@extends('employee.include.header')
@section('content')
<br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h1>Attendance</h1>		
					</div>
				</div>
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
                <div class="row">
                	<div class="col-md-12">
                		{!! Form::open(['method'=>'GET','url'=>'employee/attendance','class'=>'form-inline','role'=>'search'])  !!}
                			<div class="form-group">
						    	<label for="email">Date Range</label>
						    	{!! Form::text('date_start', $date_start,['class'=>'form-control', 'placeholder'=>'Date Start' , 'onfocus' => '(this.type="date")', 'required']) !!}
						    	<label for="separate">-</label>
						    	{!! Form::text('date_end', $date_end,['class'=>'form-control', 'placeholder'=>'Date End' , 'onfocus' => '(this.type="date")', 'required']) !!}
						  	</div>
						  	<button type="submit" class="btn dp-primary-bg">Search</button>
                		{!! Form::close() !!}
                	</div>
                </div>
                <br>
			    <table width="100%" class="table table-striped table-hover">
			        <thead>
			            <tr>
			                <th>Date</th>
			                <th>Time In</th>
                            <th>Time Out</th>
                            <th>Note</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
                        @foreach( $attendance as $list )
    			        	<tr>
                                <td>{{ date('l, F d, Y', strtotime($list->date)) }}</td>
                                <td>{{ date("g:i a", strtotime($list->time_in)) }}</td>
                                <td>{{ date("g:i a", strtotime($list->time_out)) }}</td>
                                <td>{{ $list->note }}</td>
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