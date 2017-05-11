@extends('header_footer')
@section('content')
@include('pages.company-setup.include.admin-sidebar')

<br><br></br>

<div class="dp-container">
	<div class="row">
		<div class="col-md-12">
			<h1>Dashboard</h1>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-9 col-sm-12 dp-margin-top">
        	<div class="dp-employee-payroll  dp-border dp-board">
        		<div class="dp-margin">
          			<p class="dp-default">PAYROLL GENERATION (December)
          			<i class="dp-right pe-7s-graph3 pe-2x"></i>
          			</p><br>
		            <canvas id="lineChart" width="800px" height="200"></canvas>
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
		<div class="col-md-3 col-sm-12 dp-margin-top">
	        <div class="dp-employee-summary dp-border dp-board">
		        <div class="dp-margin">
			        <p class="dp-default">SUMMARY 
			            <i class="dp-right pe-7s-note2 pe-2x"></i>
			        </p>
			        <p class="dp-default  dp-border-bottom">Total Payroll <b class="dp-primary dp-right">{{ $summaryPayrollCount }}</b></p>
			        <p class="dp-default  dp-border-bottom">Total Employees<b class="dp-primary dp-right">{{ $summaryEmployeeCount }}</b></p>
			        <p class="dp-default ">Total Holidays<b class="dp-primary dp-right">0</b></p>

		        </div>
		        <div class="dp-board-bottom">
		          <p>From: May 21, 2016 - To: May 27,2017</p>
		        </div>
	        </div>
      	</div>

      	<div class="col-md-9 col-sm-12 dp-margin-top">
	        <div class="dp-employee-summary dp-border dp-board">
		        <div class="dp-margin">
			        <p class="dp-default">RECENT EMPLOYEE ADDED
		            	<i class="dp-right pe-7s-user pe-2x"></i>
		          	</p>
		          	<div class="table-responsive">
			          	<table class="table">
			          		@foreach ( $recentEmployee as $employeeList )
				          		<tr>
				          			<td width="20px">
				          				<i class="pe-7s-user pe-3x"></i>
				          			</td>
				          			<td><p>{{ $employeeList->first_name.' '.$employeeList->last_name }}</p></td>
				          			<td><p>{{ Option::optionDetails($employeeList->position)->name }}</p></td>
				          			<td><p>{{ ucfirst($employeeList->gender) }}</p></td>
				          			<td><p>Single</p></td>
				          		</tr>
			          		@endforeach
			          	</table>
		          	</div>
		        </div>
		        <div class="dp-board-bottom">
		          <p>Last update: {{ date('l, F d, Y', strtotime($lastEmployeeUpdate->updated_at)) }}</p>
		        </div>
	        </div>
      	</div>

      	<div class="col-md-3 col-sm-12  dp-margin-top">
      		<div class="dp-employee-board dp-border dp-board dp-margin-bottom">
	          	<div class="dp-margin">
	            	<p class="dp-default">EMPLOYEE GENDER ANALYSIS
	            		<i class="dp-right pe-7s-graph1 pe-2x"></i>
	            	</p>
	            	<canvas id="gender" width="215" height="215"></canvas>
	            	<script>
	              		var pieData = [
	               			{
	                  			value: {{ $countFemale }},
	                  			label: 'Female',
	                  			color: '#28384e'
	               			},
	               			{
	                  			value: {{ $countMale }},
	                  			label: 'Male',
	                  			color: '#1fb4ae'
	               			}
	              
			            ];
	    		        var context = document.getElementById('gender').getContext('2d');
	            		var genderChart = new Chart(context).Pie(pieData);
	            	</script>
	            	<div class="dp-right dp-gender-label">
	              		<i class="dp-gender-male"></i><label> Male {{ $percentMale }}% </label><br>
	              		<i class="dp-gender-female"></i><label> Female {{ $percentFemale }}% </label>
	            	</div>
	            	
	          	</div>
	          	<div class="dp-board-bottom">
	          		<p>Additional information panel footer</p>
	        	</div>
	         </div>
      	</div>

      	<div class="col-md-12 col-sm-12 dp-margin-top">
	        
      	</div>
	</div>
</div>

@stop