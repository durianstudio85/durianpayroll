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
                <th>Mobile Active</th>
                <th>Updated By</th>
                <th>Updated Date</th>               
            </tr>
        </thead>
        <tbody>
            @foreach( $employee_adjustment as $employee)
                <tr class="odd gradeX" data-toggle="modal" data-target="#edit-edit-adjustment-{{ $employee->id }}">
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
                   <td></td>
                   <td></td>
                   <td>{{ $difference }}</td>
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
                            <select name="employee_id" id="employee_list" class="js-select form-control" required>
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


<!--  END EDIT PAY ADJUSTMENT FORM -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#employee_list").click(function(){
            $("#current_basic_pay").val('Wala Pa sila basic Pay');
        });
    });
</script>


@stop