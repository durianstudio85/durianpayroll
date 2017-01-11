@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<div class="dp-container">
<br><br><br>
<p>If your company has multiple locations or branches, define them here. Employee work locations can be determined via assignment in the employee’s details page, which work in conjunction with location-specific holidays.</p><br>
	<div class="dp-right full-width dp-text-right">
	    <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Location-Offices">Add Location and Office</button>
	</div>
	<table width="100%" class="table table-striped table-hover" id="dataTables-example">
	    <thead>
	        <tr>
	            <th>Location Name</th>
	            <th>Location Description</th>
	            <th>Created By</th>
	            <th>Updated By</th> 
	        </tr>
        </thead>
	    <tbody>
            @foreach( $locations as $location )
                <tr class="">
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->description }}</td>
                    <td>{{ Auth::User($location->user_id)->first_name }} {{ Auth::User($location->user_id)->last_name }}</td>
                    <td>
                        @if ( $location->update_user_id > 0 )
                            {{ Auth::User($location->update_user_id)->first_name }}
                        @endif
                    </td>
                </tr>
	        @endforeach
	    </tbody>
	</table>
</div>




<!-- ADD Location Offices FORM-->
<div class="modal fade" id="Add-Location-Offices" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::open(['url'=>'company/location&officess/create', 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Location and Offices</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Location Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Location Description', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('description', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <input type="button" class="btn dp-primary-bg" value="Save"> -->
                    {!! Form::submit('Save', ['class' => 'btn dp-primary-bg']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<!-- END ADD Location-Offices FORM -->
@stop