<?php

	require_once 'database_connect.php';
	
	$name = $_POST["org_name"];
	$description = $_POST["org_description"];
	$email = $_POST["admin_email"];
	$founders_emails = $_POST["founders_emails"];
	$uid = $_POST["university"];
	$otype = $_POST["org_type"];
	
	session_start();
			
	if($_SESSION['permissions'] == 0 || $_SESSION['permissions'] == 1)
	{
		// Check founders emails here
		$founders = explode("\n", $founders_emails);
		
		$f0 = $founders[0];
		$f1 = $founders[1];
		$f2 = $founders[2];
		$f3 = $founders[3];
			
		$num_matches = 0;		
		
		if(isset($founders[0]) && isset($founders[1]) && isset($founders[2]) && isset($founders[3])) {
			for($i = 0; $i < 4; $i++)
			{
				$sql = 'SELECT email FROM users WHERE email = :founder';
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array(
					':founder' => $founders[$i])
				);
							
				if($row = $stmt->fetch(PDO::FETCH_ASSOC)); 
					$num_matches++;
			}
		}
						
		if($num_matches == 4)
		{
			if(isset($name) && isset($description) && isset($email) && isset($uid) && isset($otype)) {
				$sql2 = "INSERT INTO organizations (name, description, email, uid, otype) VALUES (:name, :description, :email, :uid, :otype)";
				$stmt2 = $pdo->prepare($sql2);
				$stmt2->execute(array(
					':name' => $name,
					':description' => $description,
					':email' => $email,
					':uid' => $uid,
					':otype' => $otype)
				);
	
				$sql5 = "SELECT MAX(oid) FROM organizations";
				$stmt5 = $pdo->prepare($sql5);
				$stmt5->execute();
				if($oid = $stmt5->fetch(PDO::FETCH_ASSOC)) {
					$oid['MAX(oid)'];
				}

				$sql6 = "INSERT INTO is_part_of (oid, uid) VALUES (:oid, :uid)";
				$stmt6 = $pdo->prepare($sql6);
				$stmt6->execute(array(
					':oid' => $oid['MAX(oid)'],
					':uid' => $uid)
				);
			
				if($_SESSION['permissions'] != 1)
				{
					$sql3 = "INSERT INTO admins (email, permissions) VALUES (:email, :permissions)";
					$stmt3 = $pdo->prepare($sql3);
					$stmt3->execute(array(
						':email' => $email,
						':permissions' => 1)
					);
					
					$_SESSION["permissions"] = 1;
				}

				$sql4 = "INSERT INTO manages_org (oid, email) VALUES (:oid, :email)";
				$stmt4 = $pdo->prepare($sql4);
				$stmt4->execute(array(
					':oid' => $oid['MAX(oid)'],
					':email' => $email)
				);				
			
			}
		}
	} else {
		echo "You are a super admin!";
	}
?>
