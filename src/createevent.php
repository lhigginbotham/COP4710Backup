<?php $pageTitle = "Create an Event"; include 'header.php';?>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="js/jquery.geocomplete.js"></script>
	
	<div class="container">
		<div class="row">
			<div class="large">
				<div class="card white darken-1">
					<div class="card-content cyan-text">
						<span class="card-title cyan-text">Create an Event</span>
						<form name="create_eve" enctype="multipart/form-data" id="create_eve" class="fholder" method="POST">
							<div class="row">
								<div class="input-field col s12">
									<input id="eve_name" name = "eve_name" type="text" class="validate">
									<label for="eve_name">Event Name</label>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<label>Event Theme</label>
									<select name="eve_theme" class="cyan-text">
										<option value="" disabled selected>Choose your Event Theme</option>
										<option value="1">Arts and Music</option>
										<option value="2">Athletics</option>
										<option value="3">Cultural</option>
										<option value="4">Fund Raising</option>
										<option value="5">Learning</option>
										<option value="6">Community Service</option>
										<option value="7">Spirituality</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
										<textarea id="textarea1" name = "eve_description" class="materialize-textarea"></textarea>
										<label for="textarea1">Event Description</label>
								</div>
							</div>
							<div class="row">
									<div class="input-field col s6">
										<p>Start Date</p>
										<input id="startdate" name ="startdate" type="date" class="datepicker">
									</div>
									<div class="input-field col s6">
										<p>End Date</p>
										<input id="enddate" name = "enddate" type="date" class="datepicker">
									</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input id="starttime" name ="starttime" type="text" class="validate">
									<label for="starttime">Start Time - HH:MM</label>
								</div>
								<div class="input-field col s6">
									<input id="endtime" name = "endtime" type="text" class="validate">
									<label for="endtime">End Time - HH:MM</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="formatted_address" name = "formatted_address" type ="text" value = "">
									<input name="lat" type="hidden" value="">
									<input name="lng" type="hidden" value="">
								</div>
							</div>
							<div class="row">
								<div class="col s6">
									<label>Set Event Visibility</label>
									<select name="visibility" class="cyan-text">
										<option value="1" selected>Public</option>
										<option value="2">University Students Only</option>
										<option value="3">RSO Members Only</option>
										<option value="4">Private</option>
									</select>
								</div>
								<div class="col s6">
									<label>Who Can RSVP</label>
									<select name = "rsvp" class="cyan-text">
										<option value="1" selected>Anyone</option>
										<option value="2">Only University Students</option>
										<option value="3">Only RSO Members</option>
										<option value="4">No One</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s3">
									<input id="phone" name = "phone" type="text" class="validate">
									<label for="phone">Contact Phone #</label>
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
			/*var geocoder;
			var latitude;
			var longitude;
			var latitudeL = null;
			var longitudeL = null;*/
			
			/*function getLatitude() {
				var latitude;
				var address = document.getElementById('address').value;
				geocoder.geocode( {'address': address}, function(results, status) {
					if(status == google.maps.GeocoderStatus.OK) {
						latitude = results[0].geometry.location.lat();
					}
					else {
						alert('Geocode was not successful for the following reason: ' + status);
					}	
				});
				console.log(latitude);
				return latitude;
			}
			
			function getLongitude() {
				var longitude;
				var address = document.getElementById('address').value;
				geocoder.geocode( {'address': address}, function(results, status) {
					if(status == google.maps.GeocoderStatus.OK) {
						longitude = results[0].geometry.location.lng();
					}
					else {
						alert('Geocode was not successful for the following reason: ' + status);
					}	
				});
				console.log(longitude);
				return longitude;
			}*/
			
			/*function initialize() {
				geocoder = new google.maps.Geocoder();
			}
			
			function codeAddress() {
				var address = document.getElementById('address').value;
				geocoder.geocode( {'address': address}, function(results, status) {
					if(status == google.maps.GeocoderStatus.OK) {
						latitude = results[0].geometry.location.lat();
						longitude = results[0].geometry.location.lng();
						alert(latitude + ", " + longitude);
					}
					else {
						alert('Geocode was not successful for the following reason: ' + status);
					}	
				});
			}*/
			
			//google.maps.event.addDomListener(window, 'load', initialize);

			//callback handler for form submit
			$("#formatted_address").geocomplete({ details: "form" });
			$("#create_eve").submit(function(e)
			{
				//var latitudeL;
				//var longitudeL;
				//var longitudeL;
				/*var address = document.getElementById('address').value;
				geocoder.geocode( {'address': address}, function(results, status) {
					if(status == google.maps.GeocoderStatus.OK) {
						latitudeL = results[0].geometry.location.lat();
						longitudeL = results[0].geometry.location.lng();
						//alert(latitudeL + ", " + longitudeL);
						//postData.push({name: 'latitude', value: latitudeL});
						//postData.push({name: 'longitude', value: longitudeL});
					}
					else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				});
				
				while(latitudeL == null && longitudeL == null){
				}
				
				//codeAddress();
				console.log(latitudeL + ", " + longitudeL);*/
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
								
				$.ajax(
				{
					type: "POST",
					url : "createevent-processor.php",
					data : postData, //+ '&latitude=' + latitudeL + '&longitude=' + longitudeL,
					success:function(data, textStatus, jqXHR)
					{
						console.log(data);
						console.log(textStatus);
						console.log(jqXHR);
						$(".card").fadeOut( "slow", function() {
							// Animation complete.
							console.log(data);
							var successMes = '<div class="row"><h2 class="center">Event Created!</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="event.php?eid=' + data + '">View Event<i class="mdi-content-send right"></i></a></div>';
							console.log(successMes);
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
