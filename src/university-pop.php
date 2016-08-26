<?php
   require_once 'database_connect.php';

   $sql = "SELECT * FROM universities";
	$stmt = $pdo->prepare($sql);
	$result = $stmt->execute(array());
   
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
   {
      echo('<option value="'. $row['uid'] .'">'. $row['name'] .'</option>');
   }
?>
