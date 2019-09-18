<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Pixel Quark</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Erik Morelli">
  <meta name="description" content="Practicing CMS development with a simple blog">

  <link rel="icon" type="image/png" href="favicon.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css.map">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- ===== HEADER ===== -->
<div class="header">
  <!-- == HEADER LOGO == -->
  <div class="header-title animated">
    <h1>Erik Morelli</h1>
    <p>Webdeveloper @ Pixelquark</p>
  </div>
  <!-- == HEADER MENU == -->
  <div class="header-menu">
    <ul id="navmenu">
      <li><a href="">Webapps</a></li>
      <li><a href="">Github</a></li>
    </ul>
    <ul>
      <li>
          <img id="menu" src="assets/menu.png" alt="">
      </li>
    </ul>
  </div>

</div>


<!-- ===== CONTENT START ===== -->
<div class="container post-container">
  <div class="row">
      <!-- == CONTENT HEADER == -->
      <div class="col-lg-12">
        <div class="header-content">
          <span>Portfolio</span>
        </div><hr>
      </div>
  </div>

  <div class="row panel-container">
    <div class="col-lg-4 panel">
      <img class="card-preview" src="assets/webapp2.png" alt="">

      <div class="buttons">
        <button type="button" class="btn btn-left btn-secondary btn-sm">See Demo</button>
        <button type="button" class="btn btn-right btn-secondary btn-sm">See Github</button>
      </div>
    </div>

    <div class="col-lg-4 panel">
      <img class="card-preview" src="assets/webapp.jpg" alt="">

      <div class="buttons">
        <button type="button" class="btn btn-left btn-secondary btn-sm">See Demo</button>
        <button type="button" class="btn btn-right btn-secondary btn-sm">See Github</button>
      </div>
    </div>

    <div class="col-lg-4 panel">
      <img class="card-preview" src="assets/webapp3.png" alt="">

      <div class="buttons">
        <button type="button" class="btn btn-left btn-secondary btn-sm">See Demo</button>
        <button type="button" class="btn btn-right btn-secondary btn-sm">See Github</button>
      </div>
    </div>

  </div>
</div>


<!-- ===== SCRIPTS ===== -->

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
