app.controller('registrationCtrl' ,function ($scope, $http, CONFIG,toastr,ModalService) {
  $scope.today = function() {
	  console.log("date");
    $scope.patient.dob = new Date();
  };
  $scope.patient = {};
  //$scope.patient.dob = new Date();
  $scope.today();

  $scope.clear = function() {
    $scope.dob = null;
  };

  $scope.inlineOptions = {
    customClass: getDayClass,
    minDate: new Date(),
    showWeeks: true
  };

  $scope.dateOptions = {
    //dateDisabled: disabled,
    formatYear: 'yy',
    maxDate: new Date(2030, 12, 31),
    minDate: new Date(),
    startingDay: 1
  };

  // Disable weekend selection
  function disabled(data) {
    var date = data.date,
      mode = data.mode;
    return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
  }

  $scope.opendate = function() {
    $scope.popup1.opened = true;
  };

 $scope.formats = ['dd-MMMM-yyyy', 'yyyy-MM-dd', 'dd.MM.yyyy', 'shortDate'];
  $scope.format = $scope.formats[1];
  $scope.altInputFormats = ['M!/d!/yyyy'];

  $scope.popup1 = {
    opened: false
  };

  function getDayClass(data) {
    var date = data.date,
      mode = data.mode;
    if (mode === 'day') {
      var dayToCheck = new Date(date).setHours(0,0,0,0);

      for (var i = 0; i < $scope.events.length; i++) {
        var currentDay = new Date($scope.events[i].date).setHours(0,0,0,0);

        if (dayToCheck === currentDay) {
          return $scope.events[i].status;
        }
      }
    }

    return '';
  }
  
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
    $scope.loading = true;
       $http.post(CONFIG.APIURL + "user/registration/", $scope.patient)
            .then(function successCallback(response){            
                if(response.data === "true"){
					toastr.success("Patient registerd Successfully");
					$scope.reset();
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
    }
  $scope.openModal = function(){
    ModalService.showModal({
      templateUrl: CONFIG.APIURL + "ng/views/partial/reg-date-timemodal.html",
      controller: "appointmentCtrl",
      preClose: (modal) => { modal.element.modal('hide'); }
    }).then(function(modal) {
      modal.element.modal();
      modal.close.then(function(result) {
        $scope.yesNoResult = result ? "You said Yes" : "You didn't say Yes";
      });
    });
  };
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
	$scope.today = function() {
		$scope.dt = new Date();
	};
	$scope.appointment = {};
	$scope.appointment.date = new Date();
	$scope.today();

	$scope.clear = function() {
		console.log("SDSD");
		$scope.dt = null;
	};

	$scope.inlineOptions = {
		customClass: getDayClass,
		minDate: new Date(),
		showWeeks: true
	};

	$scope.dateOptions = {
		//dateDisabled: disabled,
		formatYear: 'yy',
		maxDate: new Date(2030, 12, 31),
		minDate: new Date(),
		startingDay: 1
	};

	// Disable weekend selection
	function disabled(data) {
		var date = data.date,
		mode = data.mode;
		return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
	}

	$scope.opendate = function() {
		$scope.popup1.opened = true;
	};

	$scope.formats = ['dd-MMMM-yyyy', 'yyyy-MM-dd', 'dd.MM.yyyy', 'shortDate'];
	$scope.format = $scope.formats[1];
	$scope.altInputFormats = ['M!/d!/yyyy'];

	$scope.popup1 = {
		opened: false
	};

	function getDayClass(data) {
		var date = data.date,
		mode = data.mode;
		if (mode === 'day') {
		var dayToCheck = new Date(date).setHours(0,0,0,0);

		for (var i = 0; i < $scope.events.length; i++) {
        var currentDay = new Date($scope.events[i].date).setHours(0,0,0,0);

        if (dayToCheck === currentDay) {
          return $scope.events[i].status;
        }
      }
    }

    return '';
  }
  
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