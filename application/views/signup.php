<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up</title>
      
      
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/signin.css');?>" rel="stylesheet">
    
      
  </head>

  <body>
    <div class="container">

      <form class="form-signin" action="<?php echo site_url('welcome/add')?>" method="POST">
        <h2 class="form-signin-heading">Sign up as Student</h2>
        <input name="email_st" type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus >
        <input type="password" name="pwd_st" id="inputPassword" class="form-control" placeholder="Password" required>
        <center><div id="show_flash_msg" style="color:red;"><?php echo $this->session->flashdata('msg'); ?></div></center></br>
        <button class="btn btn-lg btn-primary btn-block btn-success" type="submit" >Sign Up</button>
        <br/><br/><br/>
      </form>
        <center>Already Registered? <a href="<?php echo site_url('welcome/login')?>">Sign In</a></center>

    </div> <!-- /container -->

  </body>
</html>