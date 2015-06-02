<?php 
include('includes/functions.php');                                  //include functions.php file
?>


<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>

    <link rel="stylesheet" href="assets/external/bootstrap/css/bootstrap.min.css">
    <script src="assets/external/jquery.min.js"></script>
    <script src="assets/external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/main.js"></script>
</head>


<style>
   
    .data_div{
        border:1px solid black;
        color:black;
        margin-bottom: 20px;
        font-weight: bold;
        height:25px;
        position:relative;
        /*box-sizing:border-box;*/
    }


    .delete{
        position:absolute;
        right:0;
        color: black;        
        font-weight: bold;
    }

    

</style>



<body>


<?php 
include('includes/header.php');                                       //include header.php
?>
    <main id="main-content">
        
        <section id="todo-display">
            <button id="display_refresh" type="button" class="glyphicon glyphicon-refresh"></button>
            <div class="display_container"></div>
        </section>
        


        <section id="todo-add">
            <form>
                <input type="text" name="title" placeholder="Task Title">
                <input type="text" name="date" placeholder="Task Date">
                <textarea name="details" placeholder="Task Details"></textarea>
                <button type="button" id="save_task" class="glyphicon glyphicon-plus"></button>
            </form>
        </section>
        
    </main>
<?php 
include('includes/footer.php');                                         //include footer.php
?>
</body>
</html>