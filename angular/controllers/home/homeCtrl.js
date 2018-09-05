app.controller("homeCtrl", function($http,$rootScope,$scope,$location,$timeout,$routeParams,getData,senddataPost,sendPostjson) {
  $rootScope.authtemplate=false; 

// $rootScope.$on('cfpLoadingBar:loading', function (event, data) {
//     var elm = document.getElementsByClassName("custom-loading");
//    var customLoading = angular.element(elm);
//    customLoading.show();
//   });

//    $rootScope.$on('cfpLoadingBar:loaded', function (event, data) {
//     var elm = document.getElementsByClassName("custom-loading");
//    var customLoading = angular.element(elm);
//    customLoading.hide();
//   });

  var user_deatils =  localStorage.getItem("userData") ;
        var user_role = localStorage.getItem("userRole") ;
      
 if(user_deatils != null && $location.path() == "/" ){
         var x = JSON.parse(user_deatils);
         if(user_role == 'recruiter'){
          $location.path('/recruiter/home/'+x.jwt_token)
         }
         if(user_role == 'seeker'){
          $location.path('/user/home/'+x.jwt_token)
         }
         // 
      }

$scope.$watch('active_jobsArray', function( value ) {

});
  $scope.itemsPerPage = 7;
  $scope.currentPage = 0;
  $scope.active_jobsArray = [];
  $scope.flag = true;
  $scope.lang = "eng";

 
   $scope.range = function() {
    var rangeSize = 5;
    var ret = [];
    var start;

    start = $scope.currentPage;
    if ( start > $scope.pageCount()-rangeSize ) {
      start = $scope.pageCount()-rangeSize+1;
    }

    for (var i=start; i<start+rangeSize; i++) {
      ret.push(i);
    }
    return ret;
  };

  $scope.prevPage = function() {
    if ($scope.currentPage > 0) {
      $scope.currentPage--;
    }
  };

  $scope.prevPageDisabled = function() {
    return $scope.currentPage === 0 ? "disabled" : "";
  };

  $scope.pageCount = function() {

    return Math.ceil($scope.active_jobsArray.length/$scope.itemsPerPage)-1;
  };

  $scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
      $scope.currentPage++;
    }
  };

  $scope.nextPageDisabled = function() {
    return $scope.currentPage === $scope.pageCount() ? "disabled" : "";
  };

  $scope.setPage = function(n) {
    $scope.currentPage = n;
  };

	var data = {};
    $http.defaults.headers.post["Content-Type"] = "application/json";
	$scope.general_info= getData.dataFromServer(data,base_url + 'general');
    $scope.general_info.then(function(response){
    	$scope.general_info = response.data.data;
    	$rootScope.general_info = response.data.data;
    });
if(typeof $scope.keyword == 'undefined'){
      $scope.keyword = '';
    }
  var postdata = {"value":$scope.keyword,"seeker_id":"guest","job_location":[],"specialization":[],"qualification":[],"job_by_roles":[],"area_of_sector":[],"experience":[],"job_type":[]};
   
    $scope.active_jobs= sendPostjson.sendjson(postdata,base_url + 'search-job');
    $scope.active_jobs.then(function(response){

      angular.forEach(response.data.data, function(value, key) {
            $scope.active_jobsArray.push(value);
        });
    	$scope.loadingIsDone = true;
    }); 

$scope.locationArray = [];
 $scope.jobtypeArray = [];  
 $scope.designationArray = [];  
 $scope.qualificationArray = [];  
 $scope.experienceArray = [];  
 $scope.preferencesArray = [];  
    
    $scope.searchFilterJobs = function(){
       var elm = document.getElementsByClassName("custom-loading");
   var customLoading = angular.element(elm);
   customLoading.show();
  $scope.active_jobsArray = [];
    if(typeof $scope.keyword == 'undefined'){
      $scope.keyword = '';
    }
  $timeout(function(){
      var postdata = {"value":$scope.keyword,"seeker_id":'guest',"job_location":$scope.locationArray,"specialization":[],"qualification":$scope.qualificationArray,"job_by_roles":$scope.designationArray,"area_of_sector":[],"experience": $scope.experienceArray,"job_type":$scope.jobtypeArray};
    $scope.temp_active_jobs= sendPostjson.sendjson(postdata,base_url + 'search-job');
    $scope.temp_active_jobs.then(function(response){
       var elm = document.getElementsByClassName("custom-loading");
   var customLoading = angular.element(elm);
   customLoading.hide();
       if(response.data.code == 200){
      angular.forEach(response.data.data, function(value, key) {
            $scope.active_jobsArray.push(value);
    
        });
        $scope.nojobs = false;
      $scope.loadingIsDone = true;
  }
else{
     $scope.nojobs = true;
      $scope.loadingIsDone = false;
}
    });
        });
    

    }


    $scope.searchJob = function(){ 
   var elm = document.getElementsByClassName("custom-loading");
   var customLoading = angular.element(elm);
   customLoading.show();
  $scope.active_jobsArray = [];
  var postdata = {"value":$scope.keyword,"seeker_id":'guest',"job_location":$scope.locationArray,"specialization":[],"qualification":$scope.qualificationArray,"job_by_roles":$scope.designationArray,"area_of_sector":[],"experience": $scope.experienceArray,"job_type":$scope.jobtypeArray};
    // var postdata = {"value":$scope.keyword,"seeker_id":"guest","job_location":[],"specialization":[],"qualification":[],"job_by_roles":[],"area_of_sector":[],"experience":[],"job_type":[]};
    $scope.temp_active_jobs= sendPostjson.sendjson(postdata,base_url + 'search-job');
    $scope.temp_active_jobs.then(function(response){
       var elm = document.getElementsByClassName("custom-loading");
   var customLoading = angular.element(elm);
   customLoading.hide();
  if(response.data.code == 200){
      angular.forEach(response.data.data, function(value, key) {
            $scope.active_jobsArray.push(value);
    
        });
      $scope.nojobs = false;
      $scope.loadingIsDone = true;
  }
else{
  $scope.nojobs = true;
      $scope.loadingIsDone = false;
}
    });
   }
});