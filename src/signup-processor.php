<?php
	require_once 'database_connect.php';
	
	$fname = $_POST["first_name"];
	$lname = $_POST["last_name"];
	$univ = $_POST["university"];
	$email = $_POST["email"];
	$password = sha1($_POST["password"]);
	$cpassword = sha1($_POST["cpassword"]);
	
	if(isset($fname) && isset($lname) && isset($univ) && isset($email) && isset($password) && isset($cpassword)) {
		$sql = "INSERT INTO users (fname, lname, email, password) VALUES (:fname, :lname, :email, :password)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			':fname' => $fname,
			':lname' => $lname,
			':email' => $email,
			':password' => $password)
		);
		
		$sql2 = "INSERT INTO attends_uni (uid, email) VALUES (:uid, :email)";
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->execute(array(
			':uid' => $univ,
			':email' => $email)
		);
	}
	
?>
