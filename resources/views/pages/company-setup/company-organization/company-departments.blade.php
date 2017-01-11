@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')
<br><br></br>
<div class="dp-nav-tab">
    <ul class="nav nav-tabs">
        <li class="active"><a  href="{{ Url('company/departments') }}">Departments</a></li>
        <li><a  href="{{ Url('company/positions') }}">Positions</a></li>
        <li><a  href="{{ Url('company/ranks') }}">Ranks</a></li>
        <li><a  href="{{ Url('company/employment-type') }}">Employment Type</a></li>
    </ul>
</div>
<div class="dp-container">
<p>Define your company departments here. Shifts can be assigned to departments, and the attendance and payroll dashboards can be filtered via department.</p>
    <div class="dp-right full-width dp-text-right">
	    <button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Department">Add Department</button>			 
    </div>
	<table width="100%" class="table table-striped table-hover" id="dataTables-example">
        <thead>
			<tr>
				<th>Department Name</th>
				<th>Created By</th>
                <th>Created Date</th>
				<th>Updated By</th>
                <th>Updated Date</th>
            </tr>
        </thead>
		<tbody>
            @foreach ( $department_list as $department)
                <tr class="odd gradeX" data-toggle="modal" data-target="#Edit-Department{{ $department->id }}">
                    <td> {{ $department->name }}</td>
                    <td>{{ Auth::User($department->user_id)->first_name }} {{ Auth::User($department->user_id)->last_name }}</td>
                    <td>{{ $department->created_at }}</td>
                    <td>
                        @if( $department->update_user_id > 0 )
                            {{ Auth::User($department->update_user_id)->first_name }} {{ Auth::User($department->update_user_id)->last_name }}
                        @endif
                    </td>
                    <td>
                        @if( $department->created_at != $department->updated_at )
                            {{ $department->updated_at }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



<!-- ADD Department FORM-->
<div class="modal fade" id="Add-Department" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::open(['url'=>'company/departments', 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Department</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Department Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
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

<!-- END ADD Location-Offices FORM -->

<!-- Edit Department FORM-->
@foreach ( $department_list as $department)
<div class="modal fade" id="Edit-Department{{ $department->id }}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::model($department, ['method'=>'patch', 'action'=>['OptionController@departmentUpdate', $department->id], 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit Department</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Department Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $department->name,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
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
@endforeach
<!-- END Edit Location-Offices FORM -->

@stop