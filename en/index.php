<?php
// Setting up some variables...
$personal = array();
$social_media = array();
$work_history = array();
$education = array();
$skills = array();
$awards = array();
$settings = array();
$lang = array();

require_once('config.php');

if (isset($settings['style']) && $settings['style'] == "dark")
{
	$stylesheet = 'dark.css';
}
else if (isset($settings['style']) && $settings['style'] == "light")
{
	$stylesheet = 'light.css';
}
else if (isset($settings['style']) && $settings['style'] == "printable")
{
	$stylesheet = 'printable.css';
}
else
{
	$stylesheet = 'dark.css';
}

if (isset($settings['lang']) && file_exists("lang" . $settings['lang']) . ".php")
{
	$langfile = "lang/" . $settings['lang'] . ".php";
}
else
{
	$langfile = "lang/en.php";
}
require_once($langfile);

?>
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
    <title><?php echo $lang['title']; ?></title>
    <meta name="description" content="Nicolas Brugneaux - Online Resume" />
    <meta name="keywords" content="css3, typography, styles, letters, creative, effects, transitions, animations, education, skills, nicolas, brugneaux, nicolas brugneaux, cv, resume, currilum vitae, erasmus, student, exchange student, french student, denmark, france" />
    <meta name="author" content="Nicolas Brugneaux" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../css/<?php echo $stylesheet; ?>" />
	<link rel="stylesheet" href="../css/printable.css" type="text/css" media="print" />
	<link rel="icon" type="image/png" href="../images/favicon.ico">
</head>
<body>
	<nav>
			<a id="fr" href="../fr"></a>
			<a id="en" href="../en"></a>
			<!--<?php //echo '<a href="javascript:window.print()" >' . $lang['print'] . '</a>'; ?>-->
	</nav>
<!--
	<div id="twitter">
		<a class="twitter-timeline" href="https://twitter.com/Nicolas_Bru_" data-widget-id="299448951831138304">Tweets by @Nicolas_Bru_</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
-->
	<div id="content">
		<div id="header">
			<span class="header_name"><a href=".." ><img title="<?php echo $lang['header'];?>" id="banner" src="../images/header.png" alt="<?php echo $lang['header'];?>"></a></span><br/>
			<span id="resume_subtitle" class="subtitle">
				<?php
				if (isset($personal['phone_number']))
				{
					echo $personal['phone_number'];
				}
				if (isset($personal['phone_number']) && isset($personal['email_address']))
				{
					echo ' | ';
				}
				if (isset($personal['email_address']))
				{
					echo '<a href="mailto:'.$personal['email_address'].'">'.$personal['email_address'].'</a>';
				}
				echo '<a href="CV.pdf"><img title="Download PDF version" id="pdf_logo" src="../images/pdf_logo.png"></a>';
				?>
			</span>
			<span id="print_subtitle">
				<?php
				if (isset($personal['phone_number']))
				{
					echo $personal['phone_number'];
				}
				if (isset($personal['phone_number']) && isset($personal['email_address']))
				{
					echo ' | ';
				}
				if (isset($personal['email_address']))
				{
					echo '<a href="mailto:'.$personal['email_address'].'">'.$personal['email_address'].'</a>';
				}
				echo '<a href="CV.pdf"><img title="Download PDF version" id="pdf_logo" src="../images/pdf_logo.png"></a>';
				?>
			</span>
		</div>
		<div id="left_col">
			
			<div class="item">
				<span class="large_title"><?php echo $lang['career'] ?></span><br />
				<?php for($i=0; $i<count($work_history); $i++) { ?>
					<span class="title"><?php echo $work_history[$i][0]; ?></span><br />
					<span class="subtitle"><?php echo $work_history[$i][1]; ?><br/><?php echo $work_history[$i][2]; ?></span><br />
				<p><?php echo $work_history[$i][3]; ?></p>
			
			<?php } ?>
			</div>
			<div class="item">
				<span class="large_title"><?php echo $lang['contact']; ?></span><br />
				<p><?php echo $lang['contact_desc']; ?></p>
				
				<?php if (isset($personal['phone_number'])) { ?>
				<p><span class="title"><?php echo $lang['phone']; ?></span><br />
				<span class="subtitle"></span></p>
				<p><?php echo $personal['phone_number']; ?></p>
				<?php } ?>
				
				<?php if (isset($personal['address'])) { ?>
				<p><span class="title"><?php echo $lang['address']; ?></span><br />
				<span class="subtitle"></span></p>
				<p><?php echo($personal['address']); ?></p>
				<?php } ?>
				
				<?php if (isset($personal['email_address'])) { ?>
				<p><span class="title"><?php echo $lang['email']; ?></span><br />
				<span class="subtitle"></span></p>
				<p><a href="mailto:<?php echo($personal['email_address']); ?>"><?php echo($personal['email_address']); ?></a></p>
				<?php } ?>
				
				<?php if (isset($settings['social_media']) && $settings['social_media'] == true) { ?>
				<p><span class="title"><?php echo $lang['social_media']?></span><br/>
				<?php for($i=0; $i<count($social_media); $i++) { ?>
				<span class="media"><a id="<?php echo $social_media[$i][0]?>" target="_blank" title="<?php echo $social_media[$i][0] ?>" href="<?php echo($social_media[$i][1]); ?>"></a></span>
				<?php } ?>
				</p><br/>
				<?php } ?>
			</div>
		</div>
		<div id="right_col">
			<?php if (isset($settings['education']) && $settings['education'] == true) { ?>
			<div class="item">
				<span class="large_title"><?php echo $lang['education']; ?></span><br />
				<?php for($i=0; $i<count($education); $i++) { ?>
				<p><span class="title"><?php echo $education[$i][0] ?></span><br />
				<?php echo $education[$i][1]; ?>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if (isset($settings['skills']) && $settings['skills'] == true) { ?>
			<div class="item">
				<span class="large_title"><?php echo $lang['skills']; ?></span><br />
				<?php for($i=0; $i<count($skills); $i++) { ?>
				<p><span class="title"><?php echo $skills[$i][0] ?></span><br />
				<?php echo $skills[$i][1]; ?></p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if (isset($settings['interests']) && $settings['interests'] == true) { ?>
			<div class="item">
				<span class="large_title"><?php echo $lang['interests']; ?></span><br />
				<?php for($i=0; $i<count($interests); $i++) { ?>
				<p><span class="title"><?php echo $interests[$i][0]; ?></span><br />
				<?php echo $interests[$i][1]; ?></p>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
		<div id="footer">
			<p>Site created by <a href="mailto:nicolas.brugneaux@gmail.com">Nicolas Brugneaux</a>. Oct-2012.</p>
		</div>
	</div>
</body>

</html>