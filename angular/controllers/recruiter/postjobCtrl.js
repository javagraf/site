app.controller("postjobCtrl", function($route,$rootScope,$scope,$location,$timeout,getData,senddataPost,sendPostjson) {

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

  if(user_deatils.recruiter_profile_update == 0){
    var x = false;
    $location.path('/recruiter/profile-setting/'+user_deatils.jwt_token+'/'+x);
  }

   var data = {};
    $scope.general_info= getData.dataFromServer(data,base_url + 'general');
    $scope.general_info.then(function(response){
       $scope.general_info = response.data.data;
       $rootScope.general_info = response.data.data;

   });

    $scope.processArray = [];

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg != value;
    }, "Value must not equal arg.");

$.validator.addMethod("process", function(value, elem, param) {
    if($(".process:checkbox:checked").length > 0){
       return true;
   }else {
       return false;
   }
},"You must select at least one!");

$scope.validationOptions = {
    rules: {
        skills_required: {
            required: true,
        },
        year_of_passing: {
            required: true,
        },
        percentage_or_cgpa: {
            required: true,
        },
        vacancies: {
            required: true,
        },
         last_date: {
            required: true,
        },
        min_sal: {
            required: true,
        },
        max_sal: {
            required: true,
        },
        job_discription: {
            required: true,
        },
         "process[]": { 
                    required: true, 
                    minlength: 1 
            } ,
            job_type: { valueNotEquals: "" },
            job_by_role: { valueNotEquals: "" },
            qualification: { valueNotEquals: "" },
            job_location: { valueNotEquals: "" },
            specialization: { valueNotEquals: "" },
            area_of_sector: { valueNotEquals: "" },
            experience: { valueNotEquals: "" },
            per: { valueNotEquals: "" },
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
      if(val.method == "valueNotEquals"){
            select = true;
        }
        else{
          select = false;
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
    
    }
}

$scope.postJob = function(jobForm,jobid){

 if(jobForm.validate()) {
  

    var postdata = $.param({
        'recruiter_id': user_deatils.id,
        'job_id': 0,
        'job_type': $scope.job_type,
        'area_of_sector': $scope.area_of_sector,
        'specialization': $scope.specialization,
        'job_by_roles': $scope.job_by_roles,
        'qualification': $scope.qualification,
        'job_location': $scope.location_names,
        'year_of_passing': $scope.year_of_passing,
        'percentage_or_cgpa': $scope.percentage_or_cgpa,
        'skills_required': $scope.skills_required,
        'experience': $scope.experience,
        'job_discription': $scope.job_discription,
        'min_sal': $scope.min_sal,
        'max_sal': $scope.max_sal,
        'per': $scope.per,
        'vacancies': $scope.vacancies,
        'last_date': $scope.datepicker,
        'process': JSON.stringify($scope.processArray),
    })

    $scope.postjobpost= senddataPost.senddata(postdata,base_url + 'post-job');
    $scope.postjobpost.then(function(response){
       if(response.data.code == 200){
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
                  $scope.job_type= null
                  $scope.area_of_sector= null
                  $scope.specialization= null
                  $scope.job_by_roles= null
                  $scope.qualification= null
                  $scope.location_names= null
                  $scope.year_of_passing= null
                  $scope.percentage_or_cgpa= null
                  $scope.skills_required= null
                  $scope.experience= null
                  $scope.job_discription= null
                  $scope.min_sal= null
                  $scope.max_sal= null
                  $scope.per= null
                  $scope.per= null
                  $scope.vacancies= null
                     $scope.datepicker= null
                  $scope.processArray= []
               var elm = document.getElementsByClassName("process");
               angular.forEach(elm, function(value, key) {
                         value.checked = false;
              });   
             hidealertsuccess()

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
      }, 3000);
    }

}
else
{
    $location.path('/login');
}


});