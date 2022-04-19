<?php
	$email = $_POST['email'];
	$psw = $_POST['psw'];


	$conn = new mysqli("localhost","root","","shakir");
	if ($conn->connect_error){
		die("Failed to connect :".$conn->connect_error);
	}else{
		$stmt = $conn->prepare("select * from registration where email = ?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
			$data = $stmt_result->fetch_assoc();
			if($data['psw']===$psw) {
				echo "<h2>Login successfully</h2>";
			} else {
				echo "<h3>Invalid Email or Password</h3>";
			}
		}else{
			echo "<h3>Invalid Email or Password</h3>";
		}
	}
?>