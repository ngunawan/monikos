<link rel="stylesheet" type="text/css" href="/mvc/public/css/listM.css">

<meta name='viewport' content="width=device-width, initial-scale=1" />
   
<body ng-app="myApp" ng-controller="myCtrl" id="main_app_module">
    
    <div id='app_header'>
        <a href = '#' ng-click='home()'><button class = 'back'>Back</button></a>
        <a href ="#" ng-click="home()"><button>M</button></a>
        <div class="capsule-info"><img src="/mvc/public/images/pill_icon.png"> {{capsules[0].capsules}}</div>
    </div>
    
    <div id='app_content'>

        <div class='add-list-block'>
			<!--create new list button go here -->
			
            <button onclick="openNav()">
                <label>CREATE NEW LIST</label>
            </button>
        </div>
        
        <div class='list-collection-block'>   
            <div ng-class="list_block" class="list_block" ng-repeat="list in lists track by $index">
                
                <h1 class = "list_name_header">
                    {{list.name}}</h1>
                
                <div class='list-info-block' >
                    <div class='list-drugs'>
                        {{list.drugs}}
                        <br>        
                    </div>      
                </div>
                
                <!--<button class ='select' ng-click='selectlist($index, this)'>SELECT</button>-->
                <button class ='selectList' ng-click='selectlist($index)'>SELECT</button>
                        
                <button class = 'deleteList'>DELETE LIST</button>
            </div>
                        
        </div>
		
<!-------LIST CREATOR--------->  
		
<!-- The overlay -->
<div id="createList_overlay" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay content -->
  <div class="overlay-content"> 
   		<div class ='text-container'>
                <div class=field-name>LIST TITLE: </div>
                <input id = 'listName' ng-model=listform.name type="text" required>	
           </div>
<!-------LIST CREATOR--------->         
<div class="list-container">        
    <div class="form-group">
          <div class="col-xs-8 col-sm-8 col-xs-offset-2 col-sm-offset-2">
               <input type="search" class="form-control" id="search" placeholder="Search for your drug..">
            </div>
        </div>
    <div class = 'drug-container'>  
        <div class="form-group">
            <div class="searchable-container">
                
				<div class= 'scrollableCreateDrugList'>

                <div ng-repeat="drug in drugs">
                <div class="item col-xs-6 col-sm-6">
                  <div class = 'checkboxes'>
                                
                              <input type="checkbox" name="var_id[]" autocomplete="off" checklist-model="listform.drugs" checklist-value="drug.Generic" id='drug-{{$index}}' required>
                              
                            <label class = 'drug_name' for = 'drug-{{$index}}'>{{drug.Generic}}</label>
                        </div>
                </div>
                </div>
                
            </div>
        </div>
        </div>
    </div>  
    </div>
         <button id ='addbtn' ng-click=addList()>Add List</button>

  </div> <!--overlay content end-->

</div><!--overlay end-->

<!-------LIST CREATOR END--------->  
   
	</div>
        
    <div class = 'play' ng-click="launchGame()">
        <p>PLAY</p>
    </div>
    
</body>



<script> 
	
		/* Open when someone clicks on the span element */
	function openNav() {
		document.getElementById("createList_overlay").style.width = "100%";
	}

	/* Close when someone clicks on the "x" symbol inside the overlay */
	function closeNav() {
		document.getElementById("createList_overlay").style.width = "0%";
	}
	
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