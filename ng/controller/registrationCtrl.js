app.controller('registrationCtrl' ,function ($scope, $http, CONFIG,toastr,ModalService) {
  $scope.takeAppointment = false;
  $scope.patient = {};
  $scope.loading = false;
  $scope.registerPatient = function () {
	if($scope.patient.fullName == '' || $scope.patient.fullName == null || $scope.patient.fullName == undefined){
		toastr.error("Error: Please provide Patient's Name");
		return;
	}
	if($scope.patient.relativeName == '' || $scope.patient.relativeName == null || $scope.patient.relativeName == undefined){
		toastr.error("Error: Please provide Patient's relative's name");
		return;
	}
	if($scope.patient.gender == '' || $scope.patient.gender == null || $scope.patient.gender == undefined){
		toastr.error("Error: Please provide Patient's gender");
		return;
	}
	if($scope.patient.phone == '' || $scope.patient.phone == null || $scope.patient.phone == undefined){
		toastr.error("Error: Please provide Patient's phone");
		return;
	}
	if($scope.patient.dob == '' || $scope.patient.dob == null || $scope.patient.dob == undefined){
		toastr.error("Error: Please provide Patient's Date of Birth");
		return;
	}
    $scope.loading = true;
       $http.post(CONFIG.APIURL + "user/registration/", $scope.patient)
            .then(function successCallback(response){
				if(!(response.data.search < 0)){
					toastr.success("Patient registerd Successfully");
					var id = response.data;
					id = id.split('=')[1];
					id = id.split('"')[0];
					$scope.id = id;
					$scope.takeAppointment = true;
				}	
				else if(response.data === "1"){
					toastr.error("Error: Patient Already Exists");
				}
				else
					toastr.error("Error: registeration failed");
				
            }, function errorCallback(response){
                
                 toastr.error("Error");
            });
     };
	 
     $scope.reset = function () {
      $scope.patient = {};
	  $scope.appointment = {};
	  $scope.takeAppointment = false;
    }
  // $scope.openModal = function(){
    // ModalService.showModal({
      // templateUrl: CONFIG.APIURL + "ng/views/partial/reg-date-timemodal.html",
      // controller: "setAppointmentCtrl",
	  // resolve: {
		  // parentScope : function(){
			// return $scope
		// }
	  // },
      // preClose: (modal) => { modal.element.modal('hide'); }
    // }).then(function(modal) {
      // modal.element.modal();
      // modal.close.then(function(result) {
        // $scope.yesNoResult = result ? "You said Yes" : "You didn't say Yes";
      // });
    // });
  // };
	$scope.confirmAppointment = function(){
		
		if($scope.appointment.dateTime == '' || $scope.appointment.dateTime == null || $scope.appointment.dateTime == undefined){
			toastr.error("Error: Please provide Appointment's Date and Time");
			return;
		}
		$scope.appointment.id = $scope.id;
		console.log($scope.appointment);
		$http.post(CONFIG.APIURL + "user/setAppointment/", $scope.appointment)
            .then(function successCallback(response){
					$scope.reset();
            }, function errorCallback(response){
                
                 toastr.error("Error", response.error);
            });
	}
  });
  
  app.controller('setAppointmentCtrl' ,function ($scope,parentScope, $http, CONFIG,toastr,uibDateParser) {
	console.log(parentScope);
	$scope.confirmAppointment = function(){
		
		if($scope.appointment.dateTime == '' || $scope.appointment.dateTime == null || $scope.appointment.dateTime == undefined){
			toastr.error("Error: Please provide Appointment's Date and Time");
			return;
		}
		console.log($scope.appointment);
		$http.post(CONFIG.APIURL + "user/setAppointment/", $scope.appointment)
            .then(function successCallback(response){ 
				$scope.patients = response.data;
            }, function errorCallback(response){
                
                 toastr.error("Error", response.error);
            });
	}
  });
  
  app.controller('searchCtrl' ,function ($scope, $http, CONFIG,toastr,uibDateParser) {
  $scope.loading = false;
	 
	$scope.searchPatient = function () {
    $scope.loading = true;
       $http.post(CONFIG.APIURL + "user/followUpPatientSearch/", $scope.followUpPatient)
            .then(function successCallback(response){ 
				$scope.patients = response.data;
            }, function errorCallback(response){
                
                 toastr.error("Error", response.error);
            });

     };
     $scope.reset = function () {
      $scope.formData = {};
      //$scope.reg_form.$setPristine();
    }
	
	$scope.deletePatient = function(patient){
		console.log(patient);
		$http.post(CONFIG.APIURL + "user/deletePatient/", patient)
            .then(function successCallback(response){ 
				console.log(response);
				$scope.patients = response.data;
				$scope.searchPatient();
            }, function errorCallback(response){
                
                 toastr.error("Error", response.error);
            });
	}
  });
  
  app.controller('appointmentCtrl' ,function ($scope, $http, CONFIG,toastr,uibDateParser) {
	$scope.appointment = {};
	
  $scope.loading = false;
	$scope.searchCriteria = {};
	$scope.getAppointments = function () {
		$scope.loading = true;
		$http.post(CONFIG.APIURL + "user/getAppointments/",$scope.appointment)
            .then(function successCallback(response){ 
				$scope.appointments = response.data;
            }, function errorCallback(response){
                
                 toastr.error("Error", response.error);
            });

     };
	 $scope.getAppointments();
     $scope.reset = function () {
      $scope.formData = {};
      $scope.reg_form.$setPristine();
    }

  });