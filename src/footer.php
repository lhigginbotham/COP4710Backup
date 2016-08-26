	</main>
	<footer class="page-footer orange darken-2">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Event Management Made Easy!</h5>
					<p class="grey-text text-lighten-4">We make it easy to host events on your campus!</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Links</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="index.php">Events</a></li>
						<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
							<li><a class="grey-text text-lighten-3" href="settings.php">Settings</a></li>
							<li><a class="grey-text text-lighten-3" href="logout.php">Logout</a></li>
						<?php } else { ?>
							<li><a class="grey-text text-lighten-3" href="login.php">Login</a></li>
						<?php } ?>
					</ul>
				</div>
				</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2014 Copyright Text
				<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
			</div>
		</div>
	</footer>
	</body>
</html>