<?php

include("./config.php");
$result = null;

if((!isset($_GET) || $_GET==null) || !is_numeric($_GET['howMany']) || !is_numeric($_GET['from']))
{
    $limit = 4;
    $result = mysqli_query(
    $con,
    "SELECT posts.id as id, posts.title as title, posts.body as body, users.name as author, DATE_FORMAT(posts.created,'%d-%b-%Y') as created"
    ." FROM posts"
    ." JOIN users ON posts.author = users.id"
    ." ORDER BY posts.created DESC"
    ." LIMIT $limit"
  );
}
else
{
    $limit = $_GET['howMany'];
    $last = $_GET['from'];
    $result = mysqli_query(
    $con,
    "SELECT posts.id as id, posts.title as title, posts.body as body, users.name as author, DATE_FORMAT(posts.created,'%d-%b-%Y') as created"
    ." FROM posts"
    ." JOIN users ON posts.author = users.id"
    ." ORDER BY posts.created DESC"
    ." LIMIT $last, $limit"
  );
}
$array = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	array_push($array,$row);
}
//die(var_dump($array));
echo json_encode($array);
?>