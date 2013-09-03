<?php

session_start();
session_destroy();
session_start();
$_SESSION['flash']['message']="You have successfully loggued out.";
$_SESSION['flash']['success']=1;
header("location:/");