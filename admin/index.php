<?php
session_start();
if(!isset($_SESSION) || $_SESSION == null)
{
	header("location:/403/");
	die();
}
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

  <?php include_once('../pages/nav.php'); include_once('../pages/login.php'); ?>
  <div class="content">
    <div class="container">
      <div class="notifications">
      <?php
        if(isset($_SESSION) && $_SESSION!=null && isset($_SESSION['flash']) && $_SESSION['flash']!=null)
        {
          ?>
            <div class="alert <?php echo $_SESSION['flash']['success'] ? "alert-success" : "alert-error";?>">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <p><?php echo  $_SESSION['flash']['message']; ?></p>
            </div>
          <?php
          unset ($_SESSION['flash'] );
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
			if(isset($_SESSION) && $_SESSION != null)
			{
				if(isset($_SESSION['login']) && $_SESSION['login']!=null && isset($_SESSION['login']["username"]) && isset($_SESSION['login']["password"]) && isset($_SESSION['login']["name"]))
				{
				?>
					<div class="hero-unit"><h1>You are loggued.</h1></div>
					<!-- todo -->
				<?php
				}
			}
			else
			{
				header("location:/403/");
				die();
			}
		?>
      </div>

    </div> <!-- /container -->
  </div> <!-- /content -->

  <hr>

  <?php include_once('../pages/footer.html') ?>

  <!-- Le javascript
  ================================================== -->
  <script src="../js/jquery.1.10.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery-ui-1.10.3.min.js"></script>
  <script src="../js/notifications.min.js"></script>
  <script src="../js/googleAnalytics.min.js"></script>

</body>
</html>