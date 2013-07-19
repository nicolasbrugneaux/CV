<?php

include("./config.php");

  $result = mysqli_query(
  	$con,
  	"SELECT posts.id as id, posts.title as title, posts.body as body, users.name as author, DATE_FORMAT(posts.created,'%d-%b-%Y') as created"
  	." FROM posts"
  	." JOIN users ON posts.author = users.id"
  	." ORDER BY posts.created DESC"
	." LIMIT 10"
  );
  $array = array();
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  	array_push($array,$row);
  }
  //die(var_dump($array));
  echo json_encode($array);
?>