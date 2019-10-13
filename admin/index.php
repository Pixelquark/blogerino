<?php
session_start();

require '../includes/post.php';
require '../includes/connection.php';

$user = new User;
$users = $user->fetch_all();

if (isset($_SESSION['logged_in'])){

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Pixelquark</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Erik Morelli">
  <meta name="description" content="Webdeveloper with big ambitions and a minimalistic approach">

  <link rel="icon" type="image/png" href="../favicon.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/style.css">
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
          <li><a href="../index.php">Home</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>

        <!-- Menu hamburguer -->
        <ul>
          <li><img id="menu" src="../assets/menu.png" alt=""></li>
        </ul>
      </div>
    </div>

    <!-- == Main Container == -->
    <div class="container post-container">

      <!-- == Content Header == -->
      <div class="row">
        <div class="col-lg-12">
          <div class="header-content">
            <?php foreach ($users as $user){?>
              <small><span class="headerLogged">Logged in as: </span>
                <span class="headerUsername">
                  <?php echo $user['username'] ?>
                </span>
              </small>
              <span class="headerFullname">Welcome, <?php echo $user['fullname'] ?></span>
            <?php } ?>
          </div><hr>
        </div>
      </div>
      <!-- == Content Main == -->
      <div class="row adminContainer">

        <div class="col-lg-12 navigationPanel">
          <button type="button" name="button">Add post</button>
          <button type="button" name="button">Remove post</button>
          <button type="button" name="button">Edit post</button>
          <button type="button" name="button">Register new user</button>
          <button type="button" name="button">Database Control</button>
        </div>

      </div><!-- Content container div END -->
    </div><!-- Main container div END -->


  </div><!-- Wrapper END -->
  <!-- ========================= -->
  <!-- ======== Scripts ======== -->
  <!-- ========================= -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/scripts.js"></script>
  <script src="../js/admin.js"></script>
</body>
</html>




<?php
}else{
  //display login
  if(isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(empty($username) or empty($password)){
      $error = 'All fields are required.';
    }else{
      $query = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
      $query->bindValue(1, $username);
      $query->bindValue(2, $password);
      $query->execute();

      $num = $query->rowCount();


      if($num == 1){
        $_SESSION['logged_in'] = true;

        header('Location: index.php');
        exit();
      }else{
        $error = 'Incorrect details.';
      }
    }
  }

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">

    <title>Pixelquark</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Erik Morelli">
    <meta name="description" content="Webdeveloper with big ambitions and a minimalistic approach">

    <link rel="icon" type="image/png" href="../favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css.map"> -->
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
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
            <li><a href="../index.php">Home</a></li>
            <li><a href="https://github.com/Pixelquark">Github</a></li>
          </ul>

          <!-- Menu hamburguer -->
          <ul><li><img id="menu" src="../assets/menu.png" alt=""></li></ul>
        </div>
      </div>

      <!-- == Main Container == -->
      <div class="container post-container">

        <!-- == Content Header == -->
        <div class="row">
            <div class="col-lg-12">
              <div class="header-content">
                <span>Login</span>
              </div><hr>
            </div>
        </div>
        <!-- == Content Main == -->
        <div class="row loginContainer">

            <?php
            if(isset($error)){
              ?>

              <small style="color:#aa0000;"><?php echo $error; ?> </small>

              <?php
            }
            ?>

          <form class="formLogin" action="index.php" method="post" autocomplete="off">
            <input class="inputAdmin" type="text" name="username" autocomplete="off" placeholder="Username"/> <br>
            <input class="inputAdmin" type="password" name="password" autocomplete="off" placeholder="Password"/><br>
            <input class="inputAdmin" type="submit" value="Login"/>
          </form>


        </div><!-- Content container div END -->
      </div><!-- Main container div END -->


    </div><!-- Wrapper END -->

  <!-- ========================= -->
  <!-- ======== Scripts ======== -->
  <!-- ========================= -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/scripts.js"></script>
</body>
</html>
  <?php
}
?>
