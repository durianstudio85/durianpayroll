@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')
<br><br></br>
<div class="dp-nav-tab">
  <ul class="nav nav-tabs">
    <li><a  href="{{ Url('company/departments') }}">Departments</a></li>
    <li><a  href="{{ Url('company/positions') }}">Positions</a></li>
    <li class="active"><a  href="{{ Url('company/ranks') }}">Ranks</a></li>
    <li><a  href="{{ Url('company/employment-type') }}">Employment Type</a></li>
  </ul>
</div>


<div class="dp-container">
	<p>Specify employment types applicable to your company. We have created couple of standard types for your convenience.</p><br>
	<div class="dp-right full-width dp-text-right">
		<button class="btn dp-primary-bg" data-toggle="modal" data-target="#Add-Rank">Add Rank</button>
	</div>
	<table width="100%" class="table table-striped table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Rank Name</th>
                <th>Rank Description</th>
                <th>Created By</th>
                <th>Created Date</th>
                <th>Updated By</th>
                <th>Updated Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $rank_list as $rank)
                <tr class="odd gradeX" data-toggle="modal" data-target="#Edit-rank{{ $rank->id }}">
                    <td> {{ $rank->name }}</td>
                    <td> {{ $rank->description }}</td>
                    <td>{{ Auth::User($rank->user_id)->first_name }} {{ Auth::User($rank->user_id)->last_name }}</td>
                    <td>{{ $rank->created_at }}</td>
                    <td>
                        @if( $rank->update_user_id > 0 )
                            {{ Auth::User($rank->update_user_id)->first_name }} {{ Auth::User($rank->update_user_id)->last_name }}
                        @endif
                    </td>
                    <td>
                        @if( $rank->created_at != $rank->updated_at )
                            {{ $rank->updated_at }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
	</table>
</div>


<!-- ADD Rank FORM-->

 <div class="modal fade" id="Add-Rank" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        {!! Form::open(['url'=>'company/ranks', 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Add Rank</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Rank Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Rank Description', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('description', null,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
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

<!-- END ADD rank FORM -->


<!-- EDIT Rank form -->
@foreach ( $rank_list as $rank)
<div class="modal fade" id="Edit-rank{{ $rank->id }}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        {!! Form::model($rank, ['method'=>'patch', 'action'=>['OptionController@rankUpdate', $rank->id], 'class' => 'form-horizontal']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit rank</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'rank Name', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $rank->name,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Rank Description', ['class' => 'control-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('description', $rank->description,['class'=>'form-control', 'placeholder'=>'', 'require']) !!}
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
<!-- End EDIT Rank form -->


@stop