<!-- Add Employee -->
<div class="modal fade" id="addEmployee" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['url'=>'employees','files'=>'true' , 'class' => 'form-horizontal']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Add Employee</h3>
            </div>
            <div class="modal-body">
                <div style="padding: 0px 20px;">                
                    
                    <div class="form-group">
                        {!! Form::label('employee_id', 'Employee ID*', ['class' => 'col-sm-2 control-label']); !!}
                        <div class="col-sm-10">
                            {!! Form::text('empID', old('empID'),['class'=>'form-control', 'placeholder'=>'']) !!}
                            @if ($errors->has('empID'))
                                <span class="help-block">
                                    <strong>The employee ID field is required</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name*', ['class' => 'col-sm-2 control-label']); !!}
                        <div class="col-sm-10">
                            {!! Form::text('last_name', old('last_name'),['class'=>'form-control', 'placeholder'=>'']) !!}
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name*', ['class' => 'col-sm-2 control-label']); !!}
                        <div class="col-sm-10">
                            {!! Form::text('first_name', old('first_name'),['class'=>'form-control', 'placeholder'=>'']) !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('middle_name', 'Middle Name', ['class' => 'col-sm-2 control-label']); !!}
                        <div class="col-sm-10">
                            {!! Form::text('middle_name', old('middle_name'),['class'=>'form-control', 'placeholder'=>'']) !!}
                            @if ($errors->has('middle_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']); !!}
                        <div class="col-sm-10">
                            {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], old('gender'),['class'=>'form-control select']) !!}
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']); !!}
                        <div class="col-sm-10">
                            {!! Form::select('status', Option::TaxStatus(), old('status'),['class'=>'form-control select']) !!}
                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                            <!-- ['single' => 'Single', 'married' => 'Married'] -->
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email*', ['class' => 'col-sm-2 control-label']); !!}
                        <div class="col-sm-10">
                            {!! Form::email('email', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
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
                            {!! Form::select('position', Option::selectPositions(), old('position'), ['placeholder' => '', 'class'=>'form-control select-create']) !!}
                            <!-- <div id="other_div_position">
                                {!! Form::text('other_position', null,['class'=>'form-control', 'placeholder'=>'New Position', 'id'=>'other_position', 'style'=>'']) !!}
                            </div> -->
                            
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.select-create').selectize({
            create: true,
            sortField: 'text'
        });
        
        $('.select').selectize({
            sortField: 'text'
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        @if (count($errors) > 0)
            $('#addEmployee').modal('show');
        @endif
    });
</script>