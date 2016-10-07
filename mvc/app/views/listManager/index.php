<link rel="stylesheet" type="text/css" href="/mvc/public/css/listM.css">

<!-- ///////////////BOOTSTRAP///////////// -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- ///////////////BOOTSTRAP///////////// -->


<body ng-app="myApp" ng-controller="myCtrl" id="main_app_module">
	
    <div id=app_header>
		<a href = '#' ng-click='home()'><button class = 'back'>&#x25c1;</button></a>
        <a href ="#" ng-click="home()"><button>M</button></a>
    </div>
	
    <div id=app_content>

        <div class=add-list-block>
            <button ng-click="showCreator = true">
                <label>CREATE NEW LIST</label>
            </button>
        </div>
       
		<div class=list-collection-block>   
            <div class=list-block ng-repeat="list in lists">
                <h1 class="list-name-header">{{list.name}}</h1>
                <div class=list-info-block>
                    <div class=list-drugs>
        				{{list.drugs}}
						<br>
						<button class = 'select' ng-click = 'select()'>SELECT</button>
                    </div>
                </div>
            </div>
        </div>

        <div ng-show="showCreator" class=list-creator>
            <div class ='container'>
			<label class=field-name>LIST TITLE: </label>
            <br>
            <input id = 'listName' ng-model=listform.name type=text>
		 <button ng-click=addList()>Add List</button>
            </div>
			
<!-------LIST CREATOR--------->			
<div class="container">		
	<div class="row">
		<div class="form-group">
            <div class="col-xs-8 col-sm-8 col-xs-offset-2 col-sm-offset-2">
                <input type="search" class="form-control" id="search" placeholder="Search for your drug..">
            </div>
        </div>
	</div>
	<div class = 'drug-container'>	
	<div class="row">
        <div class="form-group">
            <div class="searchable-container">
            
				<div ng-repeat="drug in drugs">
                <div class="item col-xs-6 col-sm-6">
                    <div class="info-block block-info clearfix">

                        <div data-toggle="buttons" class="btn-group bizmoduleselect">
							
							<label class="drug-wrap">                           	<div class="bizcontent">
                                    <input type="checkbox" name="var_id[]" autocomplete="off" 
									checklist-model="listform.drugs" checklist-value="drug.Generic">
									<label>{{drug.Generic}}</label>
                                </div>
								
							</label>
                        </div>
                    </div>
                </div>
				</div>
                
            </div>
        </div>
		</div>
	</div>	
	
	
	</div>
			
        </div>
    </div>		
		
	<div class = 'play' ng-click="game()">
		<p>PLAY</p>
	</div>
	
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
	
	$(function() {
    	$('#search').on('keyup', function() {
        	var pattern = $(this).val();
        	$('.searchable-container .item').hide();
        	$('.searchable-container .item').filter(function() {
            return $(this).text().match(new RegExp(pattern, 'i'));
        }).show();
    });
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