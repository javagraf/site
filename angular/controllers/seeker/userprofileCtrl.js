app.controller("userprofileCtrl",function($window,$route,$rootScope,$scope,$timeout,$location,$routeParams,getData,senddataPost,sendPostfile) {
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
    // $scope.workexperience = 'fresher';
$scope.$watch('work_experience', function(value) {
 });

  if($routeParams.seekprofileupdate != 'undefined' && $routeParams.seekprofileupdate == 'false'){
      $('.jp_error').show();
      $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>Please update your profile.</p>');
      hidealerterror()
    }

	$scope.general_info= getData.dataFromServer(data,base_url + 'general');
	$scope.general_info.then(function(response){
    	$scope.general_info = response.data.data;
    	$rootScope.general_info = response.data.data;
    });

  $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg != value;
    }, "Value must not equal arg.");

  $.validator.addMethod("resumeformate", function(value, element, arg){
            return arg != value;
    }, "Value must not equal arg.");

 $scope.validationOptions = {
    rules: {
          
        new_password:{required: true},
        old_password:{required: true},
        gender:{required: true},
        current_address:{required: true},
        preferred_location:{valueNotEquals: ""},
        job_type:{valueNotEquals: ""},
        seeker_qualification:{valueNotEquals: ""},
        year_of_passing:{required: true},
        percentage_or_cgpa:{required: true},
        area_of_sector:{valueNotEquals: ""},
        work_experience:{required: true},
        resume:{/*required: true,*/
          extension: "pdf|doc|docx",
          /*'onfocusout':true*/

        },
        
    },
     onfocusout: function (element, event) {
        if (element.name !== "email") {
            $.validator.defaults.onfocusout.call(this, element, event);
            hidealerterror()

        }
    },
   
   showErrors: function(errorMap, errorList) {
      var select;
     var req;
     var ext;
     $.each(errorList, function(key,val) {
        
        if(val.method == "required"){
          req = true;
        }
        else{
           req = false;
        }
          if(val.method == "valueNotEquals"){
            select = true;
        }
        else{
          select = false;
        }

        if(val.method == "extension"){
            ext = true;
        }
        else{
          ext = false;
        }
 

    });

     if(req){
       $('.jp_error').show();
      $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>All fileds are required.</p>');
     }
      if(select){
       $('.jp_error').show();
      $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>All fileds are required.</p>');
     }

      if(ext){
       $('.jp_error').show();
      $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>Please select valid file format for resume.</p>');
     }
   
    }
}
//  $scope.validteform = function(formtest){
//   console.log(formtest);
// }




	$scope.updatePassword = function(form){  
    if(form.validate()) {
        $scope.formerror='';        
  var postdata = $.param({
                'seeker_id': user_deatils.id,
                'old_password': $scope.old_password,
                'new_password': $scope.new_password,
            }) 
    $scope.userdata= senddataPost.senddata(postdata,base_url + 'seeker-change-password');
    $scope.userdata.then(function(response){
    $scope.userdata = response.data;
       $scope.old_password="";
       $scope.new_password="";
      if(response.data.code == 400){
        $('.jp_error').addClass('alert_open');
        $('.jp_error').find('.message').html(response.data.message);
        hidealerterror()
      }
      if(response.data.code == 200){
        $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
        $('.jp_success').find('.message').html(response.data.message);
        $('.jp_success').show();
        hidealertsuccess()
      }
    });
      } 
  else{

hidealerterror()
  }
  
  }

$scope.test = function(workexperience){
  $rootScope.appUser.seeker_profile.work_experience = workexperience
}

$scope.genderchange = function(option){
  $rootScope.appUser.seeker_profile.gender = option
}

$scope.updateProfile = function(myform){
  
  if(myform.validate()) {
    
    var fd = new FormData();
    var avtar = $scope.avtarseeker;
    var resume = $scope.resume;
    var workexperience = $scope.appUser.seeker_profile.experience_in_year
    var experienceinmonths = $scope.appUser.seeker_profile.experience_in_months
    var specialization = $scope.appUser.seeker_profile.specialization
    var roletype = $scope.appUser.seeker_profile.role_type
    var certification = $scope.appUser.seeker_profile.certification
     if(typeof avtar == 'undefined'){
            avtar = '';
         }
         if(typeof resume == 'undefined'){
            resume = '';
         }
         if(typeof workexperience == 'undefined'){
            workexperience = '';
         }
         if(typeof experienceinmonths == 'undefined'){
            experienceinmonths = '';
         }
           if(typeof specialization == 'undefined'){
            specialization = '';
         }
         if(typeof roletype == 'undefined'){
            roletype = '';
         }
         if(typeof certification == 'undefined'){
            certification = '';
         }

  
                fd.append('avtar',  avtar);
                fd.append('resume',  resume);
                fd.append('seeker_id',  $scope.appUser.id);
                fd.append('gender', $scope.appUser.seeker_profile.gender);
                fd.append('preferred_location', $scope.appUser.seeker_profile.preferred_location);
                fd.append('current_address', $scope.appUser.seeker_profile.current_address);
                fd.append('job_type', $scope.appUser.seeker_profile.job_type);
                fd.append('seeker_qualification', $scope.appUser.seeker_profile.seeker_qualification);
                fd.append('year_of_passing', $scope.appUser.seeker_profile.year_of_passing);
                fd.append('percentage_or_cgpa', $scope.appUser.seeker_profile.percentage_or_cgpa);
                fd.append('area_of_sector', $scope.appUser.seeker_profile.area_of_sector);
                fd.append('work_experience', $scope.appUser.seeker_profile.work_experience);

                fd.append('experience_in_year', workexperience);
                fd.append('experience_in_months', experienceinmonths);
                fd.append('specialization', specialization);
                fd.append('role_type', roletype);
                fd.append('certification', certification);

                  $scope.active_jobs= sendPostfile.sendfile(fd,base_url + 'fill-seeker-profile');
    $scope.active_jobs.then(function(response){
      if(response.data.code == 200){
        user_deatils.seeker_profile = response.data.data.seeker_profile;
        user_deatils.profile_update = 1;
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
  else{
  
  hidealerterror()  
  }
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
  }
  else
  {
    $location.path('/login');
  }  

 
});