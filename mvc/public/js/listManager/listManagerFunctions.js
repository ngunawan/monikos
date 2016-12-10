
    /* Open when someone clicks on the span element */
    function openNav() {
        document.getElementById("createList_overlay").style.width = "100%";
    }

    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
        document.getElementById("createList_overlay").style.width = "0%";
    }

    //    function openMenuNav() {
    //        document.getElementById("menu-popup").style.width = "250px";
    //    }
    //
    //    /* Close when someone clicks on the "x" symbol inside the overlay */
    //    function closeMenuNav() {
    //        document.getElementById("menu-popup").style.width = "0%";
    //    }


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
