app.controller("editjobCtrl", function($routeParams,$rootScope,$scope,$location,$timeout,getData,senddataPost,sendPostjson) {

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

	$scope.jobreqpost= senddataPost.senddata(postdata,base_url + 'get-recruiter-job-detail');
    $scope.jobreqpost.then(function(response){
      
    	$scope.jobdetail = response.data.data;
      $scope.datepicker=response.data.data.last_date;
    
    });

    var data = {};
    $scope.general_info= getData.dataFromServer(data,base_url + 'general');
    $scope.general_info.then(function(response){
       $scope.general_info = response.data.data;
       $rootScope.general_info = response.data.data;

   });

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
    
 

$scope.updateJob = function(jobForm,jobid){
  
 if(jobForm.validate()) {
  
    var postdata = $.param({
        'recruiter_id': user_deatils.id,
        'job_id': jobid,
        'job_type': $scope.jobdetail.job_type_id,
        'area_of_sector': $scope.jobdetail.area_of_sector_id,
        'specialization': $scope.jobdetail.specialization_id,
        'job_by_roles': $scope.jobdetail.job_by_roles_id,
        'qualification': $scope.jobdetail.qualification_id,
        'job_location': $scope.jobdetail.job_location_id,
        'year_of_passing': $scope.jobdetail.year_of_passing,
        'percentage_or_cgpa': $scope.jobdetail.percentage_or_cgpa,
        'skills_required': $scope.jobdetail.skills_required,
        'experience': $scope.jobdetail.experience,
        'job_discription': $scope.jobdetail.job_discription,
        'min_sal': $scope.jobdetail.min_sal,
        'max_sal': $scope.jobdetail.max_sal,
        'per': $scope.jobdetail.per,
        'vacancies': $scope.jobdetail.vacancies,
        'last_date': $scope.datepicker,
        'process': JSON.stringify($scope.jobdetail.process),
    })

    $scope.updatejobpost= senddataPost.senddata(postdata,base_url + 'post-job');
    $scope.updatejobpost.then(function(response){
       if(response.data.code == 200){
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
             hidealertsuccess()
                }
      
    
    });
 }
 else{
  hidealerterror()
 }
}


    $scope.checkInArray = function(array,value){
  
      var status = false;
 
  for(var i=0; i<array.length; i++){
   var name = array[i];
   if(name == value){
    status = true;
    break;
   }
  }

  return status;

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