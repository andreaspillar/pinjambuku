<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$password = ($this->session->userdata['logged_in']['password']);
} else {
header("location: login");
}
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Entri Buku</title>
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-min.js');?>"></script>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/dashboard.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/theme.css');?>" rel="stylesheet">
    <style>
        .navbar {
            background-color: dodgerblue;
        }
        a {
            color: #000;
        }
        .black
        {
            color: black !important;
        }
        .active
        {
            background-color: darkorange;
        }
        tr:hover {background-color: #a4a4a4;}
        th
        {
            background-color: #4CAF50;
            color: white;
        }
        .btn-success
        {
            background-color: chartreuse;
            color: black !important;
            border: none;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
        .active a
        {
          border-bottom: 3px solid #ffe400;
          background-color: #ffe400 !important;
          color: black !important;
        }
        .sidebar{
/*            background-color: #b5b5b5 !important;*/
            background: dodgerblue; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(#1e90ff, #010c17); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(#1e90ff, #010c17); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(#1e90ff, #010c17); /* For Firefox 3.6 to 15 */
            background: linear-gradient(#1e90ff, #010c17); /* Standard syntax */
        }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand black" href="#">Readable</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="black" href="logout">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="hom_admin">Daftar Buku <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row placeholders">
              <form action="<?php echo site_url('welcome/addbuk')?>" method="POST">
                <h2 class="form-signin-heading">Tambah Buku</h2>
                <input name="ISBN" type="text" id="inputISBN" class="form-control " placeholder="ISBN" autofocus >
                <span id="ISBNres"></span><br/>
                <input type="text" name="judul_buku" id="inputJudul" class="form-control" placeholder="Judul Buku" ><br/>
                <input name="pengarang" type="text" id="inputPengarang" class="form-control" placeholder="Pengarang" >
                <span id="judpenres"></span><br/>
                <input type="text" name="penerbit" id="inputPenerbit" class="form-control" placeholder="Penerbit" ><br/>
                <input name="jenis" type="text" id="inputJenis" class="form-control" placeholder="Jenis Buku" ><br/><br/><br/><br/>
                <button class="btn btn-lg btn-primary btn-block btn-success" type="submit" >Terapkan</button>
                <br/><br/><br/>
              </form>
        </div>
      </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
      $('#inputISBN').keyup(function(){
      var username = $('#inputISBN').val();
      if(username != ''){
        $.ajax({
          url: "<?php echo base_url();?>index.php/welcome/checkISBN",
          method: "POST",
          data: {username:username},
          success: function(data){
            $('#ISBNres').html(data);
     }
    });
   }
  });
//selesai
 });
</script>
<script>
    $(document).ready(function(){
    $('#inputPengarang').keyup(function(){
    var judul_buku = $('#inputJudul').val();
    var pengarang = $('#inputPengarang').val();
    if(pengarang != ''){
      $.ajax({
        url: "<?php echo base_url();?>index.php/welcome/checkAuthT",
        method: "POST",
        data: {pengarang:pengarang,
               judul_buku:judul_buku},
        success: function(data){
          $('#judpenres').html(data);
    }
    });
    }
    });
    });
</script>
    </body>
</html>
