$('document').ready(function(){
    


    $("#save_task").click(function(){

        var todoadd = $("#todo-add");
        var form_data={
            title:todoadd.find("input[name=title]").val(),
            date:todoadd.find("input[name=date]").val(),
            details:todoadd.find("textarea[name=details]").val(),
        };
        $.ajax(
        {
            url: 'actions/add.php',
            data: form_data,
            dataType: 'json',
            cache: false,
            method: 'POST',
            success: function(data){
                //success is achieved!
                $("#display_refresh").click();
            }
        });
            
    });



    





    $("#display_refresh").click(function(){

        $.ajax(
        {
            url: 'actions/get_database.php',
            dataType: 'json',
            cache: false,
            method: 'POST',
            success: function(data){
                if(data.success)
                {
                    $("#todo-display > .display_container").html(data.html);
                    
                }
            }
        });
            
    });
    
     








     $('#todo-display').on('click', '.delete', function(){
        var confirmation = confirm("Are you sure you want to delete this task?");
         if(confirmation) {
         $uniqueid = {id:$(this).parent().attr('data-id')};
         $(this).parent().remove();
        $.ajax(
        {
            url: 'actions/remove.php',
            dataType: 'json',
            data: $uniqueid,
            cache: false,
            method: 'POST',
            success: function(data){
                $("#display_refresh").click();
//                if(data.success)
//                {
//                    $(".todo-list").html(data.html);
//                }
                     $("#display_refresh").click();
            }
        });
         } 
             
    });
    
    
});















/*$('document').ready(function(){  //when the document is ready
    $("#save_task").click(function(){  //add click handler to save_task button

        var todoadd = $("#todo-add");
        var form_data={
            title:todoadd.find("input[name=title]").val(),
            date:todoadd.find("input[name=date]").val(),
            details:todoadd.find("textarea[name=details]").val(),
        }; //get all the values from the form and add them to our data object for sending
        $.ajax(
        {
            url: 'actions/add.php',  //CHANGE THIS BACK LATER ON  //send our data to the add.php file
            data: form_data, //give it the form data
            dataType: 'text', //expect json data back
            cache: false,//do not let the response be cached
            method: 'POST', //use POST to send it
            success: function(data){ //and do something when the response comes back
                //success is achieved!
                 //$("#display_refresh").click();   // when button is clicked this basically presses refresh for me!
             }
         });
    });

    $("#display_refresh").click(function(){  //add a click handler to our data display button
        refreshdata();
    });


    $('.display_container').on('click','.delete',function(){// when the delete button is clicked[NOTE USE EVENTE DELEGATION BECAUSE THE OBJECT WAS NOT CREATED WHEN THE PAGE WAS LOADED]
        
        var div_data = {unique_id:$(this).parent().attr('data-id') };
        $.ajax(// make this ajax call.
        {
            url: 'actions/remove.php',             
            data: div_data,
            dataType: 'json',
            cache: false,
            method:'POST',
            success:function(data){
            console.log('f');
                refreshdata();
            }
        });
    });

    
    function refreshdata(){
        $.ajax({
            url: 'actions/database_get.php',  // CHANGE THIS TO GET.PHP
            dataType: 'json', //expect json data back from get.php
            cache: false, //do not cache the result
            method: 'POST',  //use the post method
            success:function(response){

                $("#todo-display > .display_container").html(response.html);
            },
            error:function(){
                console.error("getting the data failed");
            }
        });
    }




});

*/

