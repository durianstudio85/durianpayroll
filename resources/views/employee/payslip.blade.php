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
    <br><br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
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
			        	
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>
@stop