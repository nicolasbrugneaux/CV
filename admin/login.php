<?php

ob_start();
session_start();
include("../database/config.php");
// username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$result = null;
    $result = mysqli_query(
    $con,
    "SELECT *"
    ." FROM users"
    ." WHERE username='$username' AND password='$password'"
  );
$array = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	array_push($array,$row);
}
// If result matched $username and $password, table row must be 1 row

if(sizeof($array)==1){
	// Register $username, $password and redirect to file "login_success.php"
	$_SESSION['login']['username'] = $username;
	$_SESSION['login']['password'] = $password;
	$_SESSION['login']['name'] = $array[0]['name'];
	$_SESSION['login']['remember'] = $_POST['remember']==1;
	$_SESSION['flash']['message']="You have successfully loggued in.";
  	$_SESSION['flash']['success']=1;
	header("location:/admin/");
	}
else {
    $_SESSION['flash']['message']="Wrong username and/or password.";
  	$_SESSION['flash']['success']=0;
	header("location:/");
}
ob_end_flush();

?>