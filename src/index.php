<?php
	$pageTitle = "Event Selection System";
	include 'header.php';
	require_once 'database_connect.php';

   // case: uid specified, show public events
   if (isset($_GET['uni']) && $_GET['uni'] != 0)
   {
      $perm = 1;

      // logged in, show private university events
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
      {
         $user = $_SESSION['email'];
         $stmt = $pdo->prepare("SELECT uid FROM attends_uni WHERE email = :e");
         $stmt->execute(array(':e' => $user));
         $uid = $stmt->fetch();

         if ($uid[0] == $_GET['uni'])
            $perm = 2;
      }

      $uid = $_GET['uni'];
      $stmt = $pdo->prepare("SELECT * FROM events WHERE uid = :u AND visibility <= :p");
	   $stmt->execute(array(':u' => $uid, ':p' => $perm));
	   $events = $stmt->fetchAll();
   }
   // case: oid specified
   else if (isset($_GET['rso']) && $_GET['rso'] != 0)
   {
      $oid = $_GET['rso'];

      $query = $pdo->prepare("SELECT email FROM organizations WHERE oid = :o");
      $query->execute(array(':o' => $oid));
      $email = $query->fetch();
      $email = $email['email'];

      // logged in
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
      {
         $stmt = $pdo->prepare("SELECT * FROM events WHERE email = :e");
	      $stmt->execute(array(':e' => $email));
	      $events = $stmt->fetchAll();
      }
      // not logged in
      else
      {
         $stmt = $pdo->prepare("SELECT * FROM events WHERE email = :e AND visibility = 1");
	      $stmt->execute(array(':e' => $email));
	      $events = $stmt->fetchAll();
      }
   }
   // case: uid is 0, list all universities
   else if (isset($_GET['uni']) && $_GET['uni'] == 0)
   {
		$stmt = $pdo->prepare("SELECT * FROM events WHERE visibility = 1");
		$stmt->execute();
		$events = $stmt->fetchAll();
   }
   else
   {
      // case: no uid, check user's university
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
      {
         $user = $_SESSION['email'];
         $perm = $_SESSION['permissions'];
         
         $stmt = $pdo->prepare("SELECT uid FROM attends_uni WHERE email = :e");
         $stmt->execute(array(':e' => $user));
         $uid = $stmt->fetch();
		   $uid = $uid[0];

         $stmt = $pdo->prepare("SELECT * FROM events WHERE uid = :u AND visibility <= 2");
	      $stmt->execute(array(':u' => $uid));
	      $events = $stmt->fetchAll();
      }

      // case: not logged in, show public events
      else
      {
         $stmt = $pdo->prepare("SELECT * FROM events WHERE visibility = 1");
	      $stmt->execute();
	      $events = $stmt->fetchAll();
      }
   }

?>
<div class="container">
	<div class="row home">

      <?php //show signup/login banner if user is not logged in
      if (!isset($_SESSION['loggedin']))
      {
         echo ('<div class="card-panel orange darken-2 login-prompt"><div class="caption center-align">');
         echo ('<h3 class="light grey-text text-lighten-3">Welcome!</h3><h5 class="light grey-text text-lighten-3">Please login or sign up for an account</h5>');
         echo ('</div><div class="caption center-align"><a class="waves-effect waves-light btn-large cyan login-button" href="login.php">Login</a>');
         echo ('<a class="waves-effect waves-light btn-large cyan" href="signup.php">Sign Up</a></div></div>');
      }
      ?>  

		<div class="col s12 m4 filters">
            <form action="" id="unilist" method="get">
                <div class="section">
			        <h5 class="white-text">Filter Events</h5>
			        <label class="white-text">Select University</label>
			        <select name="uni" class="uholder">
				        <option value="0" selected>All Universities</option>
                    <?php include 'university-pop.php' ?>
			        </select>
			        <label class="white-text">Organization</label>
			        <select name="rso" class="oholder">
				        <option value="0" selected>All Organizations</option>
                    <?php include 'rso-pop.php' ?>
			        </select>
				</div>
				<div class="divider"></div>
                  <script>
                     $('.uholder').change(function() {
                        document.getElementById("unilist").submit();
                     });
                     $('.oholder').change(function() {
                        document.getElementById("unilist").submit();
                     });
                  </script>
            </form>
		</div><div class="col s12 m8"><?php

		for ($i = 0; $i < count($events); $i++)
		{
			echo('<div class="card white darken-1"><div class="card-image">');
			echo('<img src="http://maps.googleapis.com/maps/api/staticmap?center=University+of+South+Florida&zoom=14&size=700x150&sensor=false"/>');
			echo('</div><div class="card-content black-text"><span class="card-title black-text">'. $events[$i]['name'] .'</span>');
			echo('<p class="truncate">'. $events[$i]['description'] .'</p><p class="grey-text">'. date("l, d/m/Y", strtotime($events[$i]['sdate'])) .'</p>');
			echo('<p class="grey-text">'. $events[$i]['address'] .'</p></div><div class="card-action">');
			echo('<a href="event.php?eid='. $events[$i]['eid'] .'">View Event</a></div></div>');
		}
		?></div> <!-- <a href="#">RSVP</a> -->
<?php include 'footer.php';?>
