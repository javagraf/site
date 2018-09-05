app.controller("authCtrl", function($rootScope,$scope,$location,$timeout,getData,senddataPost,sendPostjson) {

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

     var user_deatils =  localStorage.getItem("userData") ;
        var user_role = localStorage.getItem("userRole") ;
        
 if(user_deatils != null && ($location.path() == "/login" || $location.path() == '/register')){
         var x = JSON.parse(user_deatils);
         if(user_role == 'recruiter'){
          $location.path('/recruiter/home/'+x.jwt_token)
         }
         if(user_role == 'seeker'){
          $location.path('/user/home/'+x.jwt_token)
         }
         // 
      }


	jQuery.extend(jQuery.validator.messages, {
    required: "All fileds are required.",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});

	$.validator.setDefaults({
  onkeyup: function () {
    var originalKeyUp = $.validator.defaults.onkeyup;
    var customKeyUp =  function (element, event) {
      if ($("#email_address")[0] === element) {
        return false;
      }
      else {
      	        return false;
        return originalKeyUp.call(this, element, event);
      }
    }

    return customKeyUp;
  }()
});
	

		$rootScope.authtemplate=true; 
		 
		 $scope.validationOptions = {
    rules: {
        email: {
            required: true,
            email: true
        },
         forgotemail: {
            required: true,
            email: true
        },
      
            confirm_pass: {
      equalTo: "#password"
    }
      
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
    
     var req;
     var em;
     var pass;
     $.each(errorList, function(key,val) {
    		
    		if(val.method == "required"){
    			req = true;
    		}
    		else{
    			 req = false;
    		}
    		if(val.method == "email"){
    			em = true;
    		}
    		else{
    			 em = false;
    		}
        if (val.method == "equalTo") {
            pass = true;
        }
        else{
          pass = false;
        }

    });

     if(req){
       $('.jp_error').show();
     	$('.jp_error').addClass('alert_open');
     	$('.jp_error').find('.message').html('<p>All fileds are required.</p>');
     }
     if(em){
       $('.jp_error').show();
     	$('.jp_error').addClass('alert_open');
     	$('.jp_error').find('.message').html('<p>Invalid Email address.</p>');

     }
     if(pass){
       $('.jp_error').show();
      $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>Password and confirm password does not match.</p>');
     }
    
    }
}
		

  $scope.forgotPassword = function(formForgot){
     if(formForgot.validate()) {
        var role = '0'
      if(formForgot.user.forgotemail == 'recruiterforgot'){
        var role = '1'
      }
      
        var postdata = $.param({
              'role':role,
              'email':formForgot.user.forgotemail
            })
       $scope.registeruserpost= senddataPost.senddata(postdata,base_url + 'forgot-password');
              $scope.registeruserpost.then(function(response){
                if(response.data.code == 400){
                  $('.jp_error').addClass('alert_open');
                  $('.jp_error').find('.message').html(response.data.message);
                      $('.jp_error').show();
                  hidealerterror()
                }
                if(response.data.code == 200){
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
                  formForgot.user.forgotemail = null;
                  $('.jp_success').show();
                  hidealertsuccess()
                }
                
            });
     }
     else{
       hidealerterror()
     }
  }

		$scope.registerUser = function(myForm){
      // myForm.user.option_register = 'seeker';
			 if(myForm.validate()) {
        
        if(myForm.user.option_register == "seeker"){
            // register seeker
            var postdata = $.param({
              'full_name':myForm.user.org_usr_name,
              'email':myForm.user.email,
              'mobile_no':myForm.user.mobile_no,
              'password':myForm.user.password,
            })
              
              $scope.registeruserpost= senddataPost.senddata(postdata,base_url + 'register-new-seeker');
              $scope.registeruserpost.then(function(response){
                if(response.data.code == 400){
                  $('.jp_error').addClass('alert_open');
                  $('.jp_error').find('.message').html(response.data.message);
                      $('.jp_error').show();
                  hidealerterror()
                }
                if(response.data.code == 200){
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
                    myForm.user.org_usr_name = null;
                    myForm.user.email = null;
                    myForm.user.mobile_no = null;
                    myForm.user.password = null;
                    myForm.user.confirm_pass = null;
           $('.jp_success').show();
             hidealertsuccess()
                }
                
            });
        }
        else if(myForm.user.option_register == "recruiter"){
          // register recruiter
            var postdata = $.param({
              'organisation_name':myForm.user.org_usr_name,
              'recruiter_email':myForm.user.email,
              'recruiter_mobile_no':myForm.user.mobile_no,
              'password':myForm.user.password,
            })

              $scope.registeruserpost= senddataPost.senddata(postdata,base_url + 'register-new-recruiter');
              $scope.registeruserpost.then(function(response){
                if(response.data.code == 400){
                  $('.jp_error').addClass('alert_open');
                  $('.jp_error').find('.message').html(response.data.message);
                   $('.jp_error').show();
                  hidealerterror()
                }
                if(response.data.code == 200){
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
                   $('.jp_success').show();
                    myForm.user.org_usr_name = null;
                    myForm.user.email = null;
                    myForm.user.mobile_no = null;
                    myForm.user.password = null;
                    myForm.user.confirm_pass = null;
                  hidealertsuccess()
                }
                
            });
        }
        else{
          $('.jp_error').addClass('alert_open');
      $('.jp_error').find('.message').html('<p>Please select your role.</p>');
        }

    }else{
    	 hidealerterror()
    }
    
		}


$scope.loginUser = function(loginForm){
   if(loginForm.validate()) {
        
        if(loginForm.user.option_login == 'seeker'){
            // seeker login
             var postdata = $.param({
              'value':loginForm.user.email,
              'password':loginForm.user.password,
              'device_type':'',
              'device_type':'',
              'device_type':'web',
            })

             $scope.loginuserpost= senddataPost.senddata(postdata,base_url + 'login-seeker');
              $scope.loginuserpost.then(function(response){
        
                if(response.data.code == 400){
                  $('.jp_error').addClass('alert_open');
                  $('.jp_error').find('.message').html(response.data.message);
                   $('.alert_open').show();
                  hidealerterror()
                }
                if(response.data.code == 200){
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
                    localStorage.userData = angular.toJson(response.data.data);
                      localStorage.userRole = 'seeker';
                      var x = JSON.parse(localStorage.userData) ;
                       $rootScope.authtemplate=false; 
                        $rootScope.userlogin=true; 
                              $location.path('/user/home/'+x.jwt_token);
                }
                
            });
        }
        else if(loginForm.user.option_login == 'recruiter'){
            // recruiter login 
  var postdata = $.param({
             'value_recruiter':loginForm.user.email,
              'password':loginForm.user.password,
              'device_type':'',
              'device_token':'',
              'device_type':'web', 
            })


             $scope.loginuserpost= senddataPost.senddata(postdata,base_url + 'recruiter-login');
              $scope.loginuserpost.then(function(response){
        
                if(response.data.code == 400){
                  $('.jp_error').addClass('alert_open');
                  $('.jp_error').find('.message').html(response.data.message);
                   $('.alert_open').show();
                  hidealerterror()
                }
                if(response.data.code == 200){
                  $('.jp_error').addClass('alert_open').addClass('jp_success').removeClass('jp_error');
                  $('.jp_success').find('.message').html(response.data.message);
                   localStorage.userData = angular.toJson(response.data.data);
                      localStorage.userRole = 'recruiter';
                      var x = JSON.parse(localStorage.userData) ;
                       $rootScope.authtemplate=false; 
                        $rootScope.userlogin=true; 
                              $location.path('/recruiter/home/'+x.jwt_token);
                }
                
            });

        }
        else{

        }
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

   
});