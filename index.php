<?php
if(isset($_GET['en']) || isset($_GET['fr']))
	$path = "cv.php";
else
	$path ="home.php";
include_once('./includes/'.$path);
?>