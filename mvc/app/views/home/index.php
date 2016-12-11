<!--Hello <?=$data['name']?>-->

<link rel="stylesheet" type="text/css" href="/mvc/public/css/home_style.css"/>

<body id="home_page">

	<script src = '/mvc/public/js/home/homeCtrl.js'></script>

    <div id=app_content ng-app="myApp" ng-controller="homeCtrl">
			<a href="#" ng-click="drugDatabase()"> <div class="top-block">
				<div class="database-block"> <!--<a href=database.html>Database</a>-->
    <!--<button ng-click="drugDatabase()">Database</button>--> DATA<br>BASE
    </div> </div> </a> <a href="#" ng-click="listManager()"> <div
    class="bottom-block"> <div class=study-block> STUDY </div> </div> </a>

		<a href="#"  onclick="logout()"> <div class=logout-block> <div class =
		'logout'>LOGOUT</div> </div> </a>

    </div> <!--<div id=app_footer>footer</div>--> <!--<div ng-app="myApp"
    ng-controller="customersCtrl">-->

    <!-- <table> <tr ng-repeat="x in names"> <td>Generic: {{ x.Generic }}</td>
    <td>Brand: {{ x.Brand }}</td> <td>Class: {{ x.Class }}</td> <td>Indication: {{
    x.Indication }}</td> <td>HintLikes: {{ x.HintLikes }}</td> <td>HintDislikes: {{
    x.HintDislikes }}</td> </tr> </table> -->

</body>
