@extends('employee.include.header')
@section('content')
<br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<h1>Dashboard</h1>
			</div>
		</div>	
		@include('notification.flash')
	</div>
	<div class="row">
		<div class="col-lg-9 col-md-8 col-sm-12">
            <div class="row">
                <div class="col-md-12 dp-margin-top">
                    <div class="dp-employee-payroll  dp-border dp-board">
                        <div class="dp-margin">
                            <p class="dp-default">ANNOUNCEMENT
                            <i class="dp-right pe-7s-speaker pe-2x"></i>
                            </p><br>
                            <!-- Width = 800px -->
                            <canvas id="lineChart" height="200"></canvas>
                            <script language="JavaScript"><!--
                                function displayLineChart() {
                                    var data = {
                                        labels: [2016, 2017, 2018, 2019, 2020, 2021, 2022],
                                        datasets: [
                                            {
                                                label: "Gender dataset",
                                                fillColor: "rgba(44,184,178,0.5)",
                                                strokeColor: "rgba(33,181,175,1)",
                                                pointColor: "rgba(33,181,175,1)",
                                                pointStrokeColor: "#27b6b1",
                                                pointHighlightFill: "#27b6b1",
                                                pointHighlightStroke: "rgba(151,187,205,1)",
                                                data: [226802, 226502, 226202, 226902, 228802, 226802, 226702]
                                            }
                                        ]
                                    };
                                    var ctx = document.getElementById("lineChart").getContext("2d");
                                    var options = { };
                                    var lineChart = new Chart(ctx).Line(data, options);
                                }
                            </script>
                            <div class="dp-right dp-payroll-total">
                                <h4>&#8369;226,802</h4>
                                <span class="dp-default">{{ date('F Y', strtotime('2017-4-5 05:06:01')) }}</span>
                                <br><br><br><br>
                                <h4>&#8369;226,802</h4>
                                <span class="dp-default">AUGUST 2016</span>
                                <br><br><br><br>
                                <h4>&#8369;226,802</h4>
                                <span class="dp-default">2016</span>
                            </div>
                        </div>
                        <div class="dp-board-bottom">
                            <p>Last update: 21/05/2015</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 dp-margin-top dp-margin-down">
                    <div class="dp-employee-summary dp-border dp-board">
                        <div class="dp-margin">
                            <p class="dp-default">APPROVALS
                                <i class="dp-right pe-7s-note2 pe-2x"></i>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                    <!-- Nav tabs --><div class="card">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#timesheet" aria-controls="timesheet" role="tab" data-toggle="tab">Timesheet</a></li>
                                            <li role="presentation"><a href="#leave" aria-controls="leave" role="tab" data-toggle="tab">Leave</a></li>
                                            <li role="presentation"><a href="#expense" aria-controls="expense" role="tab" data-toggle="tab">Expense</a></li>
                                            <li role="presentation"><a href="#loans" aria-controls="loans" role="tab" data-toggle="tab">Loans</a></li>
                                            <li role="presentation"><a href="#overtime" aria-controls="overtime" role="tab" data-toggle="tab">Overtime</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="timesheet">Timesheet</div>
                                            <div role="tabpanel" class="tab-pane" id="leave">Leave</div>
                                            <div role="tabpanel" class="tab-pane" id="expense">Expense</div>
                                            <div role="tabpanel" class="tab-pane" id="loans">Loans</div>
                                            <div role="tabpanel" class="tab-pane" id="overtime">Overtime</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dp-board-bottom">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-6 dp-margin-top">
                    <div class="dp-employee-summary dp-border dp-board">
                        <div class="dp-margin">
                            <p class="dp-default">TIMER
                                <i class="dp-right pe-7s-clock pe-2x"></i>
                            </p>
                            <div class="clock-bg">
                                <div id="timestamp"></div>
                            </div>
                            @if ( $time == 'timein')
                                {!! Form::open(['url'=>'employee/timein']) !!}
                                    <button type="submit" class="btn dp-primary-bg clock-btn"><i class="fa fa-sign-in fa-btn" aria-hidden="true"></i> TIME IN</button>
                                {!! Form::close() !!}    
                            @else
                                {!! Form::model($time, ['method'=>'patch', 'action'=>['Employee\DashboardController@timeOut', $time->id]]) !!}
                                    <button type="submit" class="btn dp-primary-bg clock-btn"><i class="fa fa-sign-out fa-btn" aria-hidden="true"></i> TIME OUT</button>
                                {!! Form::close() !!}                                
                            @endif
                            
                            <p style="color: #687583; text-align: center;padding: 0px 21px;">Clock Out on Mon, Jan 18, 2016 @ 06:00pm</p>
                            <a href="{{ url('employee/attendance') }}" class="btn dp-primary-bg" style="width: 100%;">View Timer Records</a>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-12 col-sm-6 dp-margin-top">
                    <div class="dp-employee-board dp-border dp-board dp-margin-bottom">
                        <div class="dp-margin">
                            <p class="dp-default">EVENTS
                                <i class="dp-right pe-7s-date pe-2x"></i>
                            </p>
                        </div>
                        <div class="dp-board-bottom">
                            <p>Additional information panel footer</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
	</div>
</div>
@stop

