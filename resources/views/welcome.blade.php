<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    

    <title>CV. TITA JAYA</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

      <!-- navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="#home" class="navbar-brand page-scroll">CV. TITA JAYA</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#about" class="page-scroll">About</a></li>
                <li><a href="#portfolio" class="page-scroll">Products</a></li>
                <li><a href="#contact" class="page-scroll">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>Login<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.login') }}">As Admin</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">As Owner</a>
                        </li>
                    </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- akhir navbar -->


   
    <!-- jumbotron -->
    <div class="jumbotron text-center page-scroll">
      <img src="img/logo.png">
      <h1>CV. TITA JAYA</h1>

      <p>Gorden | Wallpaper | Blinds | Jasa Pemasangan</p>
    </div>
    <!-- akhir jumbotron -->

    <!-- about -->
      <section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>About</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-2 ">
              <p class="pKiri text-justify">Tita Jaya Interior adalah perusahaan yang bergerak dibidang Jasa Interior yang berdiri sejak tahun 2010. Tita Jaya Interior berlokasi di Tawangsari Permai Blok.A No.20 Taman, Sidoarjo.</p>
            </div>
            <div class="col-sm-4">
              <p class="pKanan text-justify">Produk yang dijual berupa Gorden, Wallpaper, dan Blinds beserta jasa nya yang meliputi pembuatan dan pemasangan. Motto dari perusahaan kami yaitu mengutamakan kepercayaan dan kepuasan pelanggan.</p>
            </div>
          </div>
        </div>
      </section>
    <!-- akhir about -->

    <!-- portfolio -->
      <section class="portfolio" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Products</h2>
              <hr>
            </div>
          </div>
        <div class="row">
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/blinds1.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/blinds2.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/blinds3.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/blinds4.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/wallpaper1.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/wallpaper2.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/wallpaper3.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/wallpaper4.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/gorden1.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/gorden2.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/gorden3.jpg">
            </a>
          </div>
          <div class="col-sm-3">
            <a class="thumbnail">
              <img src="img/gorden4.jpg">
            </a>
          </div>
        </div>
      </div>
      </section>
    <!-- akhir portfolio -->

    <!-- contact -->
      <section class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Contact</h2>
              <hr>
            </div>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 ">
                <div class="list-group">
                  <a class="list-group-item active text-center">
                    CV. TITA JAYA
                  </a>
                  <a class="list-group-item">Telp     : 081 3340 98 907 / 081 7090 1927</a>
                  <a class="list-group-item">Email    : titajayaa@gmail.com</a>
                  <a class="list-group-item">Alamat   : Tawangsari Permai Blok.A No.20 , Taman, Sidoarjo</a>
                  <a class="list-group-item">Kode pos : 61257</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- akhir contact -->

    <!-- footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; copyright 2019 | Build by Busite</a></p>
          </div>
        </div>
      </div>
    </footer>
      
    <!-- Akhir footer -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/script.js"></script>
  </body>
</html>