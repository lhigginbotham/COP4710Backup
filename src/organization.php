<?php 
	$pageTitle = "Organization";
	$orgID = $_GET["oid"];
	
	include 'header.php';
	require_once 'database_connect.php';

    $stmt = $pdo->prepare("SELECT * FROM organizations WHERE oid=:e");
    $stmt->execute(array(':e' => $orgID));
	$organization = $stmt->fetch();
	
	function catString($organization)
    {
		if ($organization['otype'] == 0) return "N/A";
		if ($organization['otype'] == 1) return "Academic";
		if ($organization['otype'] == 2) return "Creative Arts";
		if ($organization['otype'] == 3) return "Cultural/Ethnic/International";
		if ($organization['otype'] == 4) return "Greek-Social";
		if ($organization['otype'] == 5) return "Honorary";
		if ($organization['otype'] == 6) return "Religious/Spiritual";
		if ($organization['otype'] == 7) return "Sports/Recreation";
		if ($organization['otype'] == 8) return "Service";
		if ($organization['otype'] == 9) return "Special Interest";
		if ($organization['otype'] == 10) return "Social/Political Awareness";
    }
?>
<div class="container">
	<form id="join_organization" name="join_organization" action="joinOrganization-processor.php" +  method="POST">
	<div class="row">
		<div class="col s9 grid-example">
			<div class="card white darken-1">
				<div class="card-content cyan-text">
					<span class="card-title cyan-text"><?php echo $organization['name'];?></span>
					<br>
					<p><?php echo $organization['description'];?></p>
					<br>
					<p>Organization Type: <?php echo catString($organization);?></p>
					<br>
					<p>Administrator Email: <?php echo $organization['email'];?></p>
					<br>
					<button class="btn waves-effect waves-light left" type="submit" name="action"><i class="mdi-social-group-add right white-text"></i>Register</a>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

<script type="text/javascript">
	$("#join_organization").submit(function(e)
	{
		//var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		var successMes = $('<div class="row"><h2 class="center">Organization Joined</h2></div><div class="center"><a class="waves-effect waves-light btn white-text" href="organization.php?oid=<?php echo $orgID?>">View Organization<i class="mdi-content-send right"></i></a></div>')
		$.ajax(
		{
			type: "POST",
			url : "joinOrganization-processor.php?oid=<?php echo $orgID?>",
			success:function(textStatus, jqXHR)
			{
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
