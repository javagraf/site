app.controller("jobappliedCtrl", function($routeParams,$rootScope,$scope,$location,$timeout,getData,senddataPost,sendPostjson) {

 $rootScope.authtemplate=false; 
$rootScope.$on('cfpLoadingBar:loading', function (event, data) {
    var elm = document.getElementsByClassName("custom-loading");
   var customLoading = angular.element(elm);
   customLoading.show();
  });

   $rootScope.$on('cfpLoadingBar:loaded', function (event, data) {
    var elm = document.getElementsByClassName("custom-loading");
   var customLoading = angular.element(elm);
   customLoading.hide();
  });
  if(localStorage.userData){
    
  var user_deatils=JSON.parse(localStorage.userData);


$scope.specializationhead = $routeParams.specialization;
$scope.job = $routeParams.job_id
var postdata = $.param({
        'recruiter_id': user_deatils.id,
        'job_id': $routeParams.job_id,
    })

	$scope.applieduserpost= senddataPost.senddata(postdata,base_url + 'job-application');
    $scope.applieduserpost.then(function(response){
    	$scope.noapplieduser = response.data.data;
    	
    });

$scope.getSeekerDetail = function(seeker,job){
var postdata = $.param({
        'seeker_id': seeker,
        'job_id':job,
    })

  $scope.seekjobpost= senddataPost.senddata(postdata,base_url + 'seeker-profile-detail-on-job');
    $scope.seekjobpost.then(function(response){
      $scope.seekerdetail = response.data.data;
         $('body').addClass('popup_open');
      
    });
}
  
}
else
{
    $location.path('/login');
}


});