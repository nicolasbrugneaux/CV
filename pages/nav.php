<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
     <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="/">nicolasbrugneaux.me</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li><a data-icon="&#xe000;" href="#home" id="menu-home"></a></li>
          <li class="dropdown">
            <a href="/#" id="menu-about" class="dropdown-toggle" data-toggle="dropdown">
              About 
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="/#about">About me</a></li>
                <li><a href="/#skills">Skills</a></li>
              </ul>
            </li>
          <li><a href="/#contact" id="menu-contact">Contact</a></li>
          <li><a href="/#blog" id="menu-blog">Blog</a></li>
          <li><a href="/posts/feed/" id="menu-feed" target="_blank"><span data-icon="&#xe16C;"></span></a></li>
        </ul>
        <ul class=" nav pull-right">

          <li class="pull-right">
            <form class="pull-right navbar-form" action="/assets/CV.pdf" method="POST">
              <button type="submit" class="btn btn-primary" value=""><span data-icon='&#xe06c;'> CV</span></button>
            </form>
          </li>
          <span class="span1"></span>
          <li>
            <?php
            if( isset($_SESSION) && $_SESSION!=null && isset($_SESSION['login']) && $_SESSION['login']!=null )
            {
            ?>
              <form class="pull-right navbar-form" method="POST" action="/admin/logout.php">
                <input class ="btn" type="submit" value="Logout" id="logout">
              </form>
            <?php
            }
            else
            {
            ?>
              <form class="pull-right navbar-form">
                <a href="#modal-login" role="button" class="btn" data-toggle="modal">Sign in</a>
              </form>
              
            <?php
            }
            ?>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div><!--/navbar -->