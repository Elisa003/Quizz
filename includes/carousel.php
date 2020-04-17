<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Test </title>
</head>

<body>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/star-wars.png" class="d-block w-100 h-60" id="carouselimg">
      </div>
      <div class="carousel-item">
        <img src="images/cuisine.png" class="d-block w-100 h-60" id="carouselimg" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/harry-potter.png" class="d-block w-100 h-60" id="carouselimg" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/geographie.png" class="d-block w-100 h-60" id="carouselimg" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- jQuery -->
  <script src="lib/jquery-3.4.1.min.js"></script>
  <!-- Popper -->
  <script src="lib/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- JavaScript Boostrap plugin -->
  <!-- <script src="lib/bootstrap/js/bootstrap.min.js"></script> -->

</body>

</html>