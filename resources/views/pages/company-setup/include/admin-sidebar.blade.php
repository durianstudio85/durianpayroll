<div class="dp-sidebar">


<!-- **** ORGANIZATION **** -->

  <div class="side-menu-title">
    <i class="fa fa-dashboard"></i> &nbsp; ORGANIZATION
  </div>
      <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{ Url('company/setup') }}" >Company</a>        
            </div>
          </div>      
      </div>

        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{ Url('company/location&officess') }}" >Location and Offices</a>        
            </div>
          </div>      
      </div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
  </div>  

<!-- **** END ORGANIZATION **** -->






<!-- **** TIME **** -->

  <div class="side-menu-title">
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

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
      </div>



<!-- **** END TIME **** -->





<!--  **** PAYROLL **** -->

<div class="side-menu-title">
    <i class="fa fa-usd"></i> &nbsp; PAYROLL
  </div>
      <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/payroll-group')}}" >Payroll Group</a>        
            </div>
          </div>      
      </div>

       
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        
          <a data-toggle="collapse" data-parent="#accordion" href="#payslip"  aria-controls="payslip" class="collapsed">
            Payslip
            <i class="pull-right fa fa-caret-down"></i>
          </a>
        
      </div>      
      <div id="payslip" class="panel-collapse collapse" role="tabpanel">
        <div>
          <a href="{{Url('company/payslip-template-wizard')}}" class="list-group-item">Payslip Template Wizard</a>
          <a href="{{Url('company/settings')}}" class="list-group-item">Settings</a>
          
       </div>
      </div>
    </div>    
  </div>  
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab">
        
          <a data-toggle="collapse" data-parent="#accordion" href="#other-income"  aria-controls="other-income" class="collapsed">
            Other Income
            <i class="pull-right fa fa-caret-down"></i>
          </a>
        
      </div>      
      <div id="other-income" class="panel-collapse collapse" role="tabpanel">
        <div>
          <a href="{{Url('company/allowance-type')}}" class="list-group-item">Allowance Types</a>
          <a href="{{Url('company/bonus-type')}}" class="list-group-item">Bonus Types</a>
          <a href="{{Url('company/commission-type')}}" class="list-group-item">Commission Types</a>
       </div>
      </div>
    </div>    
  </div> 




  <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/loan-type')}}" >Loan Type</a>        
            </div>
          </div>      
  </div>
  <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/contributions')}}" >Contributions</a>        
            </div>
          </div>      
  </div>
  <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/deductions')}}" >Deductions</a>        
            </div>
          </div>      
  </div>
  <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/days/hours/rates')}}" >Day/Hours Rates</a>        
            </div>
          </div>      
  </div>
  <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/annualizations')}}" >Anualizations</a>        
            </div>
          </div>      
  </div>


<!--  **** END PAYROLL **** -->



<!-- **** EXPENSES **** -->

  <div class="side-menu-title">
    <i class="fa fa-money"></i> &nbsp; EXPENSES
  </div>
      <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/expenses-type')}}" >Expenses Type</a>        
            </div>
          </div>      
      </div>


 

<!-- **** EXPENSES **** -->



<!-- **** AUTOMATION **** -->

  <div class="side-menu-title">
    <i class="fa fa-dashboard"></i> &nbsp; AUTOMATION
  </div>
      <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">  
                <a href="{{Url('company/work-flows')}}" >Work Flows</a>        
            </div>
          </div>      
      </div>


 

<!-- **** AUTOMATION **** -->








 <br><br><br>

</div>