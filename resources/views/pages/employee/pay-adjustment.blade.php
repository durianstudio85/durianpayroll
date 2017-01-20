@extends('header_footer')


@section('content')

<div class="dp-submenu">
  
        <ul>
        <li><a href="{{ Url('employee-201') }}"> 201 Files </a></li>
        <li><a href="{{ Url('earnings') }}"> Earnings </a></li>
        <li><a href="{{ Url('payAdjustment') }}"> Basic Pay Adjustments </a></li>
        <li><a href="{{ Url('allowance') }}"> Allowances </a></li>
        <li><a href="{{ Url('loan') }}"> Loans </a></li>
        <li><a href="{{ Url('deduction') }}"> Deductions </a></li>
        <li><a href="{{ Url('adjustment') }}"> Adjustments </a></li>
        <li><a href="{{ Url('shifts') }}"> Shifts </a></li>
        <li><a href="{{ Url('leaves') }}"> Leaves </a></li>
        <li><a href="{{ Url('termination') }}"> Terminations </a></li>
        <li><a href="{{ Url('YTD-summary') }}"> YTD Summary </a></li>
      </ul>
    
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('flash_message'))
                <div class="alert {{ Session::get('flash_message_important') }} ">
                    {{session('flash_message')}}
                </div>
            @endif
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="dp-right full-width dp-text-right">
        <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Employee">Add Basic Pay Adjustment</button>
    </div>
    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th style="width: 1px;">{{ Form::checkbox('name', 'value', false) }}</th>
                <th>Employee Name</th>
                <th>Basic Pay</th>
                <th>Effective Date</th>
                <th>Adjustment Date</th>
                <th>Adjustment Reason</th>
                <th>Created By</th>
                <th class="sorting_asc">Created Date</th>
                <th>Updated By</th>
                <th>Updated Date</th>               
            </tr>
        </thead>
        <tbody>
            @foreach( $employee_adjustment as $employee)
                <tr class="odd gradeX" data-toggle="modal" data-target="#edit-adjustment-{{ $employee->id }}">
                    <td>{{ Form::checkbox('name', 'value', false) }}</td>
                   <td>
                        @foreach ( $userInfo as $userID => $userValue )
                            @if ( $userID == $employee->employee_id )
                                {{ $userValue }}
                            @endif
                        @endforeach
                   <td>
                        {{ number_format($employee->basic_pay, 2) }}
                        @foreach( $payTypeItems as $key => $value )
                            @if ( $key == $employee->rate_type )
                                {{ $value }}
                            @endif
                        @endforeach
                   </td>
                   <td>{{ $employee->effective_date }}</td>
                   <td>
                        @if ( $employee->adjustment_date != '0000-00-00' )
                            {{ $employee->adjustment_date }}
                        @endif
                    </td>
                   <td>{{ $employee->adjustment_reason }}</td>
                   <td>
                        @foreach ( $userInfo as $userID => $userValue )
                            @if ( $userID == $employee->created_by )
                                {{ $userValue }}
                            @endif
                        @endforeach
                    </td>
                   <td>{{ $employee->created_at }}</td>
                   <td>
                        @foreach ( $userInfo as $userID => $userValue )
                            @if ( $userID == $employee->updated_by )
                                {{ $userValue }}
                            @endif
                        @endforeach
                   </td>
                   <td>{{ $employee->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- ADD PAY ADJUSTMENT FORM-->

<div class="modal fade" id="Add-Employee" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        {!! Form::open(['url'=>'payAdjustment', 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Employee Basic Pay Adjustments</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Employee Name</label>
                        <div class="col-sm-9">
                    <!-- <input type="text" class="form-control" placeholder="Search Employees"> -->
                            <select name="employee_id" id="employee_list" class="js-select form-control" onchange="myFunction()" required>
                                <option value=""> -- Select Employee --</option>
                                @foreach ( $employee_list as $list )
                                    <option value="{{ $list->user_id }}">{{ $list->last_name.', '.$list->first_name.' '.$list->middle_name  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Current Basic Pay</label>
                        <div class="col-sm-9">
                            {!! Form::text('type', null,['class'=>'form-control', 'id' => 'current_basic_pay', 'placeholder'=>'','disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">New Basic Pay</label>
                        <div class="col-sm-9">
                            <div class="col-md-6">
                                {!! Form::text('basic_pay', null,['class'=>'form-control', 'placeholder'=>'','required']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::select('rate_type', $pay_type_list, null,['id'=>'tag_list','class'=>'form-control', 'placeholder'=>'-- Select --', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Effictive Date</label>
                        <div class="col-sm-9">
                            {!! Form::date('effective_date', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Adjustemt Date (Optional)</label>
                        <div class="col-sm-9">
                            {!! Form::date('adjustment_date', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Adjustemt Reason (Optional)</label>
                        <div class="col-sm-9">
                            {!! Form::text('adjustment_reason', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  {!! Form::submit('Save', ['class' => 'btn dp-primary-bg']) !!}
                </div>
            </div>
        {!! Form::close() !!} 
    </div>
</div>

<!-- END ADD PAY ADJUSTMENT FORM -->  

<!-- EDIT PAY ADJUSTMENT FORM -->
@foreach( $employee_adjustment as $employeeEdit)
    <div class="modal fade" id="edit-adjustment-{{ $employeeEdit->id }}" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <!-- {!! Form::open(['url'=>'payAdjustment', 'class' => 'form-horizontal']) !!} -->
            {!! Form::model($employeeEdit, ['method'=>'patch', 'action'=>['PayAdjustmentController@update', $employeeEdit->id],'class' => 'form-horizontal', 'files'=>'true']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Edit Employee Basic Pay Adjustments</h3>
                    </div>
                    <div class="modal-body">
                        @if ( $employeeEdit->status == 'current' )
                            <div class="form-group">
                                <label class="control-label col-sm-3">Current Basic Pay</label>
                                <div class="col-sm-9">
                                    @foreach ( $getCurrentSalary as $id => $salary)
                                        @if ( $employeeEdit->employee_id == $id )
                                            {!! Form::text('basic_pay',  $salary,['class'=>'form-control', 'id' => 'current_basic_pay', 'placeholder'=>'', 'required']) !!}         
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label class="control-label col-sm-3">Employee Name</label>
                                <div class="col-sm-9">
                                    @foreach ( $userInfo as $userID => $userContent )
                                        @if ( $userID == $employeeEdit->employee_id )
                                            {!! Form::text('viewonly', $userContent,['class'=>'form-control', 'id' => 'current_basic_pay', 'placeholder'=>'','disabled']) !!}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Current Basic Pay</label>
                                <div class="col-sm-9">
                                    @foreach ( $getCurrentSalary as $id => $salary)
                                        @if ( $employeeEdit->employee_id == $id )
                                            {!! Form::text('cbp',  number_format($salary, 2),['class'=>'form-control', 'id' => 'current_basic_pay', 'placeholder'=>'','disabled']) !!}         
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">New Basic Pay*</label>
                                <div class="col-sm-9">
                                    <div class="col-md-6">
                                        {!! Form::text('basic_pay', $employeeEdit->basic_pay ,['class'=>'form-control', 'placeholder'=>'','required']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::select('rate_type', $pay_type_list, $employeeEdit->rate_type,['id'=>'tag_list','class'=>'form-control',  'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Effective Date*</label>
                                <div class="col-sm-9">
                                    {!! Form::date('effective_date', $employeeEdit->effective_date,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Adjustemt Date (Optional)</label>
                                <div class="col-sm-9">
                                    {!! Form::date('adjustment_date', $employeeEdit->adjustment_date,['class'=>'form-control', 'placeholder'=>'']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Adjustemt Reason (Optional)</label>
                                <div class="col-sm-9">
                                    {!! Form::text('adjustment_reason', $employeeEdit->effective_reason,['class'=>'form-control', 'placeholder'=>'']) !!}
                                </div>
                            </div>
                        
                        @endif
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      {!! Form::submit('Save', ['class' => 'btn dp-primary-bg']) !!}
                    </div>
                </div>
            {!! Form::close() !!} 
        </div>
    </div>
@endforeach

<!--  END EDIT PAY ADJUSTMENT FORM -->

<script>
    function myFunction() {
        var x = document.getElementById("employee_list").value;
        if ( x != '' ){    
             document.getElementById("current_basic_pay").value = "No Current Pay Adjustment";
        }
        @foreach ( $getCurrentSalary as $id => $salary)
            if ( x == {{ $id }} ){    
                 document.getElementById("current_basic_pay").value = "{{ number_format($salary, 2) }}";
            }
        @endforeach
        
    
    }
</script>


@stop