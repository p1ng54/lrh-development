<?php $this->load->view('include/header-receptionist'); ?>
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
              <div class="input-group date" id="dob" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" ng-modal="patient.dob" data-target="#dob"/>
                <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>         
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
        <button type="button" class="btn btn-danger" ng-click="openModal()">Open Modal</button>
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
    <button ng-click="searchPatient()" class="btn btn-primary mb-3">Search</button>
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
   <div class="form-inline">
    <div class="form-group mb-2">
      <label class="mr-2">Appointment Date</label>
      <div class="input-group date" id="appointment" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" ng-modal="appointment.date" data-target="#appointment"/>
        <div class="input-group-append" data-target="#appointment" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
      <button ng-click="getAppointments()" class="btn btn-primary ml-2">Get Appointments</button>
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