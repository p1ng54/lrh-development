
<?php $this->load->view('include/header-doctor'); ?>
<div class="content mt-3 mb-4" ng-controller="drContoller">
  <div class="row">
    <div class="col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
            <div class="stat-content dib">
              <div class="stat-text">Today Appointments</div>
              <div class="stat-digit">12</div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
            <div class="stat-content dib">
              <div class="stat-text">Total Register Patient</div>
              <div class="stat-digit">22</div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-lg-4 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
            <div class="stat-content dib">
              <div class="stat-text">Happy Customers</div>
              <div class="stat-digit">100</div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <div class="row">
    <div class="col-sm-12">

      <div class="card">
        <div class="card-header">
          <h4>Today Appointments</h4>
        </div>
        <div class="card-body">  
          <table class="table border_t5 table-hover">
           <thead>
            <tr>
             <th width="10%">S.NO</th>
             <th width="30%">Name</th>
             <th width="20%">Phone Number</th>
             <th width="20%">Gender</th>
             <th width="20%">Appointment Time</th>
           </tr>
         </thead>
         <tbody>
          <tr>
            <td>1</td> 
            <td>Ali</td> 
            <td>0300</td> 
            <td>1: 00 pm</td> 
            <td class="position_relative"> 
            <button type="button" class="btn btn-sm btn-primary" ng-click="viewHistory()">View History</button>            
            <button type="button" class="btn btn-sm btn-success" ng-click="takeHistory()">Take History</button>
            </td>
          </tr>
           <tr>
            <td>2</td> 
            <td>Shahid</td> 
            <td>0300</td> 
            <td>1: 00 pm</td> 
            <td class="position_relative"> 
            <button type="button" class="btn btn-sm btn-primary" ng-click="viewHistory()">View History</button>            
            <button type="button" class="btn btn-sm btn-success" ng-click="takeHistory()">Take History</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

<!-- Right Panel -->
<?php $this->load->view('include/footer'); ?>