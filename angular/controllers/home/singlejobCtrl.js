app.controller("singlejobCtrl", function($window,$rootScope,$scope,$location,$routeParams,getData,senddataPost) {
  $rootScope.authtemplate=false; 
	var data = {};
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
    var postdata = $.param({
        'job_id': $routeParams.job_id,
        'seeker_id': 'guest',
    })
    $scope.single_job= senddataPost.senddata(postdata,base_url + 'single-job-detail');
    $scope.single_job.then(function(response){
    	$scope.single_job = response.data.data;
      
    });   

     $scope.redirectToCompany = function(target){
             $window.open('http://'+target, '_blank');
        };
});