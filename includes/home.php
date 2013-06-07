<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Nicolas Brugneaux - CV Online </title>
    <meta name="description" content="Nicolas Brugneaux - CV Online. French and English version are both available. Deux versions, une anglaise et une française sont disponibles" />
    <meta name="keywords" content="css3, typography, styles, letters, creative, effects, transitions, animations, education, skills, nicolas, brugneaux, nicolas brugneaux, cv, resume, currilum vitae, erasmus, student, exchange student, french student, denmark, france" />
    <meta name="author" content="Nicolas Brugneaux" />
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/style7.css" />
</head>

<body>
	<?php include_once("./includes/analyticstracking.php") ?>
	<section class="main">
			<h2 class="cs-text">
					<span>W</span>
					<span>E</span>
					<span>L</span>
					<span>C</span>
					<span>O</span>
					<span>M</span>
					<span>E</span>
					<span></span>
			</h2>
	</section>
	<div id="content">
		<div id="flag">
			<a id="fr" href="./index.php?fr"></a>
			<a id="en" href="./index.php?en"></a>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-1.10.1.min"></script>
	<script type="text/javascript" src="js/jquery.lettering.js"></script>
	<script>
		$(document).ready(function() {
			$("#cs-text").lettering().children('span').wrap('<span />').parent().prepend('<span></span><span></span><span></span>');
		});
	</script>
</body>
</html>