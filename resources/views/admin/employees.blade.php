@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>
@if ( Option::getNavOption() == 'side' )
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
			        	@foreach( $employee as $list )
    			        	<tr>
    			        		<td>{{ $list->employee_id }}</td>
    			        		<td>{{ $list->first_name }}</td>
    			        		<td>{{ $list->last_name }}</td>
    			        		<td>{{ Option::optionDetails($list->position)->name }}</td>
    			        		<td>{{ $list->basic_pay }}</td>
    			        		<td>{{ $benefit->getSSS($list->basic_pay) }}</td>
    			        		<td>100</td>
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

<!-- Edit Employee -->
@foreach( $employee as $list_modal )
<!-- Add Employee -->
    <div class="modal fade" id="editEmployee-{{ $list_modal->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::model($list_modal, ['method'=>'patch', 'action'=>['EmployeeController@update', $list_modal->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit Employee</h3>
                </div>
                <div class="modal-body">
                    <div style="padding: 0px 20px;">                
                        
                        <div class="form-group">
                            {!! Form::label('employee_id', 'Employee ID*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('employee_id', null,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('last_name', null,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('first_name', null,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('middle_name', 'Middle Name', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('middle_name', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], null,['class'=>'form-control', 'placeholder'=>'Select', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::select('status', Option::TaxStatus(), null,['class'=>'form-control', 'required']) !!}
                            </div>

                                <!-- ['single' => 'Single', 'married' => 'Married'] -->
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::email('email', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('mobile_no', 'Mobile Number', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('mobile_no', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('position', 'Position', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                <select class="form-control" name="position" onchange="showNewPosition(this)" required>
                                    
                                    @foreach ( Option::getCurrentOption('position') as $options )
                                        @if($options->id == $list_modal->position )
                                            <option selected="selected" value="{{ $options->id }}">{{ $options->name }}</option>
                                        @else
                                            <option value="{{ $options->id }}">{{ $options->name }}</option>
                                        @endif
                                    @endforeach
                                    <option value="new">( Add New )</option>
                                </select>
                                {!! Form::text('other_position', null,['class'=>'form-control', 'placeholder'=>'New Position', 'id'=>'other_position', 'style'=>'display: none;']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('basic_pay', 'Basic Pay', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::number('basic_pay', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="padding: 0px 20px;">    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Save', ['class'=>'btn dp-primary-bg']) !!}    
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
@endforeach
<!-- End Edit Employee -->
@stop