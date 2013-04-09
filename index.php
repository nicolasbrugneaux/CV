<!DOCTYPE html>
<html>
<!--

                      _           _     _   _                                       
  _   _  ___  _   _  | | ___  ___| |_  | |_| |__   ___    __ _  __ _ _ __ ___   ___ 
 | | | |/ _ \| | | | | |/ _ \/ __| __| | __| '_ \ / _ \  / _` |/ _` | '_ ` _ \ / _ \
 | |_| | (_) | |_| | | | (_) \__ \ |_  | |_| | | |  __/ | (_| | (_| | | | | | |  __/
  \__, |\___/ \__,_| |_|\___/|___/\__|  \__|_| |_|\___|  \__, |\__,_|_| |_| |_|\___|
  |___/                                                  |___/                      


-->

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Nicolas Brugneaux - CV Online </title>
    <meta name="description" content="Nicolas Brugneaux - CV Online. French and English version are both available. Deux versions, une anglaise et une française sont disponibles" />
    <meta name="keywords" content="css3, typography, styles, letters, creative, effects, transitions, animations, education, skills, nicolas, brugneaux, nicolas brugneaux, cv, resume, currilum vitae, erasmus, student, exchange student, french student, denmark, france" />
    <meta name="author" content="Nicolas Brugneaux" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/style7.css" />
	<link rel="icon" type="image/png" href="images/favicon.ico">
</head>

<body>
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
			<a id="fr" href="./fr"></a>
			<a id="en" href="./en"></a>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.lettering.js"></script>
	<script>
		$(document).ready(function() {
			$("#cs-text").lettering().children('span').wrap('<span />').parent().prepend('<span></span><span></span><span></span>');
		});
	</script>
</script>