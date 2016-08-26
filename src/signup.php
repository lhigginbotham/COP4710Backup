<?php $pageTitle = "Sign Up"; include 'header.php';?>
	<div class="container">
		<div class="row">
			<div class="large">
				<div class="card white darken-1">
					<div class="card-content cyan-text">
						<span class="card-title cyan-text">Sign Up</span>
						<form name="signup" id="signup" class="fholder" method="POST">
							<div class="row">
								<div class="input-field col s6">
									<input id="first_name" name="first_name" type="text" class="validate">
									<label for="first_name">First Name</label>
								</div>
								<div class="input-field col s6">
									<input id="last_name" name="last_name" type="text" class="validate">
									<label for="last_name">Last Name</label>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<label>Select University</label>
									<select name="university">
										<option value="" disabled selected> Choose your University</option>
										<?php include 'university-pop.php' ?>
									</select>
								</div>
							</div>
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
								<div class="input-field col s12">
									<input id="cpassword" name="cpassword" type="password" class="validate">
									<label for="cpassword">Confirm Password</label>
								</div>
							</div>
							<div class="row">
								<div class="col offset-s.5 grid-example">
								<button class="btn waves-effect waves-light" id="submit" name="action">Submit
									<i class="mdi-content-send right"></i>
								</button>
								</div>
							</div>
						</form>
						<div class="card-action">
							<a href="login.php">Already a Member? Login!</a>
							<a class="right" href='#'>Forgot Password?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">		
		
			//callback handler for form submit
			$("#signup").submit(function(e)
			{			
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				var successMes = $('<div class="row"><h2 class="center">Account Created!</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="login.php">Login<i class="mdi-content-send right"></i></a></div>')
				$.ajax(
				{
					type: "POST",
					url : "signup-processor.php",
					data : postData,
					success:function(data, textStatus, jqXHR) 
					{
						console.log(data);
						$(".card").fadeOut( "slow", function() {
							// Animation complete.
							$(".fholder").replaceWith(successMes);
							
							$(".card").fadeIn("slow", function(){
							
							});
						});
						//$(".card").append($successMes);
						$("form.fholder").fadeIn("slow", function(){
							
						});
						//data: return data from server
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						console.log(jqXHR);
						//if fails      
					}
				});
				e.preventDefault(); //STOP default action
				// e.unbind(); //unbind. to stop multiple form submit.
			});

	</script>
<?php include 'footer.php';?>
