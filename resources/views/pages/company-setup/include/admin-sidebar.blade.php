@if ( Option::getNavOption() == 'side' )
<div class="dp-sidebar">
  <div class="side-menu-title" style="background-color: #28384e;">
    <div class="dp-employee-primary">
      <center>
        <img src="{{ asset('images/profile.jpg') }}" class="dp-employee-primary-img">
        <div class="dp-employee-primary-circle">
        </div>
        <div>
          <h4>Eduardo Barette</h4>
          <p>Admin</p>
        </div>
      </center>
    </div>
  </div>

<!-- **** ORGANIZATION **** -->
      <div class="panel-group">
          <div class="panel panel-default {{{ ( Request::is('dashboard') ? 'active' : '') }}}" >
            <div class="panel-heading ">  
                <a href="{{ url('dashboard') }}"><span class="icon-sidebar"><i class="fa fa-dashboard btn-fa"></i></span>DASHBOARD</a>        
            </div>
          </div>      
      </div>
      <div class="panel-group">
          <div class="panel panel-default {{{ ( Request::is('employees') ? 'active' : '') }}}">
            <div class="panel-heading">  
                <a href="{{ Url('employees') }}"><span class="icon-sidebar"><i class="fa fa-user" aria-hidden="true"></i></span>EMPLOYEES</a>        
            </div>
          </div>      
      </div>

      <div class="panel-group">
        <div class="panel panel-default ">
          <div class="panel-heading">  
              <a href="#" data-toggle="modal" data-target="#addEmployee"><span class="icon-sidebar">&nbsp;&nbsp;&nbsp;</span>Add Employee</a>        
          </div>
        </div>      
      </div>

      <div class="panel-group">
          <div class="panel panel-default {{{ ( Request::is('payroll') ? 'active' : '') }}}">
            <div class="panel-heading">  
                <a href="{{ Url('payroll') }}"><span class="icon-sidebar"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>PAYROLL</a>        
            </div>
          </div>      
      </div>

      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">  
              <a href="#" data-toggle="modal" data-target="#createPayroll"><span class="icon-sidebar">&nbsp;&nbsp;&nbsp;</span>Create Payroll</a>        
          </div>
        </div>      
      </div>
      

      <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{ Url('company/setup/') }}"><span class="icon-sidebar"><i class="fa fa-cog" aria-hidden="true"></i></span>COMPANY SETTING</a>        
            </div>
          </div>      
      </div>
    <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
          <a data-toggle="collapse" data-parent="#accordion" href="#organizational"  aria-controls="organizational" class="collapsed">
            Organizational Structure
            <i class="pull-right fa fa-caret-down"></i>
          </a>
      </div>      
      <div id="organizational" class="panel-collapse collapse" role="tabpanel">
        <div>
          <a href="{{ Url('company/departments') }}" class="list-group-item">Departments</a>
          <a href="{{ Url('company/positions') }}" class="list-group-item">Positions</a>
          <a href="{{ Url('company/ranks') }}" class="list-group-item">Ranks</a>
          <a href="{{ Url('company/employment-type') }}" class="list-group-item">Employment Type</a>
       </div>
      </div>
    </div>    
  </div>   -->

<!-- **** END ORGANIZATION **** -->


<!-- **** TIME **** -->

  <!-- <div class="side-menu-title">
    <i class="fa fa-clock-o"></i> &nbsp; TIME
  </div>

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        
          <a data-toggle="collapse" data-parent="#accordion" href="#leaves"  aria-controls="leaves" class="collapsed">
            Leaves
            <i class="pull-right fa fa-caret-down"></i>
          </a>
        
      </div>      
      <div id="leaves" class="panel-collapse collapse" role="tabpanel">
        <div>
          <a href="{{ Url('company/leave-types') }}" class="list-group-item">Leave Types</a>
          <a href="{{ Url('company/leave-entitlement') }}" class="list-group-item">Leave Entitlement</a>
          
       </div>
      </div>
    </div>    
  </div>

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        
          <a data-toggle="collapse" data-parent="#accordion" href="#schedules"  aria-controls="schedules" class="collapsed">
            Schedules
            <i class="pull-right fa fa-caret-down"></i>
          </a>
        
      </div>      
      <div id="schedules" class="panel-collapse collapse" role="tabpanel">
        <div>
          <a href="{{ Url('company/work-days') }}" class="list-group-item">Work Days</a>
          <a href="{{ Url('company/shifts') }}" class="list-group-item">Shifts</a>
          <a href="{{ Url('company/shift/per-department') }}" class="list-group-item">Shift Per Department</a>
          <a href="{{ Url('company/tardiness-rules') }}" class="list-group-item">Tardiness Rules</a>
          
       </div>
      </div>
    </div>    
  </div>
 -->
<!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        
          <a data-toggle="collapse" data-parent="#accordion" href="#time-entry"  aria-controls="time-entry" class="collapsed">Time Entry<i class="pull-right fa fa-caret-down"></i></a>
        
      </div>      
      <div id="time-entry" class="panel-collapse collapse" role="tabpanel">
        <div>
          <a href="{{ Url('company/methods') }}" class="list-group-item">Methods</a>
          <a href="{{ Url('company/restrictions') }}" class="list-group-item">Restrictions</a>
          <a href="{{ Url('company/assign-restrictions') }}" class="list-group-item">Assign Restrictions</a>
          
       </div>
      </div>
    </div>    
  </div>

  <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{ Url('company/holiday') }}" >Holiday</a>        
            </div>
          </div>      
      </div>

        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{ Url('company/night-shifts') }}" >Night Shifts</a>        
            </div>
          </div>      
      </div> -->



<!-- **** END TIME **** -->
 <br><br><br>

</div>

@endif