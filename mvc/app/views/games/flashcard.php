<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<!--     <script src="flashCtrl.js"></script> -->
    <script src = '/mvc/public/js/flashCtrl.js'></script>

  <title>Flashcard</title>

<link rel="stylesheet" type="text/css" href="/mvc/public/css/flashcardstyle.css">
<!--   <link rel="stylesheet" href="flashcardstyle.css"> -->
  

</head>

<body ng-app="myApp" ng-controller="flashCtrl" id="main_app_module">	

<!-- 
<div ng-if="firstLoad">
	{{getlid(125)}}		
</div>
 -->


<div class="stage">
  <div class="flashcard">
    <div class="front">
      <p>Front</p>
    </div>
    <div class="back">
      <p>Back</p>
    </div>
  </div>  
</div>
  
  
  
</body>
</html>