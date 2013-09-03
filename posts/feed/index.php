<?php
include('../../database/config.php');
include('../../util/tokenTruncate.php');

header("Content-Type: application/xml; charset=UTF-8");
$rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
$rssfeed .= '<rss version="2.0">';
$rssfeed .= '<channel>';
$rssfeed .= '<title>RSS Feed of nicolasbrugneaux.me</title>';
$rssfeed .= '<link>http://nicolasbrugneaux.me</link>';
$rssfeed .= '<description>This is the RSS feed of http://nicolasbrugneaux.me, website of a dedicated and ambitous student in Computer Science.</description>';
$rssfeed .= '<language>en-us</language>';
$rssfeed .= '<copyright>2013 nicolasbrugneaux.me</copyright>';


$result = mysqli_query(
$con,
"SELECT posts.id as id, posts.title as title, posts.body as body, users.name as author, DATE_FORMAT(posts.created,'%d-%b-%Y') as created"
." FROM posts"
." JOIN users ON posts.author = users.id"
." ORDER BY posts.created DESC"
);
$array = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$rssfeed .= '<item>';
    $rssfeed .= '<title>' . $row['title'] . '</title>';
    $rssfeed .= '<description>' 
                    . preg_replace('/<[^>]*>/', '', tokenTruncate($row['body'], 200) ) . "..." 
            . '</description>';
    $rssfeed .= '<link>' . 
                    "http://$_SERVER[HTTP_HOST]".'/posts/?id='.$row['id']
             . '</link>';
    $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($row['created'])) . '</pubDate>';
    $rssfeed .= '</item>';
}
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>