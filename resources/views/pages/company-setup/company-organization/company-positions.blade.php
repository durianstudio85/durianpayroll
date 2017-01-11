@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')
<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
    <li><a  href="{{ Url('company/departments') }}">Departments</a></li>
    <li class="active"><a  href="{{ Url('company/positions') }}">Positions</a></li>
    <li><a  href="{{ Url('company/ranks') }}">Ranks</a></li>
    <li><a  href="{{ Url('company/employment-type') }}">Employment Type</a></li>
  </ul>
</div>


<div class="dp-container">
	<p>pecify employment types applicable to your company. We have created couple of standard types for your convenience.</p><br>
	<div class="dp-right full-width dp-text-right">
		<button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Position">Add Position</button>
	</div>
    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Position Name</th>		                                       
                <th>Created By</th>
                <th>Created Date</th>
                <th>Updated By</th>
                <th>Uodated Date</th>
            </tr>
        </thead>
        <tbody>
           @foreach ( $position_list as $position)
                <tr class="odd gradeX" data-toggle="modal" data-target="#Edit-position{{ $position->id }}">
                    <td> {{ $position->name }}</td>
                    <td>{{ Auth::User($position->user_id)->first_name }} {{ Auth::User($position->user_id)->last_name }}</td>
                    <td>{{ $position->created_at }}</td>
                    <td>
                        @if( $position->update_user_id > 0 )
                            {{ Auth::User($position->update_user_id)->first_name }} {{ Auth::User($position->update_user_id)->last_name }}
                        @endif
                    </td>
                    <td>
                        @if( $position->created_at != $position->updated_at )
                            {{ $position->updated_at }}
                        @endif
                    </td>
                </tr>
            @endforeach
	    </tbody>
	</table>
</div>



<!-- ADD Position FORM-->

 <div class="modal fade" id="Add-Position" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::open(['url'=>'company/positions', 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Position</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Postion Name', ['class' => 'control-label col-sm-3']) !!}
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

<!-- END ADD Position FORM -->


<!-- Edit Position form -->
@foreach ( $position_list as $position)
<div class="modal fade" id="Edit-position{{ $position->id }}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::model($position, ['method'=>'patch', 'action'=>['OptionController@positionUpdate', $position->id], 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit position</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'position Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $position->name,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
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

<!-- End Edit Position form -->

@stop