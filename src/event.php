<?php
   $pageTitle = "Event";
   $eventID = $_GET["eid"];

   include 'header.php';
   require_once 'database_connect.php';

   $stmt = $pdo->prepare("SELECT * FROM events WHERE eid=:e");
   $stmt->execute(array(':e' => $eventID));
   $event = $stmt->fetch();

   function catString($event)
   {
     if ($event['category'] == 1) return "Arts and Music";
     if ($event['category'] == 2) return "Athletics";
     if ($event['category'] == 3) return "Cultural";
     if ($event['category'] == 4) return "Fund Raising";
     if ($event['category'] == 5) return "Learning";
     if ($event['category'] == 6) return "Community Service";
     if ($event['category'] == 7) return "Spirituality";
   }
?>
<div class="container">
<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<div class="row event">
		<div class="col s12 m4">
			<div class="event-details">
				<h5 class="white-text">Details</h5>
				<div class="white-text valign-wrapper event-date"><i class="small mdi-action-event"></i>
					<p><i class="mdi-av-play-arrow"></i><?php echo date("l, d/m/Y", strtotime($event['sdate'])) ?><br />
					<i class="mdi-av-stop"></i><?php echo date("l, d/m/Y", strtotime($event['edate'])) ?></p>
				</div>
				<p class="white-text valign-wrapper event-time"><i class="small mdi-device-access-time"></i><?php echo date("h:m A", strtotime($event['stime'])) ?> to <?php echo date("h:m A", strtotime($event['etime'])) ?></p>
				<p class="white-text valign-wrapper"><i class="small mdi-maps-place"></i><?php echo $event['address'] ?></p>
				<p class="white-text valign-wrapper"><i class="small mdi-communication-phone"></i><?php echo $event['phone'] ?></p>
				<p class="white-text valign-wrapper"><i class="small mdi-action-view-module"></i><?php echo catString($event) ?></p>
			</div>
		</div>
		<div class="col s12 m8">
			<h4 class="white-text"><?php echo $event['name'] ?></h4>
			<div class="card white darken-1 event-main">
				<div class="card-image">
					<h5 class="valign-wrapper"><i class="small mdi-maps-map"></i>Map</h5>
					<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $event['address'] ?>&key=AIzaSyA003Yr1FA8mVsoDk_m0dVm_T781huywX4"></iframe>
				</div>
				<div class="card-content black-text">
					<h5 class="valign-wrapper"><i class="small mdi-action-subject"></i>Description</h5>
					<p>
						<?php echo $event['description'] ?>
					</p>
					<div class="fb-share-button" <?php $eid = $_GET["eid"]; echo ('data-href="http://localhost/cop4710/src/event.php?eid='.$eid.'"')?> data-layout="button_count"></div>
					<h5 class="valign-wrapper"><i class="small mdi-communication-message"></i>Comments</h5>
					<ul class="collection"><?php

          $stmt = $pdo->prepare("SELECT * FROM comments WHERE eid=:e");
          $stmt->execute(array(':e' => $eventID));
          $comm = $stmt->fetchAll();

          for ($i = 0; $i < count($comm); $i++)
          {
            echo('<li class="collection-item avatar comment">');
						echo('<i class="mdi-social-person circle cyan"></i>');
						echo('<span class="title">'. $comm[$i]['email'] .'</span>');
						echo('<p>'. $comm[$i]['body'] .'</p>');
						echo('<a href="#!" class="secondary-content">');

            for ($j = 0; $j < $comm[$i]['rating']; $j++)
              echo('<i class="mdi-action-grade"></i>');

            echo('</a></li>');
          }

					?></ul>
					<form id="create_comment" action="createcomment-processor.php" method="POST">
						<div class="row">
							<div class="input-field col s12">
								<i class="mdi-editor-mode-edit prefix"></i>
								<textarea id="comment_text" name="comment_text" class="materialize-textarea"></textarea>
								<label for="comment_text">Comment</label>
							</div>
							<div class="input-field col s12">
								<p>How would you rate this event? (optional)</p>
								<p>
									<input name="rating" type="radio" id="rating_1" value="1">
									<label for="rating_1">1</label>
									<input name="rating" type="radio" id="rating_2" value="2">
									<label for="rating_2">2</label>
									<input name="rating" type="radio" id="rating_3" value="3">
									<label for="rating_3">3</label>
									<input name="rating" type="radio" id="rating_4" value="4">
									<label for="rating_4">4</label>
									<input name="rating" type="radio" id="rating_5" value="5">
									<label for="rating_5">5</label>
                  <input name="eid" type="hidden" value="<?php echo $event['eid'] ?>">
								</p>
							</div>
						</div>

						<button class="btn waves-effect waves-light right" type="submit" name="action">Comment
							<i class="mdi-content-send right"></i>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
