<!DOCTYPE html>
<html>
<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password ="";
	$dbname = "shakir";

	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT id,name,email,psw FROM registration";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    
	    while($row = $result->fetch_assoc()) {
	        echo " <br> <b> Id: </b> ". $row["id"]. "<b> || Name: </b>". $row["name"]. "<b> || Email: </b>" . $row["email"] . "<b> || Password: </b>" . $row["psw"] ."<br>";
	    }
	} else {
	    echo "0 results";
	}

	$conn->close();
	?>
<p><b>Create New Account: </b><a href="registration.html">sign up</a>.</p>
<p><b>Already have an account? </b><a href="login.html">Sign in</a>.</p>
</body>
</html>