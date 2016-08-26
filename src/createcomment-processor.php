<?php
   session_start();
   require_once 'database_connect.php';

   $poster = $_SESSION["email"];
   $body = $_POST["comment_text"];
   $event = $_POST["eid"];

   // Check if rating is set
   if (isset($_POST["rating"]))
      $rating = $_POST["rating"];
   else
      $rating = 0;

   if (isset($event) && isset($poster) && (isset($body) || isset($rating)))
   {
      $sql = "INSERT INTO comments (eid, body, rating, email) VALUES (:event, :body, :rating, :email)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':event' => $event,
        ':body' => $body,
  			':rating' => $rating,
  			':email' => $poster)
		);
   }

   header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
