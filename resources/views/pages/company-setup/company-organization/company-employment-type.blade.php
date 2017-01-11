@extends('header_footer')
@section('content')

@include('pages.company-setup.include.admin-sidebar')
<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
    <li><a  href="{{ Url('company/departments') }}">Departments</a></li>
    <li><a  href="{{ Url('company/positions') }}">Positions</a></li>
    <li><a  href="{{ Url('company/ranks') }}">Ranks</a></li>
    <li class="active"><a  href="{{ Url('company/employment-type') }}">Employment Type</a></li>
  </ul>
</div>


<div class="dp-container">
	<p>Specify employment types applicable to your company. We have created couple of standard types for your convenience.</p><br>
	<div class="dp-right full-width dp-text-right">
		<button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Employment-Type">Add Employment Type</button>
	</div>
	<table width="100%" class="table table-striped table-hover" id="dataTables-example">
		<thead>
		    <tr>
                <th>Employee Type</th>
                <th>Created By</th>
                <th>Created Date</th>
                <th>Updated By</th>
                <th>Updated Date</th>
            </tr>
		</thead>
        <tbody>
		    @foreach ( $employee_type_list as $employee_type)
                <tr class="odd gradeX" data-toggle="modal" data-target="#Edit-employee_type{{ $employee_type->id }}">
                    <td> {{ $employee_type->type }}</td>
                    <td>{{ Auth::User($employee_type->user_id)->first_name }} {{ Auth::User($employee_type->user_id)->last_name }}</td>
                    <td>{{ $employee_type->created_at }}</td>
                    <td>
                        @if( $employee_type->update_user_id > 0 )
                            {{ Auth::User($employee_type->update_user_id)->first_name }} {{ Auth::User($employee_type->update_user_id)->last_name }}
                        @endif
                    </td>
                    <td>
                        @if( $employee_type->created_at != $employee_type->updated_at )
                            {{ $employee_type->updated_at }}
                        @endif
                    </td>
                </tr>
            @endforeach                               		                                                                      
        </tbody>
    </table>
</div>






<!-- ADD Employment Type FORM-->

 <div class="modal fade" id="Add-Employment-Type" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::open(['url'=>'company/employment-type', 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Employment Type</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('type', 'Employment Type', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('type', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
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

<!-- END ADD Employment Type FORM -->


<!-- EDIT employment_type form -->
@foreach ( $employee_type_list as $employment_type)
<div class="modal fade" id="Edit-employee_type{{ $employment_type->id }}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::model($employment_type, ['method'=>'patch', 'action'=>['OptionController@employeetypeUpdate', $employment_type->id], 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit employment_type</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('type', 'Employment Type', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('type', $employment_type->type,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
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


@stop