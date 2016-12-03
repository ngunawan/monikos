var app = angular.module('myApp', []);
    app.controller('flashCtrl', function($scope, $http) {

//     function setRequestConfig(){
//         return {
//           headers : {
//             'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
//           }
//         };    
//     }
// 
//     function challengeComplete(){
//       $('#challengeCompleteMessage').slideDown('fast');
//     }

    
    //dcedits
    $scope.firstLoad = true;
    $scope.getlid = function(lid){
    	console.log("here");
      var config = {
      headers : {
          'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
        }
      };   
      var data = $.param({
        lid: lid
      }); 
      
      var listurl = "/db/get_specific_list.php"; 
      $http.post(listurl, data, config)
      .then(function (response) {
          console.log(response.data.drugnames);
          console.log("ABOUT TO PRINT SCOPE SELECT");
          $scope.select = response.data.drugnames.split(",");
          console.log("SELCT " + $scope.select[0]);
          console.log("select list " + $scope.select.length);
          $scope.getallTheDrugs();
      });
      $scope.firstLoad = false;
      
    }

    
    //end dcedits


  	$(document).ready(function() {
  		$('.flashcard').on('click', function() {
    		$('.flashcard').toggleClass('flipped');
  		});
	});

      $scope.getallTheDrugs = function(){
        
        var url = "/db/get_drugs.php";
        $http.get(url)
        .then(function (response) {
            console.log(response);
            console.log("IS SELECT STILL THE SAME " + $scope.select);
            $scope.names = response.data.records.slice(1,30);
            $scope.allDrugs = response.data.records;

            $scope.names = $scope.finalList;

			
		function makeIterator(array){
  		  
    
   		 return {
       		next: function(){
           		return nextIndex < array.length ?
               		{value: array[nextIndex++], done: false} :
               		{done: true};
       			}
    		}
		}
		
		var it = makeIterator($scope.names);
		var card = it.next().value;

	});
	
	}
	
	});