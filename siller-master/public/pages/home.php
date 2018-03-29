<?php
if (__FILE__ == realpath($_SERVER['SCRIPT_FILENAME'])) {
	http_response_code(404);
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Project Siller</title>
	<?php require_once('../inc/dynamic/header.php'); ?>
	<link rel="stylesheet" href="https://siller.io/assets/css/guest.css">
</head>
<body id="home">
	<div class="section section-hero bg-gray">
		<div class="grid-hero container grid-lg text-center">
			<img class="img-responsive logo" src="https://siller.io/assets/image/logo.png" alt="Siller.io Full Logo">
			<h1>Project Siller</h1>
			<h2>World's Most Advanced FRC Scouting Platform</h2>
			<p>
				<a href="https://siller.io/request" class="btn btn-primary btn-lg" disabled>Request Access</a>
				<a href="https://sillerio.slack.com" class="btn btn-primary btn-lg">Join our Slack!</a>
			</p>
			<p class="text-gray">Version: <span class="version">Early Beta</span></p>
			<div class="columns">
				<div class="column col-4 col-xs-12">
					<div class="card text-center">
						<div class="card-header">
							<span class="card-title">Simple</span>
						</div>
						<div class="card-body">
							Every single event data preloaded and ready for use. Just type in the match number to start!
						</div>
					</div>
				</div>
				<div class="column col-4 col-xs-12">
					<div class="card text-center">
						<div class="card-header">
							<span class="card-title">Real Time</span>
						</div>
						<div class="card-body">
							Scores and scouting data updates in real time, giving you an edge against your opponents
						</div>
					</div>
				</div>
				<div class="column col-4 col-xs-12">
					<div class="card text-center">
						<div class="card-header">
							<span class="card-title">Cooperate</span>
						</div>
						<div class="card-body">
							Built in event based live chat, team collaboration, data sharing, access to public scouting data from other teams
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section section-features bg-primary text-light text-center">
		<div class="container grid-lg">
			<h2>Where is the platform?</h2>
			<div class="columns">
				<div class="column col-10 col-sm-12 col-mx-auto">
					<p class="text-secondary">We are currently getting ready to launch our platform for early beta for the upcoming season.<br>The platform will be available to any team at any event around the world.<br>There will be native applications for Windows, MacOS, Android, IOS.</p>
				</div>
				<div class="column col-10 col-sm-12 col-mx-auto">
					<a href="https://siller.io/request" class="btn btn-lg" disabled>Request Early Beta Access</a>
				</div>
			</div>
		</div>
	</div>
<?php require_once('../inc/dynamic/footer.php'); ?>
</body>
</html>