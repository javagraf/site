app.controller("usersinglejobCtrl", function($window,$rootScope,$scope,$timeout,$location,$routeParams,getData,senddataPost) {
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
    var data = {};

    var postdata = $.param({
        'job_id': $routeParams.job_id,
        'seeker_id': user_deatils.id,
    })
    $scope.single_job= senddataPost.senddata(postdata,base_url + 'single-job-detail');
    $scope.single_job.then(function(response){
        $scope.single_job = response.data.data;
        
    }); 

   $scope.applyJob = function(id){   
   /* if(user_deatils.profile_update == 0){
    var x = 'false';
      $location.path('/user/profile-setting/'+user_deatils.jwt_token+'/'+x);
    }*/
    if(user_deatils.profile_update == 0){
    var x = false;
    $location.path('/user/profile-setting/'+user_deatils.jwt_token+'/'+x);
  }
  else{
$scope.formerror='';        
   var postdata = $.param({
                'seeker_id': user_deatils.id,
                'job_id': id,
            }) 
    $scope.userdata= senddataPost.senddata(postdata,base_url + 'apply-on-job');
    $scope.userdata.then(function(response){
    $scope.userdata = response.data;
   
    
       if(response.data.code == 400){
        $('.jp_error').addClass('alert_open');
        $('.jp_error').find('.message').html(response.data.message);
        hidealerterror()
      }
      if(response.data.code == 200){
        $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
        $('.jp_success').find('.message').html(response.data.message);
        $('.jp_success').show();
        $scope.single_job.is_applied  = true;
        hidealertsuccess()
      }
    });
  }
   
   }

   $scope.redirectToCompany = function(target){
            $window.open('http://'+target, '_blank');
        };
  }
    else
    {
        $location.path('/login');
    }  

  function hidealerterror(){
    $timeout(function() {
        $('.jp_error').removeClass('alert_open');
    }, 3000);
  }


 function hidealertsuccess(){
    $timeout(function() {
        $('.jp_success').removeClass('alert_open');
    }, 3000);
  }
});