


<?php

$connection = mysqli_connect('localhost', 'root', '', 'todo'); 		//establishing a connection with the database;

$query = "SELECT * FROM todo";					// getting all the files from the database;

$result = mysqli_query($connection,$query);		// tells the computer to grab the files from this connection.

$output = [];

$html = "<div class = 'default_row'><p>TITLE</p> <p>Date</p> <p>Details</p> </div>";	  // this will be my title	
												





while($todo_row = mysqli_fetch_assoc($result)){   // were going to fetch the result and put them into $todo_row as an associative array

	
	$id = $todo_row['id'];
	$title = $todo_row['title'];
	$date = $todo_row['date'];
	$details = $todo_row['details'];

		$html .= "<div class ='display_container' data-id = '$id'>  <div>$title</div> . ' ' . <div>$date</div> . ' ' . <div>$details</div> <button>DELETE</button> </div> ";
		
}



if(mysqli_num_rows($result) > 0){
	$output = ['success' => true, 'html' => $html];
} else {
	$output = ['success' => false, 'message' => 'We have not even grabbed anything from the database'];
}

echo json_encode($output); 


?>