app.controller('pendingAppointmentCtrl' ,function ($scope, $http, CONFIG,toastr,uibDateParser) {
  console.log("HERE");
  $scope.format = 'yyyy/MM/dd';
  $scope.date = new Date();
  $scope.loading = false;
  
   $scope.getAppointments = function () {
    $scope.loading = true;
    var formData = $scope.formData;
       $http.post(CONFIG.APIURL + "user/registration/", $scope.patient)
            .then(function successCallback(response){
				console.log(response);                
                if(response.data === "true")
					toastr.success("Patient registerd Successfully");
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
      $scope.formData = {};
      $scope.reg_form.$setPristine();
    }

  });
  