function statusChangeCallback(response) {
	console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
    	// Logged into your app and Facebook.
      	
       
        /*FB.api('/me', function(response) {
          alert('Your name is ' + response.name +'id: '+ response.id + ':email:' + response.email);
          response.id;
          response.name;
          if(document.cookie.indexOf("fbid") < 0){
            //document.cookie = "fbid="+response.id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
            fbid = response.id;
          }

          if(document.cookie.indexOf("fbname") < 0){
              //document.cookie = "fbname="+response.name+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
            fbname = response.name;
          }
        });*/
        /*var fblogin;
        var fbapp = angular.module('fbApp', []);
          fbapp.controller('fbCtrl', function($scope, $http, $location) {
            $scope.fblogin = function(){
              console.log("WHATTTT");
              var url = window.location.origin + "/mvc/public/fbapp/login-callback.php";
              var data = $.param({
                id: fbid,
                un: fbname,
              });
              var config = {
                      headers : {
                          'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                      }
              };
              $http.post(url, data, config)
              .then(function (response) {
                  console.log(response);
                  $scope.response = response;
                  if(response.data[0].response == 200){
                      window.location = window.location.origin + "/mvc/public/home";
                      if(document.cookie.indexOf("user_id") < 0){
                          document.cookie = "user_id="+response.data[0].user_id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                      }

                      if(document.cookie.indexOf("username") < 0){
                          document.cookie = "username="+response.data[0].username+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                      }
                  }else{
                      alert("incorrect password or username");
                  }
              });    
            }
            console.log("oyoyoy");
            $scope.fblogin();
        });*/
        //console.log("fbname before :"+ fbname + "fbid : " + fbid);  
        angular.module('fbapp.app', []).factory('fbService', ['$http', function ($http) {
          return new function () {
            this.fblogin = function () {
              //console.log("fbname after :"+ fbname + "fbid : " + fbid);
              //var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/fb_login.php";
              var url = window.location.origin + "/mvc/fbapp/login-callback.php";
              //var fbyes "true";
              //$http.post(url, data, config)
              var name;
              var id;
              $http.get(url)
              .then(function (response) {
                  console.log(response);
                  if(response.status == 200){
                    var fbname = response.data['fbname'];
                    var fbid = response.data['fbid'];
                    console.log("fbid is " + fbid + "fbname is " + fbname);
                     var config = {
                      headers : {
                          'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                      }
                    };   
                    var data = $.param({
                      id: fbid,
                      un: fbname,
                      fb: true
                    }); 
                    console.log("here fbid is " + fbid + "fbname is " + fbname + " data is: "+data);
                    //url = window.location.origin + "/fb_login.php";
                    url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/fb_login.php";

                    $http.post(url, data, config)
                    .then(function (response) {
                        console.log(response);

                        if(response.data.response == 200){
                          if(document.cookie.indexOf("user_id") < 0){
                                document.cookie = "user_id="+response.data.id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                            }
                            
                            if(document.cookie.indexOf("username") < 0){
                                document.cookie = "username="+response.data.username+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                            }
                            window.location = window.location.origin + "/mvc/public/home";
                        }
                        
                        //$scope.response = response;
                        /*if(response.status == 200){
                            //window.location = window.location.origin + "/mvc/public/home";
                            if(document.cookie.indexOf("user_id") < 0){
                                document.cookie = "user_id="+response.data[0].user_id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                            }
                            
                            if(document.cookie.indexOf("username") < 0){
                                document.cookie = "username="+response.data[0].username+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                            }
                        }else{
                            alert("incorrect password or username");
                        }*/
                    });
                  }
                  //$scope.response = response;
                  /*if(response.status == 200){
                      //window.location = window.location.origin + "/mvc/public/home";
                      if(document.cookie.indexOf("user_id") < 0){
                          document.cookie = "user_id="+response.data[0].user_id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                      }
                      
                      if(document.cookie.indexOf("username") < 0){
                          document.cookie = "username="+response.data[0].username+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                      }
                  }else{
                      alert("incorrect password or username");
                  }*/
              });
              /*var config = {
                      headers : {
                          'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                      }
              };   
              var data = $.param({
                id: fbid,
                un: fbname,
                fb: true
              }); 
              console.log("fbid is " + id + "fbname is " + name);
              //url = window.location.origin + "/fb_login.php";
              url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/fb_login.php";

              $http.post(url, data, config)
              .then(function (response) {
                  console.log(response);
                  
                  //$scope.response = response;
                  if(response.status == 200){
                      //window.location = window.location.origin + "/mvc/public/home";
                      if(document.cookie.indexOf("user_id") < 0){
                          document.cookie = "user_id="+response.data[0].user_id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                      }
                      
                      if(document.cookie.indexOf("username") < 0){
                          document.cookie = "username="+response.data[0].username+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                      }
                  }else{
                      alert("incorrect password or username");
                  }
              });*/
              
            };
          };
        }]);
        angular.injector(['ng', 'fbapp.app']).get("fbService").fblogin();

        FB.api('/me', function(response) {
          //alert('Your name is ' + response.name +'id: '+ response.id + ':email:' + response.email);
          //response.id;
          //response.name;
          //var angular.injector(['ng', 'fbapp.app']).get("fbService").fblogin();
          /*if(document.cookie.indexOf("fbid") < 0){
            //document.cookie = "fbid="+response.id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
            fbid = response.id;
          }

          if(document.cookie.indexOf("fbname") < 0){
              //document.cookie = "fbname="+response.name+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
            fbname = response.name;
          }*/
        });


        //angular.injector(['ng', 'fbapp.app']).get("fbService").fblogin();
        //fblogin();
        //window.location = window.location.origin + "/mvc/public/home";
        //window.location = window.location.origin + "/mvc/public/fbapp/login-callback.php";
        //window.location.replace('loginSuccess');
/*      
        if(document.cookie.indexOf("fbid") < 0){
            document.cookie = "fbid="+fbid+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
        }

        if(document.cookie.indexOf("fbname") < 0){
            document.cookie = "fbname="+fbname+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
        }
*/
    } else if (response.status === 'not_authorized') {
      	// The person is logged into Facebook, but not your app.
    } else {
      	// The person is not logged into Facebook, so we're not sure if
      	// they are logged into this app or not.
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
}

window.fbAsyncInit = function() {
	FB.init({
	appId      : '116488348813741',
	cookie     : true,  // enable cookies to allow the server to access 
	                    // the session
	xfbml      : true,  // parse social plugins on this page
	version    : 'v2.7' // use any version
});
	
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
