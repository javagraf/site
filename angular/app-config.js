var app = angular.module("jobportal", ['httpgetdata', 'httpdata','httpjson','httpfile', "ngRoute",'authservice','ngValidate','angular-loading-bar']);
//var base_url='http://phpstack-104300-296238.cloudwaysapps.com/api/';
var base_url='http://jobportal/admin/api/';
 //E:\openserver\ospanel\domains\webportal\admin\app\Http\Controllers\Api
app.config(function($routeProvider,$locationProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "views/home/user_home.html",
        controller: 'homeCtrl'
    })
.when("/job-detail/:job_id?", {
            templateUrl : "views/home/job_single.html",
            controller: 'singlejobCtrl'

        })
.when("/job-details/:job_id?/:jwttoken?", {
            templateUrl : "views/seeker/job_single.html",	
            controller: 'usersinglejobCtrl'

        })
        .when("/register", {
            templateUrl : "views/auth/register.html",
        controller: 'authCtrl'
        })

        .when("/login", {
            templateUrl : "views/auth/login.html",
          controller: 'authCtrl'
        })

         .when("/logout/:user_role?/:jwttoken?", {
            templateUrl : "views/auth/logout.html",
          controller: 'logoutCtrl'
        })
        .when("/user/home/:jwttoken?", {
            templateUrl : "views/seeker/user_home_after_login.html",
            controller: 'userhomeCtrl'

        })

          .when("/user/profile-setting/:jwttoken?/:seekprofileupdate?", {
            templateUrl : "views/seeker/user_profile.html",
            controller: 'userprofileCtrl'

        })
          .when("/user/post-new-resume/:jwttoken?", {
            templateUrl : "views/seeker/post_resume.html",
            controller: 'postresumeCtrl'
 
        })
        .when("/recruiter/home/:jwttoken?", {
            templateUrl : "views/recruiter/recruiter_home.html",
            controller: 'recruiterhomeCtrl'

        })
         .when("/recruiter/profile-setting/:jwttoken?/:recprofileupdate?", {
            templateUrl : "views/recruiter/recruiter_profile.html",
            controller: 'recruiterprofile'

        })
        .when("/recruiter/post-new-job/:jwttoken?", {
            templateUrl : "views/recruiter/post_job.html",
            controller: 'postjobCtrl'

        })

        .when("/recruiter/applied-user/:specialization?/:job_id?/:jwttoken?", {
            templateUrl : "views/recruiter/recruiter_applied_user.html",
            controller: 'jobappliedCtrl'

        })

         .when("/recruiter/edit-job/:specialization?/:job_id?/:jwttoken?", {
            templateUrl : "views/recruiter/recruiter_edit_job.html",
            controller: 'editjobCtrl'

        })

        .when("/register-seeker/confirm/:jwttoken?",{
         
        templateUrl : "views/home/404.html",
         controller : '404Ctrl',   
    })


  $locationProvider.html5Mode(true).hashPrefix('!');


});

 app.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = false;
}]);

app.config(function ($provide, $httpProvider) {
    $provide.factory('ErrorInterceptor', function ($q) {
        return {
            responseError: function(rejection) {
                
                return $q.reject(rejection);
            }
        };
    });

    $httpProvider.interceptors.push('ErrorInterceptor');
});




app.run(['$rootScope','$location', '$routeParams','authorization', function($rootScope,$location,$routeParams,authorization) {
  
    $rootScope.$on('$routeChangeSuccess', function(e, current, pre) {
        var user_deatils =  localStorage.getItem("userData") ; 
        var user_role = localStorage.getItem("userRole") ;
 $rootScope.oldUrl = pre;
       if(user_deatils != null && $location.path() != '/logout' && $location.path() != '/login' && $location.path() != '/register'){
        var x = JSON.parse(user_deatils);
       authorization.checkuser(x.jwt_token,user_role).then(function (user){
   
        if(user.result.id == x.id){
          $rootScope.appUser = x;
          $rootScope.userRole = user_role;
          $rootScope.userlogin=true; 
        }
       });
      }
    });
  }]);

app.config(function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
});
app.directive('jpPopupLink',  function() {

 function link(scope, element, attrs) {
  element.on('click', function(){
         $('body').addClass('popup_open');
      });
  }
 return {
    link: link
  };
});

app.directive('ngFiles', ['$parse', function ($parse) {

            function fn_link(scope, element, attrs) {
                var onChange = $parse(attrs.ngFiles);
                element.on('change', function (event) {
                    onChange(scope, { $files: event.target.files });
                });
            };

            return {
                link: fn_link
            }
        } ])

app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){

               var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    $(".imageRenderer").attr("src", this.result);
                }
            }
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

app.directive('navtoggle',  function() {

 function link(scope, element, attrs) {
   element.on('click', function(){
        $('body').removeClass('jp_cat_sidebar_open');
        $('body').toggleClass('jp_sidebar_open');
      });
  }

 return {
    link: link
  };
});

app.directive('categorytoggle',  function() {

 function link(scope, element, attrs) {
  element.on('click', function(){
        $('body').removeClass('jp_sidebar_open');
        $('body').toggleClass('jp_cat_sidebar_open');
      });
  }
 return {
    link: link
  };
});
app.directive('categoryclose',  function() {

 function link(scope, element, attrs) {
  element.on('click', function(){
        $('body').removeClass('jp_sidebar_open');
        $('body').removeClass('jp_cat_sidebar_open');
      });
  }
 return {
    link: link
  };
});
// app.directive('onchangecheck',  function() {

//  function link(scope, element, attrs) {
//   element.on('change', function(){
       
//       });
//   }
//  return {
//     link: link
//   };
// });
app.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                scope.$apply(function () {
                    scope.fileread = changeEvent.target.files[0];
                    // or all selected files:
                    // scope.fileread = changeEvent.target.files;
                });
            });
        }
    }
}]);



app.directive('imageonload', ['$parse', function($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('load', function() {
              var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    $(".imageRenderer").attr("src", this.result);
                }
            }
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                }); 

            });
            element.bind('error', function(){
              
            });
        }
    };
}]);

app.directive('jpPopupClose',  function() {

 function link(scope, element, attrs) {
  element.on('click', function(){
        $('body').removeClass('popup_open');
      });
  }
 return {
    link: link
  };
});
app.directive('experiencedToggle',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
        var check = $(this).attr('id')
        
        if(check == 'fresher'){
          if(typeof scope.appUser.seeker_profile.work_experience == 'undefined'){
            scope.appUser.seeker_profile.work_experience = 'fresher';
          }
        }
        else{
 if(typeof scope.appUser.seeker_profile.work_experience == 'undefined'){
            scope.appUser.seeker_profile.work_experience = 'experienced';
          }
        }
        
      });
  }
 return {
    link: link
  };
});


app.directive('addRemoveProcess',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
        var y = $(this).attr('value');
        var idx = $.inArray(y, scope.jobdetail.process);
if (idx == -1) {
  scope.jobdetail.process.push(y);
} else {
  scope.jobdetail.process.splice(idx, 1);
}

      });
  }
 return {
    link: link
  };
});

app.directive('addRemoveLocation',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
        var y = $(this).attr('value');
        var idx = $.inArray(y, scope.locationArray);
if (idx == -1) {
  scope.locationArray.push(y);
} else {
  scope.locationArray.splice(idx, 1);
}

    });
  }
 return {
    link: link
  };
});

app.directive('addRemoveJobtype',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
      
        var y = $(this).attr('value');
        var idx = $.inArray(y, scope.jobtypeArray);
if (idx == -1) {
  scope.jobtypeArray.push(y);
} else {
  scope.jobtypeArray.splice(idx, 1);
}

      });
  }
 return {
    link: link
  };
});

app.directive('addRemoveDesignation',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
    
        var y = $(this).attr('value');
        var idx = $.inArray(y, scope.designationArray);
if (idx == -1) {
  scope.designationArray.push(y);
} else {
  scope.designationArray.splice(idx, 1);
}

      });
  }
 return {
    link: link
  };
});

app.directive('addRemoveQualification',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
      
        var y = $(this).attr('value');
        var idx = $.inArray(y, scope.qualificationArray);
if (idx == -1) {
  scope.qualificationArray.push(y);
} else {
  scope.qualificationArray.splice(idx, 1);
}

      });
  }
 return {
    link: link
  };
});

app.directive('addRemoveExperience',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
     
        var y = $(this).attr('value');
        var idx = $.inArray(y, scope.experienceArray);
if (idx == -1) {
  scope.experienceArray.push(y);
} else {
  scope.experienceArray.splice(idx, 1);
}

      });
  }
 return {
    link: link
  };
});



app.directive('addRemoveProcessPost',  function() {

 function link(scope, element, attrs) {
  element.on('change', function(){
        var x = $(this).prop('checked');
        var y = $(this).attr('value');
        var idx = $.inArray(y, scope.processArray);
if (idx == -1) {
  scope.processArray.push(y);
} else {
  scope.processArray.splice(idx, 1);
}
 
      });
  }
 return {
    link: link
  };
});

app.directive('ngConfirmClick', [
        function(){
            return {
                link: function (scope, element, attr) {
                    var msg = attr.ngConfirmClick || "Are you sure?";
                    var clickAction = attr.confirmedClick;
                    element.bind('click',function (event) {
                        if ( window.confirm(msg) ) {
                            scope.$eval(clickAction)
                        }
                    });
                }
            };
    }])


app.directive('changeForm',  function() {

 function link(scope, element, attrs) {
  element.on('click', function(){
        var check = $(this).attr('id');;
        if(check == 'recruiter'){
            $('#org_usr_name').text('Organization Name');
        }
        else{
      $('#org_usr_name').text('Your Name');
        }
      });
  }
 return {
    link: link
  };
});


app.directive('uploadFile',  function() {

 function link(scope, element, attrs) {
  element.on('click', function(){
        var check = $(this).attr('id');;
        if(check == 'recruiter'){
            $('#org_usr_name').text('Organization Name');
        }
        else{
      $('#org_usr_name').text('Your Name');
        }
      });
  }
 return {
    link: link
  };
});

app.directive('autohide', ['$interval', 'dateFilter','$window', function($interval, dateFilter,$window) {

 function link(scope, element, attrs) {
    $window.setTimeout(function() {
   
        
              $('.jp_error').removeClass('alert_open');
   
}, 3000);  
}

 return {
    link: link
  };
}]);

app.directive("datepicker", function () {
  return {
    restrict: "A",
    require: "ngModel",
    link: function (scope, elem, attrs, ngModelCtrl) {
      var updateModel = function (dateText) {
        scope.$apply(function () {
          ngModelCtrl.$setViewValue(dateText);
        });
      };
      var options = {
        dateFormat: "dd/mm/yy",
        minDate: new Date(),
        onSelect: function (dateText) {
          updateModel(dateText);
        }
      };
      elem.datepicker(options);
    }
  }
});


app.filter('replaceSpace', function() {
   return function(x) {
    
    var str = x;
    var replaced = str.replace(' ', '-');
    
       
return replaced;
   };

});

app.filter('formatdate', function() {
        return function(input) {
          if(input){  // do some bounds checking here to ensure it has that index
           var x = input.split(' ')[0];
           var todayTime = new Date(x);
    var month = todayTime.getMonth() + 1;
    var day = todayTime.getDate();
    var year = todayTime.getFullYear();
    return day + "/" +  month + "/" + year;
          }
        }
    });



app.filter('offset', function() {
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});


// app.run(['$rootScope','$location', '$routeParams','authorization', function($rootScope, $location, $routeParams,authorization) {
//     $rootScope.$on('$routeChangeSuccess', function(e, current, pre) {
//         console.log($routeParams.token_id);
//         if($location.path() == "/authentication/")
//         {
//             $rootScope.authtemplate=true;
//
//         }
//         else
//         {
//             $rootScope.authtemplate=false;
//
//         }
//
//         if(typeof $routeParams.token_id != 'undefined'){
//             authorization.checkuser($routeParams.token_id).then(function(user){
//                 if(user.status == "true"){
//                     $rootScope.appUser = user.data;
//                 }
//                 if(user.status == "false"){
//                     $location.path('/authentication/');
//                 }
//             });
//             // console.log('yes');
//         }
//
//
//
//     });
// }]);

  
//   $window.fbAsyncInit = function() {
//     FB.init({ 
//       appId: '1777998805831033',
//       status: true, 
//       cookie: true, 
//       xfbml: true,
//       version: 'v2.4'
//     });
// };




 /* app.run(['$rootScope','$location', '$routeParams', function($rootScope, $location, $routeParams,,getData,senddataPost) {
    $rootScope.$on('$routeChangeSuccess', function(e, current, pre) {
        
    });
  }]);*/