app.controller("logoutCtrl", function($rootScope,$scope,$location,$timeout,getData,senddataPost,sendPostjson,$routeParams) {

if($rootScope.oldUrl.loadedTemplateUrl == "views/seeker/user_home_after_login.html" || $rootScope.oldUrl.loadedTemplateUrl == "views/recruiter/recruiter_home.html"){
  $location.path('/');
}


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

console.log();
   var postdata = $.param({
        'token': $routeParams.jwttoken,
    })
    if($routeParams.user_role == 'seeker'){
$scope.user_logout= senddataPost.senddata(postdata,base_url + 'logout-seeker');
    $scope.user_logout.then(function(response){
     $scope.user_logout = response.data.data;
       
        if(response.data.code==200)
        {
           localStorage.removeItem('userData'); 
           localStorage.removeItem('userRole'); 
           $location.path('/');
        }
        
    }); 
    }
    if($routeParams.user_role == 'recruiter'){
      $scope.user_logout= senddataPost.senddata(postdata,base_url + 'logout-recruiter');
    $scope.user_logout.then(function(response){
        $scope.user_logout = response.data.data;
        
        if(response.data.code==200)
        {
           localStorage.removeItem('userData'); 
           localStorage.removeItem('userRole'); 
           $location.path('/');
        }
        
    }); 
    }

   
});