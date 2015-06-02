
<!-- Add Code to limit the possible registerations -->


<?php

	if(isset($_POST)){
		if(!empty($_POST))
			echo "Full Name: " . $_POST['name'] . "  Email: " . $_POST['email'] . "  Username: " . $_POST['user_name'] . "   password: " . $_POST['password'];
	
			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
	}


	$connection = mysqli_connect('localhost', 'root', '', 'todo');

	$query = "INSERT INTO users (name,email,username,password)VALUES('$name','$email','$username','$password')";

	$result = mysqli_connect($connection,$query);
?>










<a href= "login_form.php">Login</a>

<html style = "background:yellow">

<h1>Register</h1>


<p>Connect this to our database</p>


<h4> Please fill out all the requirements below</h4>

<form action = 'register_form.php' method= 'POST'>


<label>Name</label><br>
<input type ='text' name = 'name' placeholder = "Full Name"> <br><br>

<label>Email Address:</label><br>
<input type ="email" name = "email" placeholder="Email"><br></br>


<label>Username:</label><br>
<input type ="text" name = "user_name" placeholder="User Name"><br></br>

<label>Password:</label><br>
<input type ="password" name = "password" placeholder="Password"><br></br>

<input type = 'submit' value = 'submit'>




</form>

</html>