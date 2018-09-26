app.controller('drContoller' ,function ($scope, $http, CONFIG,toastr,ModalService) {
  console.log("HERE");
  $scope.format = 'yyyy/MM/dd';
  $scope.date = new Date();
  $scope.loading = false;
  
   /*$scope.getAppointments = function () {
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

     };*/
	 
/*     $scope.reset = function () {
      $scope.formData = {};
      $scope.reg_form.$setPristine();
    }*/
     $scope.takeHistory = function(){
     console.log("kfdk");
       ModalService.showModal({
       templateUrl: CONFIG.APIURL + "ng/views/partial/take-historymodal.html",
       controller: "closeContoller",
       bodyClass: "lg-modal",

     resolve: {
       parentScope : function(){
       return $scope
     }
     },
       preClose: (modal) => { modal.element.modal('hide'); }
      }).then(function(modal) {
       modal.element.modal();
       modal.close.then(function(result) {
         $scope.yesNoResult = result ? "You said Yes" : "You didn't say Yes";
       });
    });
  };

  });
app.controller('closeContoller' ,function ($scope, $http, CONFIG,toastr,ModalService) {
  });

  