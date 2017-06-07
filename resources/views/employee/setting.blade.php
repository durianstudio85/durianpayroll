@extends('employee.include.header')
@section('content')
<br><br>
    <div class="container-fluid">

{!! Form::model($myProfile, ['method'=>'patch', 'action'=>['EmployeeAccController@settingUpdate', $myProfile->id], 'files'=>'true']) !!}
<br><br><br>
    <p>Basic information about your company. The Company Logo you upload here will be visible in the top left corner of the navigation bar as well as your payslips, clock in app and bank advice.</p>
    <br>
    <div class="dp-panel-form col-md-12">
        <h3>Personal Information</h3>
        <br>
        <div class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('first_name', $myProfile->first_name,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('middle_name', 'Middle Name', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('middle_name', $myProfile->middle_name,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('last_name', $myProfile->last_name,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('dob', 'Date of Birth', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('dob', $myProfile->dob,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                     {!! Form::label('company_logo', 'Profile pic', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::file('company_logo', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <div class="dp-panel-form col-md-12">
        <h3>Contact Information</h3>
        <br>
        <div class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('Address', 'Address', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('address', $myProfile->address,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('contactno1', 'Contact No 1', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('contactno1', $myProfile->contactno1,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('contactno2', 'Contact No 2', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('contactno2', $myProfile->contactno2,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dp-panel-form col-md-12">
        <h3>Personalize</h3>
        <br>
        <div class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nav', 'Menu Position', ['class' => 'control-label col-sm-4']); !!}
                    <div class="col-sm-8">
                        {!! Form::select('nav', ['top' => 'Top', 'side' => 'Side'], 'Side',['class'=>'form-control', 'required']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                &nbsp;
            </div>
        </div>
    </div>
    <div class="col-md-2">
      <!-- <input type="button" class="btn dp-white-bg pull-left" value="Cancel"> -->
      {!! Form::submit('Update Information', ['class' => 'btn dp-primary-bg']) !!}
      <!-- <input type="button" class="btn dp-primary-bg pull-right" value="Submit"> -->
      <br><br><br><br>
    </div>
{!! Form::close() !!}
</div>

@stop



