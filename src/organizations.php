<?php
	$pageTitle = "Event Selection System";
	include 'header.php';
	require_once 'database_connect.php';

	$stmt = $pdo->prepare("SELECT * FROM organizations");
	$stmt->execute();
	$orgs = $stmt->fetchAll();
?>

<div class="container">
	</div>
		<?php
		for ($i = 0; $i < count($orgs); $i++)
		{
			echo('<div class="col s12 m8 organizations"><div class="card white darken-1"><div class="card-image">');
			echo('</div><div class="card-content black-text"><span class="card-title black-text">'. $orgs[$i]['name'] .'</span>');
			echo('<p class="truncate">'. $orgs[$i]['description'] .'</p><p class="grey-text">'. '</p>');
			echo('<a href="organization.php?oid='. $orgs[$i]['oid'] .'">View Organization</a></div></div></div>');
		}
		?>
	</div>
</div>
<?php include 'footer.php';?>
