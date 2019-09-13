<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Pixel Quark</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Erik Morelli">
  <meta name="description" content="Practicing CMS development with a simple blog">

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
        <a href="#">
          <img id="menu" src="assets/menu.png" alt="">
        </a>
      </li>
    </ul>
  </div>

</div>

<!-- ===== NAV SOCIAL START ===== -->
<!-- <div class="d-flex p-2 bd-highlight">
<div class="nav-social">
    <a href="">
      <img class="social-icon" src="assets/twitter.svg" alt="">
    </a>

    <a href="">
      <img class="social-icon" src="assets/github.svg" alt="">
    </a>

    <a href="">
      <img class="social-icon" src="assets/rss.svg" alt="">
    </a>

</div>
</div> -->

<!-- ===== CONTENT START ===== -->
<div class="container">
  <div class="row">

      <!-- == CONTENT HEADER == -->
      <div class="col-lg-12">
        <div class="header-content">
          <span>Recent Articles</span>
        </div><hr>
      </div>

      <!-- == POST START == -->
      <div class="col-lg-12">
        <div class="post-header">
          <span class="content-date"><i>September 11, 2019</i></span>
          <h2 class="content-title">This is the title of the post, succint introduction to subject.</h2>
        </div>
      <!-- == POST CONTENT == -->
        <div class="content-post">
          <p class="content-summary">
            Fusce tempus consequat lorem, at iaculis risus vestibulum quis. Phasellus quis efficitur lectus, in dignissim ligula.
            Maecenas finibus leo quis iaculis dapibus. Proin nec nisl ac ante congue accumsan vel suscipit mi. Vestibulum ac tempor libero.
            Morbi sit amet elit odio. Nulla ut pretium nulla.<br><br>
            Fusce tempus consequat lorem, at iaculis risus vestibulum quis. Phasellus quis efficitur lectus, in dignissim ligula.
            Maecenas finibus leo quis iaculis dapibus.
          </p>
        </div>

      <!-- == CONTENT NAVIGATION == -->
        <div class="content-nav">
          <button class="button-read" type="button" name="button">Read more</button>
          <button class="button-git" type="button" name="button">See in Github</button>
          <img class="button-report" src="assets/report.png" alt="Report a bug">
        </div><br>
      </div>

  </div>
</div>


<!-- ===== SCRIPTS ===== -->

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
