<?php

$connection = mysqli_connect('localhost', 'root', '', 'todo');		// first connect to out database

if(isset($_POST)){								// checks to see if our post is set
	print_r( "Lets get ready to rumble");
} else {
	print_r("We are not ready to rumble");
}


$id = $_POST['id'];
$delete = "DELETE FROM todo_database WHERE id = '$id' ";		// Delete everything in the todo list where our id matches the id in the list

$result = mysqli_query($connection,$delete);					// this part actually deletes it.

if(mysqli_affected_rows($connection) == 1){						//REMEMBER THIS TAKES IN THE CONNECTION AS THE PARAMETER
	$output['success'] = true;
	$output['message'] = "Yep you have succesfully deleted this row";
} else {
	$output['success'] = false;
	$output['message'] = "You have failed to delete this row";
}

echo json_encode($output);




?>