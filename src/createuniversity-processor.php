<?php
	
	require_once 'database_connect.php';
	
	$uname = $_POST["uni_name"];
	$udesc = $_POST["uni_description"];
	$uaddr = $_POST["uni_address"];
	$npop = $_POST["num_pop"];
	$email = $_POST["admin_email"];

	if(isset($uname) && isset($udesc) && isset($uaddr) && isset($npop) && isset($email)) {
		$sql = "INSERT INTO universities (name, description, address, num_students, email) VALUES (:uname, :udesc, :uaddr, :npop, :email)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
			':uname' => $uname,
			':udesc' => $udesc,
			':uaddr' => $uaddr,
			':npop' => $npop,
			':email' => $email)
		);
		$permissions = 2;
		$sql1 = "INSERT INTO admins (email, permissions) VALUES (:email, :permissions)";
		$stmt1 = $pdo->prepare($sql1);
		$stmt1->execute(array(
			':email' => $email,
			':permissions' => $permissions)
		);
		session_start();
		$_SESSION['permissions'] = 2;
	}
	
	
?>