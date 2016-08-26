<?php
	session_start();
	require_once 'database_connect.php';
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		$email = $_SESSION['email'];
		$oid = (int)$_GET['oid'];
		
		if(isset($email) && isset($oid)) {
			$sql = "INSERT INTO follows_rso (oid, email) VALUES (:oid, :email)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':oid' => $oid,
				':email' => $email,
			));
		}
	} else {
		echo "Please log in first to register to this organization.";
	}
?>
