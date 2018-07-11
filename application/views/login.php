<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/PengembanganWeb/Pinjambuku/index.php/welcome/verify");
}
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>

    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/signin.css');?>" rel="stylesheet">

  </head>

  <body>

    <div class="container">

    <div class="form-signin">
        <?php echo form_open('welcome/verify'); ?>
        <h2 class="form-signin-heading">Sign in as Student</h2>
        <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <br/><br/><br/>
        <center>Not Registered? <a href="<?php echo site_url('welcome/signup')?>">Register Now</a></center>
        <center>Forgot your Password?<a href="<?php echo site_url('welcome/resetpwd')?>">Reset Here!</a></center>
        <center>Not a Student? Use <a href="<?php echo site_url('welcome/login_admin')?>">Admin Login</a></center>
      </form>
    </div>
    </div>
  </body>
</html>
