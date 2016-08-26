<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $pageTitle; ?></title>
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Import style.css (override, extra styles etc.)-->
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body class="cyan">
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

	<script type="text/javascript">
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
			$('select').material_select();
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 // Creates a dropdown of 15 years to control year
			});
			$(".dropdown-button").dropdown();
			/*var data = {
				action: 'is_user_logged_in'
			};

			jQuery.post(ajaxurl, data, function(response) {
				if(response == 'yes') {
					console.log("User is logged in!");
				} else {
					// user is not logged in, show login form here
				}
			});*/
		})
	</script>
	<header>
	<nav class="white">
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="createevent.php" class="black-text">Event</a></li>
			<li><a href="createuniversity.php" class="black-text">University</a></li>
			<li><a href="createorganization.php" class="black-text">Organizations</a></li>
		</ul>
		<div class="nav-wrapper">
			<a href="index.php" class="brand-logo center black-text">Evently</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu black-text"></i></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="index.php" class="black-text">Events</a></li>
				<li><a href="organizations.php" class="black-text">Organizations</a></li>
				<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
					<li><a class="dropdown-button black-text" href="#!" data-activates="dropdown1">Create New<i class="mdi-navigation-arrow-drop-down right"></i></a></li>	
					<li><a href="logout.php" class="black-text">Logout</a></li>
				<?php } else { ?>
					<li><a href="login.php" class="black-text">Login</a></li>
				<?php } ?>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="index.php" class="black-text">Events</a></li>
				<li><a href="organizations.php" class="black-text">Organizations</a></li>
				<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
					<li><a class="dropdown-button black-text" href="#!" data-activates="dropdown1">Create New<i class="mdi-navigation-arrow-drop-down right"></i></a></li>	
					<li><a href="createevent.php" class="black-text">Create Event</a></li>
					<li><a href="createuniversity.php" class="black-text">Create University</a></li>
					<li><a href="createorganization.php" class="black-text">Create Organizations</a></li>
					<li><a href="logout.php" class="black-text">Logout</a></li>
				<?php } else { ?>
					<li><a href="login.php" class="black-text">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</nav>
    </header>
	<main>
