<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Findbook</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/cover.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Findbook</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><button type="button" class="btn btn-lg btn-success" onclick="location.href='<?php echo site_url('welcome/login')?>'">Student Login</button></li> 
                
                  <li>
                      <button type="button" class="btn btn-lg btn-info" type="submit" onclick="location.href='<?php echo site_url('welcome/signup')?>'">Sign Up</button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">The # 1</h1>
            <p class="lead">Leading Online Library<br/> Choose your favourite books, Hook your books!</p>
            <p class="lead">
              <button type="button" class="btn btn-lg btn-success" onclick="window.location.href='<?php echo site_url('welcome/login')?>'">Login Now</button>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>(C) By <a href="#">Findbook, Inc</a> Created with Love in Indonesia.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  </body>
</html>
