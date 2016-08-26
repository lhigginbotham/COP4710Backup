<?php
	
	try {
		$pdo = new PDO('mysql:host=greghare.me;dbname=famil110_cop4710', 'famil110_cop4710', '1database!');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
		
?>