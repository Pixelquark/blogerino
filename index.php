<?php
require __DIR__.'/includes/post.php';
require __DIR__.'/includes/connection.php';

$post = new Post;
$posts = $post->fetch_all();
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Pixelquark</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Erik Morelli">
  <meta name="description" content="Webdeveloper with big ambitions and a minimalistic approach">

  <link rel="icon" type="image/png" href="favicon.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css.map"> -->
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="wrapper">


<!-- ======================== -->
<!-- ===== Header Start ===== -->
<!-- ======================== -->

<div class="header">

  <!-- == Header Logo == -->
  <div class="header-title animated">
    <h1>Erik Morelli</h1>
    <p>Webdeveloper @ Pixelquark</p>
  </div>

  <!-- == Header menu == -->
  <div class="header-menu">

    <!-- == Links == -->
    <ul id="navmenu">
      <li><a href="admin/index.php">
        <?php if (isset($_SESSION['logged_in'])){ ?> Panel <?php } else { ?> Login <?php } ?>
      </a></li>
      <li><a href="https://github.com/Pixelquark">Github</a></li>
    </ul>

    <!-- Menu hamburguer -->
    <ul><li><img id="menu" src="assets/menu.png" alt=""></li></ul>

  </div>

</div>


<!-- ========================= -->
<!-- ===== Content Start ===== -->
<!-- ========================= -->

<!-- == Main Container == -->
<div class="container post-container">

  <!-- == Content Header == -->
  <div class="row">
      <div class="col-lg-12">
        <div class="header-content">
          <span>Portfolio</span>
        </div><hr>
      </div>
  </div>
  <!-- == Content Main == -->
  <div class="row panel-container">

    <!-- Dinamic generated content START -->
    <?php foreach($posts as $post){ ?>
      <div class="col-lg-12 panel">

        <!-- Generate the container, info and image for each post -->
        <div id="img<?php echo $post['post_id'] ?>" class="imgcontainer">
          <div id="info<?php echo $post['post_id'] ?>" class="cardinfo">
            <div class="cardTitle-div">
              <small><?php echo date('F, Y', $post['post_date']) ?></small>
              <h3><?php echo $post['post_title'] ?></h3>
            </div>
            <div class="cardContent-div">
              <p><?php echo $post['post_content'] ?></p>
            </div>
            <div class="cardTags-div">
              <button type="button" class="btn btn-outline-primary btn-sm">HTML</button>
              <button type="button" class="btn btn-outline-warning btn-sm">CSS</button>
              <button type="button" class="btn btn-outline-info btn-sm">JavaScript</button>
            </div>
          </div>
          <img id="card<?php echo $post['post_id'] ?>" class="cardpreview" src="<?php echo $post['post_thumb'] ?>">
        </div>

        <!-- Generate the buttons to access the content outside -->
        <div class="buttons">

          <!-- Get the link for demo page in DB and associate it with the left button-->
          <form id="leftForm" action="<?php echo $post['link_demo'] ?>" method="get" target="_blank" >
            <button type="submit" class="btn1 btn-left btn-secondary btn-sm">
              <span class="linkbutton">See Demo</span>
            </button>
          </form>

          <!-- Get the link for GITHUB page in DB and associate it with the right button -->
          <form id="rightForm" action="<?php echo $post['link_git'] ?>" method="get" target="_blank" >
            <button type="submit" class="btn1 btn-right btn-secondary btn-sm">
              <span class="linkbutton">See Github</span>
            </button>
          </form>

        </div><!-- Button div END -->
      </div><!-- Container div END -->
    <?php } ?>


  </div><!-- Content container div END -->
</div><!-- Main container div END -->


</div><!-- Wrapper END -->

<!-- ========================= -->
<!-- ======== Scripts ======== -->
<!-- ========================= -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
