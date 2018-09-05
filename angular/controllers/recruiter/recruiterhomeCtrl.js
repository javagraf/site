app.controller("recruiterhomeCtrl", function($route,$rootScope,$scope,$location,$timeout,getData,senddataPost,sendPostjson) {

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

$scope.$watch('myjobsArray', function( value ) {
   
});

 $scope.itemsPerPage = 5;
  $scope.currentPage = 0;
  $scope.myjobsArray = [];


 
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

    return Math.ceil($scope.myjobsArray.length/$scope.itemsPerPage)-1;
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

    var postdata = $.param({
        'recruiter_id': user_deatils.id,
    })
    $scope.postedjob= senddataPost.senddata(postdata,base_url + 'get-recruiter-jobs');
    $scope.postedjob.then(function(response){
    
    	if(response.data.code == 400){
    		$scope.recpostedjob = false;

    	}
    	if(response.data.code == 200){
    		$scope.recpostedjob = true;
            angular.forEach(response.data.data, function(value, key) {
            $scope.myjobsArray.push(value);
        });
        $scope.loadingIsDone = true;
    		

    	}

    }); 

    $scope.deleteJob = function(job_id,recruiter_id){
        var postdata = $.param({
        'recruiter_id': recruiter_id,
        'job_id': job_id
    })

        $scope.postedjob= senddataPost.senddata(postdata,base_url + 'delete-job');
    $scope.postedjob.then(function(response){
      if(response.data.code == 200){
        $route.reload();
           // $location.path('/recruiter/home'+$rootScope.appUser.jwt_token);
      }

    }); 
    }
}
else
{
    $location.path('/login');
}


});