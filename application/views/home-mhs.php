<!DOCTYPE html>
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
    
    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
      
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/jumbotron-narrow.css');?>" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="board">Peminjaman</a></li>
            <li role="presentation"><a href="logout">Sign-Out</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Findbook</h3>
      </div>

      <div class="jumbotron">
        <h1>Banyak Buku yang Bisa Dipinjam</h1>
        <p class="lead">Berbagai genre, Author, Penerbit, Jumlah Halaman bisa kamu cari di sini!</p>
        <p><a class="btn btn-lg btn-success" href="board" role="button">Cari Buku</a></p>
      </div>
<!-- bagian bawah ini bisa kamu hapus/ buat review buku -->
      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Sirkus Pohon (Andrea Hirata)</h4>
          <p>Novel Sirkus Pohon ini juga mengangkat kisah percintaan Tegar dan Tara. Perjumpaan pertama mereka yang terjadi di sebuah taman di usia yang masih kanak-kanak meninggalkan kesan mendalam. </p>

          <h4>Winnie the Pooh (A. A. Milne)</h4>
          <p>Winnie the Pooh bukan lagi sosok yang asing di masa kanak-kanak kita. Banyak cerita menarik yang pastinya pernah kita baca atau tonton di tayangan kartun Winnie the Pooh. </p>

        </div>

        <div class="col-lg-6">
          <h4>Smart Millenials (KMPlus Consulting)</h4>
          <p>Apakah kamu merupakan Generasi Milenial? Atau ingin tahu lebih banyak soal Generasi Milenial? Yup, disadari atau tidak saat ini bisa dibilang kalau dunia sudah dikuasai oleh Generasi Milenial.</p>
            
        </div>
      </div>

      <footer class="footer">
        <p>&copy; 2016 Readable, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>