@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>

<div class="dp-container">
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
    			        		<td>{{ $list->payroll_id }}</td>
    			        		<td>{{ date('l, F d, Y', strtotime($list->date_start_range)) }} - {{ date('l, F d, Y', strtotime($list->date_end_range)) }}</td>
    			        		<td>{{ $list->date_end_range - $list->date_start_range }}7 Days</td>
                                <td>{{ date('l, F d, Y', strtotime($list->created_at)) }}</td>
                                <td>{{ $list->status }}</td>
    			        		<td>
    			        			<center>
    				        			<a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#editEmployee-{{ $list->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    				        			<a href="#trash" style="color: #adacac;margin: 0px 5px;font-size: 15px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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

@stop