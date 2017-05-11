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
    			        		<td>{{ 1000 + $list->id }}</td>
    			        		<td>{{ date('l, F d, Y', strtotime($list->date_start_range)) }} - {{ date('l, F d, Y', strtotime($list->date_end_range)) }}</td>
    			        		<td>{{ round(abs(strtotime($list->date_start_range)-strtotime($list->date_end_range))/86400) }} Days</td>
                                <td>{{ date('l, F d, Y', strtotime($list->created_at)) }}</td>
                                <td>{{ $list->status }}</td>
    			        		<td>
    			        			<center>
    				        			<a href="#edit" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#editPayroll{{ $list->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        {!! Form::open(['method'=>'delete','url' => ['payroll', $list->id], 'onsubmit' => 'return ConfirmDelete()', 'style' => 'display: inline;color: #adacac;']) !!}
                                            <button type="submit" style="background-color: #f9f9f9;border: 1px solid #f9f9f9;">
                                                <i class="fa fa-btn fa-trash-o"></i>
                                            </button>
                                        {!! Form::close() !!}
                                </td>
    				        			<!-- <a href="#trash" style="color: #adacac;margin: 0px 5px;font-size: 15px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
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

<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

</script>

<!-- Create Payroll -->
@foreach($payroll as $modalList)
    <div class="modal fade" id="editPayroll{{ $modalList->id }}" role="dialog">
        <div class="modal-dialog modal-dialog-extended modal-lg">
            <div class="modal-content">
                {!! Form::model($modalList, ['method'=>'patch', 'action'=>['PayrollController@update', $modalList->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}       
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Create Payroll</h3>
                    </div>
                    <div class="modal-body">
                        <div style="padding: 0px 0px;">    
                            <div class="container-fluid">
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
                                            <th>Deductions</th>
                                            <th>Total Pay</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( Option::getPayrollItems($modalList->id) as $payrollItems)
                                            <tr>
                                                <td>{{ Option::employeeName($payrollItems->employee_id)->employee_id }}</td>
                                                <td>{{ Option::employeeName($payrollItems->employee_id)->last_name }}, {{ Option::employeeName($payrollItems->employee_id)->first_name }}</td>
                                                <td>{{ $payrollItems->basic_pay }}</td>
                                                <td>{{ $payrollItems->sss }}</td>
                                                <td>{{ $payrollItems->pagibig }}</td>
                                                <td>{{ $payrollItems->philhealth }}</td>
                                                <td>{{ $payrollItems->tax }}</td>
                                                <td>
                                                    {!! Form::hidden('employee_id[]', $payrollItems->id) !!}
                                                    {!! Form::number('deductions[]', $payrollItems->deduction,['class'=>'form-control input-sm', 'style'=>'min-height: 20px; height: 24px; width: 140px;' ,  'placeholder'=>'', 'required']) !!}
                                                </td>
                                                <td>
                                                    {{ $payrollItems->total_pay }}
                                                    <!-- {{ $payrollItems->basic_pay - ( $payrollItems->sss + $payrollItems->pagibig + $payrollItems->philhealth + $payrollItems->tax + $payrollItems->deduction ) }} -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-2">
                                        {!! Form::select('status', ['Paid' => 'Paid', 'Unpaid' => 'Unpaid'], $modalList->status, [ 'class' => 'form-control', 'required']) !!}
                                    </div>
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

@stop