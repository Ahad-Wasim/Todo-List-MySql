


<?php

$connection = mysqli_connect('localhost', 'root', '', 'todo'); 		//establishing a connection with the database;

$query = "SELECT * FROM todo_database";					// getting all the files from the database;

$result = mysqli_query($connection,$query);		// tells the computer to grab the files from this connection.

$output = [];

$html = "<div class = 'default_row'> <span>TITLE</span> <span>Date</span> <span>Details</span> </div>";	  // this will be my title	
												





while($todo_row = mysqli_fetch_assoc($result)){   // were going to fetch the result and put them into $todo_row as an associative array

	
	$id = $todo_row['id'];
	$title = $todo_row['title'];
	$date = $todo_row['date'];
	$details = $todo_row['details'];

		$html .= "<div class ='data_div' data-id = '$id'>  <span>$title</span> <span>$date</span> <span>$details</span> <button class = 'delete'>DELETE</button> </div> ";
		
}



if(mysqli_num_rows($result) > 0){			// that means we have grabbed something and that we should display that inside the html
	$output = ['success' => true, 'html' => $html];		// this will display it inside the the html
} else {
	$output = ['success' => false, 'message' => 'We have not even grabbed anything from the database']; // we didn't grab anything then.
}

echo json_encode($output); 			// encode it because javascript can not read associative arrays.


?>