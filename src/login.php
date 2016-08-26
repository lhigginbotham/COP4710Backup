<?php $pageTitle="Login"; include 'header.php';?>
	<div class="container">
		<div class="row">
			<div class="large">
				<div class="card white darken-1">
					<div class="card-content cyan-text">
						<span class="card-title cyan-text">Login</span>
						<form name="formlogin" id="formlogin" method="POST">
							<div class="row">
								<div class="input-field col s12">
									<input id="email" name="email" type="email" class="validate">
									<label for="email">Email</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="password" name="password" type="password" class="validate">
									<label for="password">Password</label>
								</div>
							</div>
							<div class="row">
								<div class="col offset-s.5 grid-example">
								<button class="btn waves-effect waves-light" type="submit" name="action">Submit
									<i class="mdi-content-send right"></i>
								</button>
								</div>
							</div>
						</form>
						<div class="card-action">
							<a href="signup.php">Sign Up</a>
							<a class="right" href='#'>Forgot Password?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">		
			//callback handler for form submit
			$("#formlogin").submit(function(e)
			{
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				var successMes = $('<div class="row"><h2 class="center">Account Created!</h2></div><div class="row"><div class="col offset-s5 grid-example"><a class="waves-effect waves-light btn white-text">Login<i class="mdi-content-send right"></i></a></div></div>')
				$.ajax(
				{
					type: "POST",
					url : "login-processor.php",
					data : postData,
					success:function(data, textStatus, jqXHR) 
					{
						console.log(data);
						console.log("Success!");
						window.location = "index.php"
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						console.log(jqXHR);
						console.log(textStatus);
						console.log(errorThrown);
						//if fails      
					}
				});
				e.preventDefault(); //STOP default action
				// e.unbind(); //unbind. to stop multiple form submit.
			});

	</script>
<?php include 'footer.php';?>
