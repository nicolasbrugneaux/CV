<?php
if(isset($_POST) && $_POST!=null)
{
  
  try{
    mail( "contact@nicolasbrugneaux.me",
          $_POST['subject'],
          $_POST['message'],
          "From: " . $_POST['email']
    );
    $_SESSION['flash']['message']="Your message has been successfuly sent.";
    $_SESSION['flash']['success']=1;
  }
  catch(Exception $e)
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
    <link href="./css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="./js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="./ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="./ico/favicon.png">
</head>

<body>

  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
       <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="#home" onclick="changePage('home');">Nicolas Brugneaux</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li><a data-icon="&#xe000;" href="#home" id="menu-home" onclick="changePage('home');"></a></li>
            <li></li>
            <li class="dropdown">
              <a href="#" id="menu-about" class="dropdown-toggle" data-toggle="dropdown">
                About 
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#about" onclick="changePage('about');"> About me</a></li>
                  <li><a href="#skills" onclick="changePage('skills');">Skills</a></li>
                </ul>
              </li>
            <li><a href="#contact" id="menu-contact" onclick="changePage('contact');">Contact</a></li>
          </ul>
          <form class="navbar-form pull-right">
             <a class="btn btn-primary" target="_blank" href="./assets/CV.pdf" data-icon="&#xe06c;"> CV</a>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div><!--/navbar -->

  <div class="container">
    <?php
      if(isset($_SESSION) && $_SESSION['flash']!=null)
      {
        ?>
        <div class="notification">
          <div class="alert <?php echo $_SESSION['flash']['success'] ? "alert-success" : "alert-error";?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><?php echo  $_SESSION['flash']['message']; ?></p>
          </div>
        </div> <!-- /.notification -->
        <?php
        $_SESSION['flash']=null;
      }
      ?>
    <div id="main-content">
    </div>

  </div> <!-- /container -->

  <hr>

  <div id="footer">
    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="span2">
            <ul class="unstyled">
              <li>Navigation<li>
              <li><a href="#home" onclick="changePage('home');">Home</a></li>
              <li><a href="#about" onclick="changePage('about');">About</a></li>
              <li><a href="#skills" onclick="changePage('skills');">Skills</a></li>
              <li><a href="#contact" onclick="changePage('contact');">Contact</a></li>
            </ul>
          </div> 
          <div class="span2">
            <ul class="unstyled">
              <li>Social<li>
              <li><a target="_blank" href="https://www.github.com/nicolasbrugneaux">Github</a></li>
              <li><a target="_blank" href="https://www.twitter.com/nbrugneaux">Twitter</a></li>
              <li><a target="_blank" href="https://www.facebook.com/nicolas.brugneaux">Facebook</a></li>
              <li><a target="_blank" href="https://plus.google.com/113934921579560371005/">Google +</a></li>
            </ul>
          </div>          
        </div>
      </div> <!-- /.row-fluid -->
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="span4">
            <p class="muted">© 2013 Nicolas Brugneaux.</p>
          </div>
        </div>
      </div> <!-- /.row-fluid -->
    </div> <!-- /.container -->
  </div> <!-- /footer -->

  <!-- Le javascript
  ================================================== -->
  <script src="./js/jquery.1.10.1.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/jquery-ui-1.10.3.min.js"></script>
  <script src="./js/pages.js"></script>
  <script src="./js/notifications.js"></script>
  <script src="./js/googleAnalytics.js"></script>

</body>
</html>