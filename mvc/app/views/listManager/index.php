<link rel="stylesheet" type="text/css" href="/mvc/public/css/listM.css">


<body ng-app="myApp" ng-controller="myCtrl" id="main_app_module">
    <div id=app_header>
        <a href ="home.html"><button>M</button></a>
    </div>
    <div id=app_content>

        <div class=add-list-block>
            <button ng-click="showCreator = true">
                <label>CREATE NEW LIST</label>
            </button>
        </div>
        <button ng-click="home()">Home</button>

        <div ng-show="showCreator" class=list-creator>
            <label class=field-name>Name: </label>
            <br>
            <input id = 'listName' ng-model=listform.name type=text>
            <br>
            <label id='drugList' class=field-name>Drugs: </label>
            <div ng-repeat="drug in drugs">
                <input type=checkbox checklist-model="listform.drugs" checklist-value="drug.Brand"> <label>{{drug.Brand}}</label>
            </div>
            <br>
            <button ng-click=addList()>Add List</button>
        </div>

        <!--<div class=list-collection-block>
            <div class=list-block ng-repeat="list in lists"><a href=#>{{list.name}}</a>
            <div class=list-info-block>
                <div class=list-name><label>Name: {{list.name}}</label></div>
                <div class=list-drugs><label>Drugs: {{list.drugs}}</label></div>
                <div class=list-ids><label>ids: {{list.ids}}</label></div>
            </div>
            </div>
            </div>-->
        <div class=list-collection-block>   
            <div class=list-block ng-repeat="list in lists">
                <h1 class="list-name-header">{{list.name}}</h1>
                <div class=list-info-block>
                    <div class=list-drugs>
                        <label>Drugs:</label>{{list.drugs}}           
                    </div>
                </div>
            </div>
        </div>
        <!--<div class=add-list-block><button ng-click="showCreator = true">+</button></div>
-->
        <!--<div ng-show="showCreator" class=list-creator>
            <label class=field-name>Name: </label><input ng-model=listform.name type=text>
            <label class=field-name>Drugs: </label>
            <div ng-repeat="drug in drugs">
                <input type=checkbox checklist-model="listform.drugs" checklist-value="drug.Brand"> <label>{{drug.DrugId}},{{drug.Brand}}</label>
            </div>
            <button ng-click=addList()>Add List</button>
        </div>-->
    </div>
    <div id=app_footer></div>

</body>

<script> 
    $(document).ready(function () {
        $('.list-collection-block').on('click', '.list-block',function(){
            //$(this).next('.list-block .list-info-block').slideToggle();
            //alert("what");
            
            var brands = $(this.childNodes[3]);
            //var brands = $(this);
            //for(var i in brands){
            //    console.log("i is " + i + ":" + brands[i]);
            //}
            //console.log(brands.text);
            brands.slideToggle("fast");
        });

        //$('body').on('click', function(){
        //    alert("hello");
        //});
    });

    

</script>


    



<!--<body ng-app="myApp" ng-controller="myCtrl" id="main_app_module">
    
    
    <div id=app_content>
               
        <div class=add-list-block>
            <button ng-click="showCreator = true"><label>CREATE NEW LIST</label></button></div>
        
        <div ng-show="showCreator" class=list-creator>
            <label class=field-name>Name: </label><br><input id = 'listName' ng-model=listform.name type=text>
            <br>
            <label id='drugList' class=field-name>Drugs: </label>
            <div ng-repeat="drug in drugs">
                <input type=checkbox checklist-model="listform.drugs" checklist-value="drug.Brand"> <label>{{drug.Brand}}</label>
            </div>
            <br>
            <button ng-click=addList()>Add List</button>
        </div>
        
        <div class=list-collection-block>
            
            <div class=list-block ng-repeat="list in lists"><h1>{{list.name}}</h1>
            
                <div class=list-info-block>
                    <div class=list-drugs>
                        <label>Drugs:</label>{{list.drugs}}           
                    </div>
                </div>
            </div>
        </div>

</body>-->