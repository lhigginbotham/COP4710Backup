<?php $pageTitle = "Create an University"; include 'header.php';?>
	<div class="container">
		<div class="row">
			<div class="large">
				<div class="card white darken-1">
					<div class="card-content cyan-text">
						<span class="card-title cyan-text">Create an University</span>
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permissions'] == 0) {?>
						<form name="create_uni" id="create_uni" class="fholder" method="POST">
							<div class="row">
								<div class="input-field col s12">
									<input id="uni_name" name="uni_name" type="text" class="validate" length="255">
									<label for="uni_name">University Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="uni_description" name="uni_description" class="materialize-textarea" length="2000"></textarea>
									<label for="uni_description">University Description</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="uni_address" name="uni_address" class="materialize-textarea" length="2000"></textarea>
									<label for="uni_address">University Address</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="number" id="num_pop" name="num_pop" class="validate">
									<label for="num_type">Student Population</label>
								</div>
							</div>
							<?php
							if(isset($_SESSION['email']))
							{
								$email = $_SESSION['email'];
								echo '<div class="row"><div class="input-field col s12"><input type="text" id="admin_email" name="admin_email" class="validate" length="255" value="'.$email.'" readonly><label for="admin_email">Admin Email</label></div>';
							}
							?>
							<!--<div class="row">
								<div class="input-field col s12">
                                        <input type="text" id="admin_email" name="admin_email" class="validate" length="255">
                                        <label for="admin_email">Admin Email</label>
								</div>
							</div> -->
							<div class="row">
								<div class="col offset-s.5 grid-example">
								<button class="btn waves-effect waves-light" type="submit" name="action">Submit
									<i class="mdi-content-send right"></i>
								</button>
								</div>
							</div>
						</form>
						<?php
						}
						else if(isset($_SESSION['permissions']) && $_SESSION['permissions'] == 1)
						{
							echo ('<div class="row"><h2 class="center">Admins Cannot Be Super Admins</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="index.php">Home<i class="mdi-content-send right"></i></a></div>');
						}
						else if(isset($_SESSION['permissions']) && $_SESSION['permissions'] == 2)
						{
							echo ('<div class="row"><h2 class="center">You are already a Super Admin</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="index.php">Home<i class="mdi-content-send right"></i></a></div>');
						}
						else
						{
							echo ('<div class="row"><h2 class="center">You are not logged in!</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="login.php">Login<i class="mdi-content-send right"></i></a></div>');
						}
						
						?>
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
			$("#create_uni").submit(function(e)
			{
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				var successMes = $('<div class="row"><h2 class="center">University Created!</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="index.php">Home<i class="mdi-content-send right"></i></a></div>')
				
				$.ajax(
				{
					type: "POST",
					url : "createuniversity-processor.php",
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