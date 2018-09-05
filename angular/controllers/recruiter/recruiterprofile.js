app.controller("recruiterprofile", function($window,$rootScope,$route,$timeout,$rootScope,$routeParams,$scope,$location,$timeout,getData,senddataPost,sendPostjson,sendPostfile) {

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
  $rootScope.appUser = user_deatils;


if($routeParams.recprofileupdate != 'undefined' && $routeParams.recprofileupdate == 'false'){
 $('.jp_error').show();
      $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>Please update your profile.</p>');
      hidealerterror()
}

function hidealerterror(){
      $timeout(function() {
          $('.jp_error').removeClass('alert_open');
      }, 3000);
    }


    function hidealertsuccess(){
      $timeout(function() {
          $('.jp_success').removeClass('alert_open');
          $('.jp_alert_wrapper').addClass('jp_error');
      }, 3000);
    }

   $scope.validationOptions = {
    rules: {
        skills_required: {
            required: true,
        },
        i_am:{required: true},
        location:{required: true},
        org_address:{required: true},
        // org_website:{required: true},
        org_discription:{required: true},
        
    },
     onfocusout: function (element, event) {
        if (element.name !== "email") {
            $.validator.defaults.onfocusout.call(this, element, event);
        }
    },
    messages: {
        email: {
            required: "All fields are required",
            email: "Your email address must be in the format of name@domain.com"
        },
        password: {
            required: "You must enter a password",
            minlength: "Your password must have a minimum length of 6 characters",

        }


    },
         showErrors: function(errorMap, errorList) {
      var select;
     var req;
     var em;
     $.each(errorList, function(key,val) {
        
        if(val.method == "required"){
          req = true;
        }
        else{
           req = false;
        }
 

    });

     if(req){
       $('.jp_error').show();
      $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>All fileds are required.</p>');
     }
    }
}

    $scope.updateProfile = function(profileForm){
        
        if(profileForm.validate()) {
          
          var fd = new FormData();
          var file = $scope.avtar;
          var website = $rootScope.appUser.recruiter_profile.org_website;
         if(typeof file == 'undefined'){
            file = '';
         }
         if(typeof website == 'undefined'){
             website = '';
         }
        fd.append('org_logo', file);
        fd.append('i_am', $rootScope.appUser.recruiter_profile.i_am);
        fd.append('recruiter_id', $rootScope.appUser.id);
        fd.append('org_website',website);
        fd.append('org_location', $rootScope.appUser.recruiter_profile.org_location);
        fd.append('org_address', $rootScope.appUser.recruiter_profile.org_address);
        fd.append('org_discription', $rootScope.appUser.recruiter_profile.org_discription);
   
             $scope.active_jobs= sendPostfile.sendfile(fd,base_url + 'fill-recruiter-profile');
    $scope.active_jobs.then(function(response){
      if(response.data.code == 200){
        user_deatils.recruiter_profile = response.data.data.recruiter_profile;
        user_deatils.recruiter_profile_update = 1;
         localStorage.userData = angular.toJson(user_deatils);
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
             hidealertsuccess()
             $rootScope.appUser = user_deatils;
            if(!$scope.$$phase) {
      $scope.$apply();
            }
                }
      
   
    }); 
        }
        else
        {
      hidealerterror()
      }
    }

}
else
{
    $location.path('/login');
}


});