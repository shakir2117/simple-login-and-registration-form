<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$psw = $_POST['psw'];
	$pswr = $_POST['pswr'];

	$conn = new mysqli('localhost','root','','shakir');
	if($conn->connect_error){
		die('connection_failed :'.$conn->connect_error);
	}

	$dup=mysqli_query($conn,"select * from registration where email = '$email'");

	if (mysqli_num_rows($dup)>0) {
		echo "This email is already registered !!!!";
	}
	else{

	if ($_POST["psw"] != $_POST["pswr"]) {
		echo "password not matched try again";
	}else{
		$stmt = $conn->prepare("insert into registration(name,email,psw,pswr) value(?,?,?,?)");
		$stmt->bind_param("ssss",$name,$email,$psw,$pswr);
		$stmt->execute();
		echo "registration done .............";
		$stmt->close();
		$conn->close();
	}
	}
?>
