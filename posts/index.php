<?php
if(isset($_POST) && $_POST!=null)
{
  
  if(
    @mail( "contact@nicolasbrugneaux.me",
          $_POST['subject'],
          $_POST['message'],
          "From: " . $_POST['email']
    ))
  {
    $_SESSION['flash']['message']="Your message has been successfuly sent.";
    $_SESSION['flash']['success']=1;
  }
  else
  {
    $_SESSION['flash']['message']="An error has occured.";
    $_SESSION['flash']['success']=0;   
  }
}
$post_id = null;
if(isset($_GET) && $_GET!=null && $_GET['id']!=null)
{
  $post_id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nicolas Brugneaux">
    <meta name="description" content="Software Developer and Passionate ICT student charmed by web design and development.">
    <meta name="keywords" content="nicolas brugneaux, nicolasbrugneaux, nicolas, brugneaux, web, design, development, international, student, blog, HTML, CSS, jQuery, JavaScript, CV, curriculum, vitae, curriculum vitae">
    <title>Nicolas Brugneaux</title>

    <!-- Le style -->
    <link href="../css/style.min.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="./js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../ico/favicon.png">
</head>

<body>

  <?php include_once('../pages/nav.html') ?>
  <div class="content">
    <div class="container">
      <div class="notifications">
      <?php
        if(isset($_SESSION) && $_SESSION['flash']!=null)
        {
          ?>
            <div class="alert <?php echo $_SESSION['flash']['success'] ? "alert-success" : "alert-error";?>">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <p><?php echo  $_SESSION['flash']['message']; ?></p>
            </div>
          <?php
          $_SESSION['flash']=null;
        }
        ?>
        <noscript>
          <div class="alert alert-warning">
            <button class="close" type="button" data-dismiss="alert">&times;</button>
            <p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank">instructions how to enable JavaScript in your web browser</a>.</p>
          </div>
        </noscript>
      </div> <!-- /.notifications -->

      <div id="main-content">
        <?php
        if($post_id != null)
        {
          include_once('../database/config.php');
          $result = mysqli_query(
            $con,
            "SELECT posts.id as id, posts.title as title, posts.body as body, users.name as author, DATE_FORMAT(posts.created,'%d-%b-%Y') as created"
            ." FROM posts"
            ." JOIN users ON posts.author = users.id"
            ." WHERE posts.id = $post_id"
          );
          $array = array();
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($array,$row);
          }
          $array = $array[0];
          ?>

          <div class="hero-unit">
            <h1><?php echo $array['title']; ?></h1>
            <p><b><?php echo $array['author'];?></b>, <i><?php echo $array['created'];?></i></p>
          </div>
          <div class= "posts">
            <div class="well">
              <?php echo $array['body'];?>
            </div>
            <div class="social">
              <?php
              function tokenTruncate($string, $your_desired_width) {
                $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
                $parts_count = count($parts);

                $length = 0;
                $last_part = 0;
                for (; $last_part < $parts_count; ++$last_part) {
                  $length += strlen($parts[$last_part]);
                  if ($length > $your_desired_width) { break; }
                }

                return implode(array_slice($parts, 0, $last_part));
              }
              echo (
                  //FACEBOOK SHARE BUTTON
                  "<div class='pull-right'>"
                  .  "<a class='btn facebook'"
                  .     "href='http://www.facebook.com/sharer.php?s=100"
                  .       "&p[title]=".$array['title']
                  .       "&p[summary]=". tokenTruncate($array['body'], 100) . "..."
                  .       "&p[url]="."http://nicolasbrugneaux.me/posts/?id=".$array['id']."'"
                  //.       "&p[images[0]]="
                  .     " target='_blank'>"
                  .     "<span data-icon='&#xe164;'> </span>"
                  .     " Share"
                  .   "</a> "
                  //TWEET BUTTON
                    .   " <a class='btn twitter'"
                    .     "href='https://twitter.com/share"
                    .     "?url="."http://nicolasbrugneaux.me/posts/?id=".$array['id']
                    .     "&via=nicolasbrugneaux.me"
                    .     "&text=".$array['title']." -'"
                    .     " target='_blank'>"
                    .     "<span data-icon='&#xe169;'> </span> Tweet"
                    .   "</a>"
                    ."</div>"
                    );
              ?>
            </div>
          </div>
        </div>
        <?php
        }
        else
        {
          header("Location: /#blog");
          exit;
        }
        ?>

    </div> <!-- /container -->
  </div> <!-- /content -->

  <hr>

  <?php include_once('../pages/footer.html') ?>

  <!-- Le javascript
  ================================================== -->
  <script src="../js/jquery.1.10.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery-ui-1.10.3.min.js"></script>
  <script src="../js/linkify.min.js"></script>
  <script src="../js/blogify.min.js"></script>
  <script src="../js/pages.min.js"></script>
  <script src="../js/notifications.min.js"></script>
  <script src="../js/googleAnalytics.min.js"></script>

</body>
</html>