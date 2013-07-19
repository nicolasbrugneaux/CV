<?php

  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "nicolasbrugneaux_blog";

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  $con = mysqli_connect($host,$user,$pass, $databaseName);

// Check connection
if (mysqli_connect_errno($con))
	echo "Failed to connect to MySQL: " . mysqli_connect_error();

?>