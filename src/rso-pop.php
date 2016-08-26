<?php
   require_once 'database_connect.php';

   // logged in: list followed RSO's
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
   {
      $user = $_SESSION['email'];

      $sql = "SELECT * FROM follows_rso WHERE email=:e";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':e' => $user));
   }

   // not logged in: list all RSO's
   else
   {
      $sql = "SELECT * FROM organizations";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':e' => $user));
   } 

   // echo html dropdown options
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
   {
      $query = $pdo->prepare("SELECT * FROM organizations WHERE oid=:o");
      $query->execute(array(':o' => $row['oid']));
      $org = $query->fetch();
         
      echo('<option value="'. $org['oid'] .'">'. $org['name'] .'</option>');
   }
?>
