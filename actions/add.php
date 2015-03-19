	<?php

	// now include bunch of if else statments to make sure that the user is submitting the correct input values.

	
	require_once('../includes/functions.php');

	$error=[];
	$output=[];

	if(isset($_POST))
	{
		if(empty($_POST['title']))
		{
			$error['title']='Title must be set';
		}
		if(empty($_POST['date']))
		{
			$error['date']='Date must be set';
		} else {
			$utime = strtotime($_POST['date']);

			if($utime===false){
				$error['date']='Invalid date/time';
			}
			else if($utime<time())
			{
				$error['date']='Task must be set in the future';
			}
		}


		if(empty($_POST['details']))
		{
			$error['details']='Details must be set';
		}
		

		if(count($error) == 0){

		


				$title = $_POST['title'];
				$date = $_POST['date'];
				$details = $_POST['details'];
			


			$connection = mysqli_connect('localhost', 'root', '', 'todo');

			$query = " INSERT INTO todo_database (`title`,`date`,`details`) VALUES ('$title','$date', '$details') " ;


			$result = mysqli_query($connection, $query);

			$output['success'] = true;
			$output['message'] = 'Everything is working well';
	

		} else {
			$output['success']=false;
        	$output['message']='Data save failed';
        	echo json_encode($error);
       	    
		}
	} else {
			$output['success'] = false;
			$output['message'] = "No Data availabe";
	}

	echo json_encode($output);








			?>