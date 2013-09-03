<?php
if(isset($_POST) && $_POST!=null)
{
  if( isset($_POST['username']) && isset($_POST['password']) )
    header("location:/admin/login.php");
}
?>

<div class="login">
  <div id="modal-login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <legend><h2>Sign into </h2></legend>
        <form method="POST" action="/admin/login.php" accept-charset="UTF-8">
            <!--
            <div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">x</a>Incorrect Username or Password!
            </div>
            -->   
            <input class="span3" placeholder="Username" type="text" name="username">
            <input class="span3" placeholder="Password" type="password" name="password"> 
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1"> Remember Me
            </label>
            <button class="btn btn-info" type="submit">Login</button>      
        </form>
    </div> <!-- .modal-body -->
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div><!-- .modal-footer -->
  </div>
</div>