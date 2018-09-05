angular.module("httpgetdata", []).factory('getData', function ($http) {
    var data = {};
    data.dataFromServer = function (data1, url) {
        return $http({
            method: 'GET',
            url: url,
            data: data1,
        })
   }
    return data;
});

angular.module("httpdata", []).factory('senddataPost', function ($http) {
    var data = {};
    data.senddata = function (data1, url) {
        return $http({
            method: 'POST',
            url: url,
            data: data1,
          headers : 
          {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        })
   }
    return data;
});

angular.module("httpjson", []).factory('sendPostjson', function ($http) {
    var data = {};
    
    data.sendjson = function (data1, url) {
        return $http({
            method: 'POST',
            url: url,
            data: data1,
            dataType: 'json',
        headers : {'Content-Type': 'application/json;charset=utf-8;'}
                   

        })
   }
    return data;
});

angular.module("httpfile", []).factory('sendPostfile', function ($http) {
    var data = {};
    
    data.sendfile = function (data1, url) {
        return $http({
            method: 'POST',
            url: url,
            data: data1,
            dataType: 'json',
           transformRequest: angular.identity,
        headers : {'Content-Type': undefined}
                 

        })
   }
    return data;
});

angular.module("authservice", ['httpdata']).service('authorization', function(senddataPost,$rootScope,$q) {

     this.checkuser = function(token,role){
        var postdata = $.param({
                'token': token,
            });
            var deferred = $q.defer();
            if(role == 'seeker'){
          senddataPost.senddata(postdata,base_url + 'auth-seeker').then(function(response){
        deferred.resolve(response.data) 
         });
                   return deferred.promise;
            }
            if(role == 'recruiter'){
                senddataPost.senddata(postdata,base_url + 'auth-recruiter').then(function(response){
        deferred.resolve(response.data) 
         });
                   return deferred.promise;
            }
        
    }   

    });
    



   
    // this.redirectIfUnauthenticate = function(token){

    // }


    // this.redirectIfUnauthenticate = function(token){

    // }

