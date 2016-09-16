
<body ng-app="myApp" ng-controller="myCtrl" id="main_app_module">
    <div id=app_header>header</div>
    <div id=app_content>
        <button ng-click="home()">Home</button>
        <div class=list-collection-block><div class=list-block ng-repeat="list in lists"><a href=#>{{list.name}}</a>
            <div class=list-info-block>
                <div class=list-name><label>Name: {{list.name}}</label></div>
                <div class=list-drugs><label>Drugs: {{list.drugs}}</label></div>
            </div>
            </div></div>
        <div class=add-list-block><button ng-click="showCreator = true">+</button></div>

        <div ng-show="showCreator" class=list-creator>
            <label class=field-name>Name: </label><input ng-model=listform.name type=text>
            <label class=field-name>Drugs: </label>
            <div ng-repeat="drug in drugs">
                <input type=checkbox checklist-model="listform.drugs" checklist-value="drug.Brand"> <label>{{drug.Brand}}</label>
            </div>
            <button ng-click=addList()>Add List</button>
        </div>
    </div>
    <div id=app_footer></div>

</body>