<?php
	session_start();
	require_once 'database_connect.php';

	$name = $_POST["eve_name"];
	$category = $_POST["eve_theme"];
	$description = $_POST["eve_description"];
	$sdate = date("Y-m-d",strtotime($_POST["startdate"]));
	$edate = date("Y-m-d",strtotime($_POST["enddate"]));
	$stime = $_POST["starttime"];
	$etime = $_POST["endtime"];
	$address = $_POST["formatted_address"];
	$latitude = $_POST["lat"];
	$longitude = $_POST["lng"];
	$phone = $_POST["phone"];
	$phone = preg_replace('/\D/', '', $phone);
	$email = $_SESSION['email'];
	$visibility = $_POST["visibility"];
	$rsvp = $_POST["rsvp"];
	$uid = 0;
	
	if(isset($email)) {
		$sql = "SELECT uid FROM attends_uni WHERE email ='".$email."'";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		if($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$uid = $result['uid'];
		}
	}

	if(isset($name) && isset($category) && isset($description) && isset($sdate) && isset($edate) && isset($stime) && isset($etime) && isset($address) && isset($phone) && isset($visibility) && isset($rsvp) && isset($uid)){
		$sql2 = "INSERT INTO events (name, description, category, sdate, edate, stime, etime, address, latitude, longitude, phone, email, visibility, rsvp, uid) 
		VALUES (:name, :description, :category, :sdate, :edate, :stime, :etime, :address, :latitude, :longitude, :phone, :email, :visibility, :rsvp, :uid)";
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->execute(array(
			':name' => $name,
			':description' => $description,
			':category' => $category,
			':sdate' => $sdate,
			':edate' => $edate,
			':stime' => $stime,
			':etime' => $etime,
			':address' => $address,
			':latitude' => $latitude,
			':longitude' => $longitude,
			':phone' => $phone,
			':email' => $email,
			':visibility' => $visibility,
			':rsvp' => $rsvp,
			':uid' => $uid)
		);
		$sql5 = "SELECT MAX(eid) FROM events";
		$stmt5 = $pdo->prepare($sql5);
		$stmt5->execute();
		if($oid = $stmt5->fetch(PDO::FETCH_ASSOC)) {
			$oid['MAX(eid)'];
		}
		$result = $oid['MAX(eid)'];
		echo ($result);
	}
?>
