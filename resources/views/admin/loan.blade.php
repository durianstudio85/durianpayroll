@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>
@if ( Option::getNavOption() == 'side' )
    <div class="dp-container">
@else
    <div class="container-fluid">
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid">
                <h1>Loans</h1>
            </div>
        </div>  
        @include('notification.flash')
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="dp-right full-width dp-text-right">
                    <button class="btn dp-primary-bg" data-toggle="modal" data-target="#addLoans">Add Loans</button>
                </div>              
                <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date Start</th>
                            <th>Amount</th>
                            <th>No. to pay</th>
                            <th>Amount per Pay</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $loans as $list )
                            <tr>
                                <td>{{ $list->employee->last_name }}, {{ $list->employee->first_name }} {{ $list->employee->middle_name }}</td>
                                <td>{{ date('l, F d, Y', strtotime($list->date_start)) }}</td>
                                <td>{{ number_format($list->total_payment, 2, '.', ',') }}</td>
                                <td>{{ $list->no_of_pay }}</td>
                                <td>{{ number_format($list->amount_per_pay, 2, '.', ',') }}</td>
                                <td>
                                    @if ($list->status == 1001)
                                        Pending
                                    @elseif( $list->status == 1002 )
                                        Approved
                                    @elseif( $list->status == 1003 )
                                        Canceled
                                    @else
                                        Paid
                                    @endif
                                </td>
                                <td>
                                    <a href="#editLoan" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#loan-{{ $list->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    @if ( $list->status == 1002 || $list->status >= 1004 )
                                        <a href="#viewLoan" style="color: #adacac;margin: 0px 5px;font-size: 15px;"  data-toggle="modal" data-target="#view-{{ $list->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach( $loans as $list )
    <div class="modal fade" id="loan-{{ $list->id }}" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                {!! Form::model($list, ['method'=>'patch', 'action'=>['LoanController@update', $list->id], 'files'=>'true', 'class' => 'form-horizontal']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Loan</h3>
                </div>
                <div class="modal-body">
                    <div style="padding: 0px 20px;">
                        <div class="form-group">
                            @php
                                $name = $list->employee->last_name.', '.$list->employee->first_name.' '.$list->employee->middle_name
                            @endphp
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::text('Name', $name,['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_start', 'Date Start', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::date('date_start', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('total_payment', 'Amount', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::number('total_payment', null,['step'=>'.01',  'class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('no_of_pay', 'No. of Pay', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::number('no_of_pay', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('amount_to_pay', 'Amount per Pay', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::number('amount_per_pay', null,['class'=>'form-control', 'placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']); !!}
                            <div class="col-sm-10">
                                {!! Form::select('status', ['1001' => 'Pending', '1002' => 'Approved', '1003' => 'Canceled'], null,['class'=>'form-control', 'placeholder'=>'Select', 'required']) !!}
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
@endforeach




@foreach ( $loans as $list )
        <div class="modal modal2 fade" id="view-{{ $list->id }}" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <h3 class="modal-title">Edit</h3>
                    </div>
                     <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                        <thead>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </thead>
                                        <tbody>
                                            @if ( !empty($list->loan_items ) )
                                                @foreach( $list->loan_items as $items )
                                                    <tr>
                                                        <td>{{ $items->date }}</td>
                                                        <td>{{ $items->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="2">No Data</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>    
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"  data-number="2">Close</button>
                      
                    </div>
                </div>
            </div>
        </div>
    @endforeach



@stop