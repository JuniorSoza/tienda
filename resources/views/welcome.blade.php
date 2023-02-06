<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Tienda</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Inicio</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Planes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Ayuda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('home2') }}">Logeo/Registro</a>
          </li>          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Bienvenido, gracias por preferirnos</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">No lo pienses mucho y obten tu plan, con pasos muy sencillos.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Ver servicios</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section" id="about">
    <div class="container">
      <h2 class="text-center mt-0">Te ofrecemos las series, peliculas y novelas en la plataforma que decidas!</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Netfix</h3>            
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#services">Ver precio</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Spotify</h3>            
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#services">Ver precio</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">HBO go</h3>            
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#services">Ver precio</a>
          </div>
        </div>
      </div>
    </div>    
  </section>

  <!-- Services Section -->
  <section class="page-section bg-primary" id="services">
    <div class="container">
      <h2 class="text-center text-white mt-0">Con los mejores planes mensuales</h2>
      <hr class="divider my-4">
      <div class="row">
  <div class="col-lg-4 col-md-6 text-center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title ">Netflix</h4>
        <p class="card-text">Cuenta de 1 mes <br>Tiene acceso para 4 pantallas<br>Garantia por 30 dias<h3> USD $8</h3></p>        
        <a href="#" >Mas planes</a><br>
        <a href="{{ url('home2') }}" class="btn btn-primary btn-xl js-scroll-trigger">Obtener servicio</a>
      </div>
    </div>
  </div>
    <div class="col-lg-4 col-md-6 text-center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title ">Spotify</h4>
        <p class="card-text">Cuenta de 1 mes <br>Tiene acceso para 1 pantalla<br>Garantia por 60 dias<h3>USD $7</h3></p>
        <a href="#" >Mas planes</a><br>
        <a href="{{ url('home2') }}" class="btn btn-primary btn-xl js-scroll-trigger">Obtener servicio</a>        
      </div>
    </div>
  </div>
    <div class="col-lg-4 col-md-6 text-center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title ">HBO go</h4>
        <p class="card-text">Cuenta de 1 mes <br>Tiene acceso para 1 pantalla<br>Garantia por 30 dias<h3>USD $5</h3></p>
        <a href="#" >Mas planes</a><br>
        <a href="{{ url('home2') }}" class="btn btn-primary btn-xl js-scroll-trigger">Obtener servicio</a>        
      </div>
    </div>
  </div>
  </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Banco Guayaquil
              </div>
              <div class="project-name">
                NC 14285347                
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Banco Pichincha
              </div>
              <div class="project-name">
                NC 2203038632
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Banco Pacifico
              </div>
              <div class="project-name">
                NC 1101133274
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Banco Bolivariano
              </div>
              <div class="project-name">
                Cuenta 55555
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Produbanco
              </div>
              <div class="project-name">
                NC 18059163660
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Cooperativa Jep
              </div>
              <div class="project-name">
                Cuenta 55555
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Si presentas inconvenientes llamanos!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Estamos dispuestos a ayudarte en lo que requieras</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>(593) 984000654</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:y-onathan14@hotmail.com">y-onathan14@hotmail.com</a>
        </div>
      </div>
    </div>
  </section>



  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Infotec.ec</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>

