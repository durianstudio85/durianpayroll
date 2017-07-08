@extends('header_footer')
@section('content')


<br><br></br>
@if ( $company->nav == 'side' )
    <div class="dp-container">
@else
    <div class="container-fluid">
@endif
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<h1>Attendance</h1>
				<br>
				<br>
			</div>
		</div>	
		@include('notification.flash')
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
			    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
			        <thead>
			            <tr>
			                <th>ID No.</th>
			                <th>Employee</th>
			                <th>Position</th>
			                <th>Date</th>
			                <th>Clocked In</th>
			                <th>Clocked Out</th>
			                <th>IP</th>
			                <th>Browser</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach( $company->attendance as $list )
			        		<tr>
			        			<td>{{ $list->employee->empID }}</td>
			        			<td>{{ $list->employee->first_name.' '.$list->employee->last_name }} </td>
			        			<td>{{ $list->employee->position->name }}</td>
			        			<td>{{ date('l, F d, Y', strtotime($list->date)) }}</td>
			        			<td>{{ date('h:i A', strtotime($list->time_in)) }}</td>
			        			<td>{{ date('h:i A', strtotime($list->time_out)) }}</td>
			        			<td>{{ $list->ip_address }}</td>
			        			<td>{{ $list->browser }}</td>
			        		</tr>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>

@stop