@extends('header_footer')

@section('content')
<br/><br/><br/>
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4 dp-margin-top">
        <div class="dp-employee-summary dp-border dp-board">
        <div class="dp-margin">
          <p class="dp-default">EMPLOYEE SUMMARY 
            <i class="dp-right pe-7s-note2 pe-2x"></i>
          </p>
          <p class="dp-default  dp-border-bottom">Employee <b class="dp-primary dp-right">10</b></p>
          <p class="dp-default  dp-border-bottom">Employee Absent<b class="dp-primary dp-right">6</b></p>
          <p class="dp-default ">Employee Leave<b class="dp-primary dp-right">0</b></p>

        </div>
        
        <div class="dp-board-bottom">
          <p>Lorem ipsum dolor sit amet.</p>
        </div>
        </div>
      </div>

      <div class="col-md-4 dp-margin-top">
        <div class="dp-employee-clockin dp-border dp-board">
        <div class="dp-margin">
          <p class="dp-default">EMPLOYEE CLOCK IN   
          <i class="dp-right pe-7s-user pe-2x"></i>
          </p>

          <div class="board-line-height">
              <h2 class="dp-primary">11</h2>
              <p>Employees Clocked In</p>
              <div class="board-progress-container">
                <p class="board-progress-bar" style="width:70%;"></p>
              </div>
              <p>Not yet Clocked In:<b> 3 Employees</b></p>
            </div>
          
        </div>
        <div class="dp-board-bottom">
          <p>You are clocked in at: 21.05.2015  |  09:03 AM</p>
        </div>
        </div>
      </div>

      <div class="col-md-4 dp-margin-top">
        <div class="dp-border dp-board">
        <div class="dp-employee-event dp-margin">
          <p class="dp-default">TODAY EVENT

          <i class="dp-right pe-7s-date pe-2x"></i>
          <a href="#" class="dp-right dp-primary dp-link-view">View Calendar</a>
          </p>
          <div class="dp-event dp-border-bottom">
            <h2 class="dp-primary">No Holiday</h2>
              <p><b>Saturday May 21, 2016</b><p>
              <p>Next Holiday Schedule: <span class="dp-primary"> June 30, 2016</span></p>
            </div>
              <div class="dp-announcement dp-default">
              <span>ANNOUNCEMENTS</span> <a href="#" class="dp-right dp-primary dp-link-view">View</a><br>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum.</span>
              </div>
        </div>
        </div>
      </div>
      
      <div class="col-md-8 dp-margin-top">
        <div class="dp-employee-payroll  dp-border dp-board">
        <div class="dp-margin">
          <p class="dp-default">PAYROLL GENERATION (December)
          <i class="dp-right pe-7s-graph3 pe-2x"></i>
          </p><br>
          
              <canvas id="lineChart" width="600" height="400"></canvas>
        
             <script language="JavaScript"><!--
              function displayLineChart() {
                var data = {
                    labels: [1, 2, 3, 4, 5, 6, 7],
                    datasets: [
                       
                        {
                            label: "Gender dataset",
                            fillColor: "rgba(44,184,178,0.5)",
                            strokeColor: "rgba(33,181,175,1)",
                            pointColor: "rgba(33,181,175,1)",
                            pointStrokeColor: "#27b6b1",
                            pointHighlightFill: "#27b6b1",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [10, 25, 15, 25, 15, 5, 105 ]
                        }
                    ]
                };
                var ctx = document.getElementById("lineChart").getContext("2d");
                var options = { };
                var lineChart = new Chart(ctx).Line(data, options);
              }
              --></script>
              
              <div class="dp-right dp-payroll-total">
                <h4>&#8369;226,802</h4>
                <span class="dp-default">JULY 2016</span>
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

      <div class="col-md-4 dp-margin-top">
        <div class="dp-border dp-board">
        <div class="dp-employee-announcement dp-margin">
          <p class="dp-default">ANNOUNCEMENT
            <i class="dp-right pe-7s-speaker pe-2x"></i>
          </p>
          <div class="dp-border-bottom dp-anouncement-detail">
            <p><span class="dp-primary">Promotion & Salary Change</span><br>
            Employee pay is not within selected pay grade office grade 1.</p>
            </div>
            <div class="dp-border-bottom dp-anouncement-detail">
            <p class="dp-primary"><span class="dp-primary">Monthly Meeting</span><br>
            Employee pay is not within selected pay grade office grade 1.
            </p>
            <!-- <div style="text-align:right; margin-top: -35px;">
            <p><a href="#" class="dp-btn-anouncement">+</a></p>
            </div> -->

            </div>
            <p style="text-align:right;"><a href="#" class="dp-btn-anouncement">+</a></p>


        </div>
        </div>

        <br>
        <div class="dp-employee-board dp-border dp-board dp-margin-top dp-margin-bottom">
          <div class="dp-margin">
            <p class="dp-default">EMPLOYEE GENDER ANALYSIS
            <i class="dp-right pe-7s-graph1 pe-2x"></i>
            </p>
            <canvas id="gender" width="120" height="120"></canvas>
            <script>
              var pieData = [
               {
                  value: 30,
                  label: 'Female',
                  color: '#28384e'
               },
               {
                  value: 20,
                  label: 'Male',
                  color: '#1fb4ae'
               }
              
            ];
            var context = document.getElementById('gender').getContext('2d');
            var genderChart = new Chart(context).Pie(pieData);
            </script>
            <div class="dp-right dp-gender-label">
              <i class="dp-gender-male"></i><label> Male 40%</label><br>
              <i class="dp-gender-female"></i><label> Female 50%</label>
            </div>
          </div>
          
          
        <div class="dp-board-bottom">
          <p>Additional information panel footer</p>
        </div>
        </div>

      </div>
    </div>
  </div>
</div>
@stop