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
				<h1>Employees</h1>
			</div>
		</div>	
		@include('notification.flash')
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
			    <div class="dp-right full-width dp-text-right">
			        <button class="btn dp-primary-bg" data-toggle="modal" data-target="#addEmployee">Add Employees</button>
			        <!-- <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Mass-Employee"><i class="fa fa-upload"></i> Mass and Employees</button> -->
			        <!-- <button class="btn dp-danger-bg"><i class="fa fa-download"></i> Download 201</button> -->
			    </div>			    
			    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
			        <thead>
			            <tr>
			                <th>Employee ID</th>
			                <th>First Name</th>
			                <th>Last Name</th>
			                <th>Position</th>
			                <th>Basic Pay</th>
			                <th>SSS</th>
			                <th>PagIbig</th>
			                <th>PhilHealth</th>
			                <th>Tax</th>
			                <th>&nbsp;</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach( $company->employees as $list )
    			        	<tr>
    			        		<td>{{ $list->empID }}</td>
    			        		<td>{{ $list->first_name }}</td>
    			        		<td>{{ $list->last_name }}</td>
    			        		<td>{{ $list->position->name }}</td>
    			        		<td>{{ $list->basic_pay }}</td>
    			        		<td>{{ $benefit->getSSS($list->basic_pay) }}</td>
    			        		<td>{{ $benefit->getPagibig($list->basic_pay) }}</td>
    			        		<td>{{ $benefit->getPhilhealth($list->basic_pay) }}</td>
    			        		<td>{{ number_format(Option::salaryTax($list->basic_pay, $list->status), 2, '.', ',')  }}</td>
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

@include('modal.editEmployee')

@stop