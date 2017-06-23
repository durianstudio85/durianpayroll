@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

@if ( Option::getNavOption() == 'side' )
    <div class="dp-container">
@else
    <div class="container-fluid">
@endif
{!! Form::model($company, ['method'=>'patch', 'action'=>['CompanyController@update', $company->id], 'files'=>'true']) !!}
<br><br><br>
    <p>Basic information about your company. The Company Logo you upload here will be visible in the top left corner of the navigation bar as well as your payslips, clock in app and bank advice.</p>
    <br>
    <div class="dp-panel-form col-md-12">
        <h3>Company Information</h3>
        <br>
        <div class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('company_name', 'Business Name', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('company_name', $company->company_name,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('trade_name', 'Trade Name', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('trade_name', $company->trade_name,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('org_type', 'Organization Type', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('org_type', $company->org_type,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                     {!! Form::label('company_logo', 'Company Logo', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::file('company_logo', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <div class="dp-panel-form col-md-12">
        <h3>Business Address</h3>
        <br>
        <div class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('business_address', 'Address', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('business_address', $company->business_address,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('business_city', 'City', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('business_city', $company->business_city,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('business_zip', 'Zip Code', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('business_zip', $company->business_zip,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('business_country', 'Country', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('business_country', $company->business_country,['class'=>'form-control', 'placeholder'=>'']) !!}
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
                    {!! Form::label('contact_email', 'Email Address', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::email('contact_email', $company->contact_email,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('contact_telephone', 'Telephone', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('contact_telephone', $company->contact_telephone,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('contact_fax', 'Fax', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('contact_fax', $company->contact_fax,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('contact_web', 'Website', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('contact_web', $company->contact_web,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('contact_telephone_ext', 'Telephone Ext.', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('contact_telephone_ext', $company->contact_telephone_ext,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('contact_mobile', 'Mobile', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('contact_mobile', $company->contact_mobile,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dp-panel-form col-md-12">
        <h3>Government Registration</h3>
        <br>
        <div class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('gov_business_cat', 'Business Category', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('gov_business_cat', $company->gov_business_cat,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('gov_rdo', 'RDO', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('gov_rdo', $company->gov_rdo,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('gov_hdmf', 'HDMF', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('gov_hdmf', $company->gov_hdmf,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('gov_tin', 'TIN', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('gov_tin', $company->gov_tin,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('gov_sss', 'SSS', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('gov_sss', $company->gov_sss,['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('gov_philhealth', 'Philhealth', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('gov_philhealth', $company->gov_philhealth,['class'=>'form-control', 'placeholder'=>'']) !!}
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
                        {!! Form::select('nav', ['top' => 'Top', 'side' => 'Side'], $company->nav,['class'=>'form-control', 'required']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nav', 'Salary Type', ['class' => 'control-label col-sm-4']); !!}
                    <div class="col-sm-8">
                        {!! Form::select('salary_type', ['d' => 'Daily', 'w' => 'Weekly', 'sm' => 'Semi-Monthly', 'm' => 'Monthly'], $company->salary_type,['class'=>'form-control', 'required']) !!}
                    </div>
                </div>
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