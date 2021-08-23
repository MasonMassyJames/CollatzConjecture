<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="A very simple PHP REST API that provides a Collatz Conjecture (3n+1) sequence from a starting number specified by the user." />
  <meta name="author" content="Massimo Geloni (MMJ)" />
  <title><?php echo $title ?? 'Collatz Conjecture Generator' ?></title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version) -->
  <script src="public/js/font-awesomev5.15.3.js"></script>
  <!-- Jquery -->
  <script src="public/js/jquery-3.6.0.min.js"></script>
  <!-- Sweetalert -->
  <script src="public/js/sweetalert2.min.js"></script>
  <!-- Chart.js -->
  <script src="public/js/chart@3.5.0.js"></script>
  <!-- Hammer.js -->
  <script src="public/js/hammer@2.0.7.js"></script>
  <!-- chart-zoom-plugin -->
<script src="public/js/chartjs-plugin-zoom@1.1.1.js"></script>
  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
  <!-- Sweetalert CSS -->
  <link href="public/css/sweetalert2.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="public/css/styles.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="public/css/custom.css" rel="stylesheet" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="public/assets/img/favicon/favicon.ico" />
  <link rel="shortcut icon" href="public/assets/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="public/assets/img/favicon/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="public/assets/img/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="public/assets/img/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="public/assets/img/favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="public/assets/img/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="public/assets/img/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="public/assets/img/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="public/assets/img/favicon/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="public/assets/img/favicon/apple-touch-icon-180x180.png" />


</head>

<body id="page-top">
  <div class="content">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#page-top">Collatz Conjecture Generator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="home">Calculate</a></li>
            <li class="nav-item"><a class="nav-link" href="what-is-collatz-conjecture">What's Collatz Conjecture</a></li>
            <li class="nav-item"><a class="nav-link" href="about-api">API</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0"><?php echo $headerTitle ?></h1>
          <h2 class="masthead-subheading mb-0"><?php echo $headerSubTitle ?></h2>
        </div>
      </div>
    </header>