<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost/PengembanganWeb/Pinjambuku/index.php/welcome/verify");
}?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Sign In</title>

    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/signin.css');?>" rel="stylesheet">

  </head>

  <body>

    <div class="container">

    <div class="form-signin">
<!--        <form class="form-signin" action="<?php echo site_url('welcome/verify')?>" method="POST">-->
        <?php echo form_open('welcome/verify_admin'); ?>
        <h2 class="form-signin-heading">Sign in as Admin</h2>
        <input name="username" type="text" id="inputEmail" class="form-control" placeholder="username" required autofocus>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <br/><br/><br/>
        </center>
        <center>Not an Admin? Use <a href="<?php echo site_url('welcome/login')?>">Student Login</a></center>
      </form>
    </div>
    </div> <!-- /container -->

  </body>
</html>