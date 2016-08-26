<?php
	
	require_once 'database_connect.php';
	
	$email = $_POST["email"];
	$password = sha1($_POST["password"]);
	echo($password);
	echo("<br>");
	if(isset($email) && isset($password)) {
		$sql = "SELECT * FROM users WHERE email = :email and password = :password";
		//SELECT * FROM $tbl_name WHERE username='$username' and password='$password
		$stmt = $pdo->prepare($sql);
		$result = $stmt->execute(array(
			':email' => $email,
			':password' => $password)
		);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo("<br>");
		if($row == true)
		{
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['email'] = $email;
			$_SESSION['permissions'] = 0;
			
			$sqlAdmin = "SELECT * FROM admins WHERE email = :email";
			$Admin = $pdo->prepare($sqlAdmin);
			$result = $Admin->execute(array(
				':email' => $email)
			);
			$Arow = $Admin->fetch(PDO::FETCH_ASSOC);
			
			echo($Arow['permissions']);
			if($Arow == true)
			{
				$_SESSION['permissions'] = 1;
			}
			else
			{
				echo("Not an Admin<br>");
			}
			
			echo('Session Beginning');
		}
		else
			echo('Incorrect Credentials!');
	}
	
?>
