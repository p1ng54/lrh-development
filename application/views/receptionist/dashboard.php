<?php 
$user = $this->session->userdata('user');
extract($user);
?>
<!doctype html>
<html class="no-js" lang="" ng-app="hospitalApp" ng-controller="mainController"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lady Reading Hospital</title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view('include/meta'); ?>


</head>
<body>
 <!--<?php //$this->load->view('include/left-panel'); ?>

  Right Panel -->

 <div id="right-panel" class="right-panel">
  <?php $this->load->view('include/header'); ?>
  <div class="content mt-3 mb-4">
    <div class="col-sm-12">                
      <uib-tabset class="white_tabset" active="activeJustified" justified="true">
        <uib-tab index="0" heading="New Patient Registration">
          <div ng-controller="registrationCtrl">
          <form>
           <div class="form-row">
             <div class="form-group col-md-12">
               <h4 class="border-bottom pb-2">Patient personal details</h4>
             </div>
           </div>
           <div class="form-row">
            <div class="form-group col-md-6">
              <label>Full Name</label>
              <input type="text" class="form-control" ng-model="patient.fullName" >
            </div>
            <div class="form-group col-md-6">
              <label>Spouse/Parent's Name</label>
              <input type="text" class="form-control" ng-model="patient.relativeName">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Gender</label>
              <select class="form-control" ng-model="patient.gender" >
                <option value="" selected>Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Phone Number</label>
              <input type="text" class="form-control" ng-model="patient.phone" >
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Weight(in Kg)</label>
              <input type="text" class="form-control" ng-model="patient.weight">
            </div>
            <div class="form-group col-md-6">
              <label>Height</label>
              <input type="text" class="form-control" ng-model="patient.height" >
            </div>
          </div>
		  <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date of Birth</label>
			  <input type="text" class="form-control" uib-datepicker-popup="{{format}}" ng-model="patient.dob" ng-click="opendate()"
			  is-open="popup1.opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
			
            </div>
           <!-- <div class="form-group col-md-6">
              <label>Email Address</label>
              <input type="email" class="form-control" ng-model="patient.email" >
            </div> -->
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" ng-model="patient.address" >
          </div>
          <!--<div class="form-row">
           <div class="form-group col-md-12">
             <h4 class="border-bottom pb-2">Patient medical details</h4>
           </div>
         </div>
         <div class="form-row">
          <div class="form-group col-md-6">
            <label>Diagnosis</label>
            <select class="form-control" ng-model="formData.diagnosis" >
              <option value="" selected>Select</option>
              <option value="ra">Rheumatiod arthritis</option>
              <option value="ost">Osteoarthirites</option>
              <option value="pa">Osoriatic arthritis</option>
              <option value="sle">SLE</option>
              <option value="cnnective">Connective tissue disease</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Any other Diagnosis</label>
            <input type="text" class="form-control" ng-model="formData.otherDiagnosis" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Previous medication</label>
            <select class="form-control" ng-model="formData.preMedication">
              <option value="" selected>Select</option>
              <option value="steroids">Steroids</option>
              <option value="nsaids">NASAIDs</option>
              <option value="methotrexate">Methotrexate</option>
              <option value="sulfasalazine">Sulfasalazine</option>
              <option value="leflunomide">Leflunomide</option>
              <option value="azathioprine">Azathioprine</option>
              <option value="etanercept">Etanercept</option>
              <option value="adalimumad">Adalimumab</option>                                  
              <option value="rituximad">Rituximad</option>                                  
              <option value="tocilizumad">Ticilizumad</option>                                                                                                            
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Previous any other medication</label>
            <input type="text" class="form-control" ng-model="formData.otherPreMedication" >
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
        <button ng-click="registerPatient()" class="btn btn-primary">Register Patient</button>
      </form>
      </div>
    </uib-tab>
    <uib-tab index="2" heading="Follow-Up Patient">
	<div ng-controller="searchCtrl">
		<form>
			<div class="form-row">
            <div class="form-group col-md-6">
              <label>Full Name</label>
              <input type="text" class="form-control" ng-model="followUpPatient.fullName" >
            </div>
            <div class="form-group col-md-6">
              <label>Phone Number</label>
              <input type="text" class="form-control" ng-model="followUpPatient.phoneNumber">
            </div>
			</div>
			<button ng-click="searchPatient()" class="btn btn-primary">Search</button>
         </form>
		<table class="table border_t5 table-hover" ng-if="patients.length >0">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Gender</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="patient in patients">
					 <td>{{patient.id}}</td> 
					 <td>{{patient.full_name}}</td> 
					 <td>{{patient.phone}}</td> 
					 <td>{{patient.gender}}</td> 
					 <td><button type="button" class="btn btn-danger btn-sm" ng-click="deletePatient(patient)">Delete</button></td>
				</tr>
			</tbody>
		</table>
	</div>
	</uib-tab>
 <uib-tab index="3" heading="Requested Appointment">
 <div ng-controller="appointmentCtrl">
 <div class="form-row">
            <div class="form-group col-md-6">
              <label>Appointment Date</label>
			  <input type="text" class="form-control" uib-datepicker-popup="{{format}}" ng-model="appointment.date" ng-click="opendate()"
			  is-open="popup1.opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
			
            </div>
           <div class="form-group col-md-6">
              <button ng-click="getAppointments()" class="btn btn-primary">Get Appointments</button>
            </div>
          </div>
     <table class="table border_t5 table-hover">
      <thead>
        <tr>
         <th>Patient ID</th>
         <th>Name</th>
         <th>Relative's Name</th>
         <th>Gender</th>
         <th>Appointment Date</th>
         <th>Appointment Time</th>
       </tr>
     </thead>
	 <tbody>
		 <tr ng-repeat="appointment in appointments">
			 <td>{{appointment.id}}</td> 
			 <td>{{appointment.full_name}}</td> 
			 <td>{{appointment.relative_name}}</td> 
			 <td>{{appointment.gender}}</td> 
			 <td>{{appointment.appointment_date}}</td> 
			 <td>{{appointment.appointment_time}}</td> 
			<!--<td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>-->
		 </tr>
	 </tbody>
   </table>
   </div>
 </uib-tab>
</uib-tabset>

</div>

</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php $this->load->view('include/footer'); ?>