<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['email'] . "!";
	if($_SESSION['permissions'] == 1)
	{
		echo("Welcome Admin!");
	}
	else if($_SESSION['permissions'] == 2)
	{
		echo("Welcome Super Admin!");
	}
} else {
    echo "Please log in first to see this page.";
}
?>