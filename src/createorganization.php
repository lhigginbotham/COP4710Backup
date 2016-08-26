<?php $pageTitle = "Create an Organization"; include 'header.php';?>
	<div class="container">
		<div class="row">
			<div class="large">
				<div class="card white darken-1">
					<div class="card-content cyan-text">
						<span class="card-title cyan-text">Create an Organization</span>
						<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
							<form name="create_org" id="create_org" class="fholder" method="POST">
								<div class="row">
									<div class="input-field col s12">
										<input id="org_name" name="org_name" type="text" class="validate" length="255">
										<label for="org_name">Organization Name</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<textarea id="org_description" name="org_description" class="materialize-textarea" length="2000"></textarea>
										<label for="org_description">Organization Description</label>
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
										<p>Organization Type</p>
										<p>
											<input name="org_type" type="radio" id="org_type_1" value="1">
											<label for="org_type_1">Academic</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_2" value="2">
											<label for="org_type_2">Creative Arts</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_3" value="3">
											<label for="org_type_3">Cultural/Ethnic/International</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_4" value="4">
											<label for="org_type_4">Greek-Social</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_5" value="5">
											<label for="org_type_5">Honorary</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_6" value="6">
											<label for="org_type_6">Religious/Spiritual</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_7" value="7">
											<label for="org_type_7">Sports/Recreation</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_8" value="8">
											<label for="org_type_8">Service</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_9" value="9">
											<label for="org_type_9">Special Interest</label>
										</p>
										<p>
											<input name="org_type" type="radio" id="org_type_10" value="10">
											<label for="org_type_10">Social/Political Awareness</label>
										</p>
									</div>
								</div>
								<?php if(isset($_SESSION['email']))
									{
										$email = $_SESSION['email'];
										echo '<div class="row">
											<div class="input-field col s12">
													<input type="email" id="admin_email" name="admin_email" class="validate" length="255" value="'.$email.'" readonly>
													<label for="admin_email">Admin Email</label>
											</div>
										</div>';
									}
								?>
								<div class="row">
									<div class="input-field col s12">
											<textarea id="founders_emails" name="founders_emails" class="materialize-textarea"></textarea>
											<label for="founders_emails">Enter Four Founder Emails - One Per Line</label>
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
						<?php } else { ?>
							<h5>You must be logged in to create an organization!</h5>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	
			//callback handler for form submit
			$("#create_org").submit(function(e)
			{
			
				var admin_email_domain = $('#admin_email').val().split('@').slice(1);
				var emails = $('#founders_emails').val().split('\n');
				var matches = 0;
				
				for(var i = 0; i < 4; i++)
				{
					var domain = emails[i].split('@').slice(1);
					if(domain[0] == admin_email_domain)
						matches++;
				}
				
				if(matches != 4) {
					alert("Founders must use the same domain as admin (@"+admin_email_domain+")")
				} else {
					
					var postData = $(this).serializeArray();
					var formURL = $(this).attr("action");
					var successMes = $('<div class="row"><h2 class="center">Organization Created!</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="#">Manage Organization<i class="mdi-content-send right"></i></a></div>')
					
					$.ajax(
					{
						type: "POST",
						url : "createorganization-processor.php",
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
				}
			});

	</script>

<?php include 'footer.php';?>
