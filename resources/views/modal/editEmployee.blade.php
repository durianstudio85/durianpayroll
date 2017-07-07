@foreach( Option::company()->employees as $list_modal )
 <div class="modal fade" id="editEmployee-{{ $list_modal->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::model($list_modal, ['method'=>'patch', 'action'=>['Admin\EmployeeController@update', $list_modal->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit Employee</h3>
                </div>
                <div class="modal-body">
                    <div style="padding: 0px 20px;">                
                        
                        <div class="form-group">
                            {!! Form::label('employee_id', 'Employee ID*', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('empID', null,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
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
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], null,['class'=>'form-control select', 'placeholder'=>'Select', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::select('status', Option::TaxStatus(), null,['class'=>'form-control select', 'required']) !!}
                            </div>
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
                                
                                {!! Form::select('position', Option::selectPositions(), $list_modal->position_id, ['placeholder' => '', 'class'=>'form-control select-create-'.$list_modal->id.' ']) !!}
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
        $('.select-create-{{ $list_modal->id }}').selectize({
            create: true,
            sortField: 'text'
        });
    });
</script>
@endforeach



