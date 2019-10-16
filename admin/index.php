<?php
session_start();

require '../includes/post.php';
require '../includes/connection.php';

$user = new User;
$users = $user->fetch_all();

$post = new Post;
$posts = $post->fetch_all();

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
          <button id="addPost" type="button" name="button">Add post</button>
          <button id="remPost" type="button" name="button">Remove post</button>
          <button type="button" name="button">Edit post</button>
          <button type="button" name="button">Register new user</button>
          <button type="button" name="button">Database Control</button>
        </div>

        <div class="addPost">
          <?php
            if(isset($error)){
          ?>
          <small style="color:#aa0000"> <?php echo $error; ?> </small><br>
          <br/><br/>
          <?php
            }
          ?>
          <form class="adminForm" action="add.php" method="post" autocomplete="off">
            <input type="text" name="title" placeholder="Your post title"  autocomplete="off" >
            <input type="text" name="uname" value="<?php foreach ($users as $user){ echo $user['fullname']; }?>" readonly>
            <input type="text" name="date" value="<?php echo date('F, Y') ?>" readonly><br>
            <textarea name="description" maxlength="255" rows="8" cols="60" placeholder="Your description for card" ></textarea><br>
            <input class="link" type="text" name="linkdemo" placeholder="Paste the full URL for the demo page"><br>
            <input class="link" type="text" name="linkgit" placeholder="Paste the full URL for the GITHUB page"><br>
            <input type="checkbox" name="" value="HTML"><span class="tags">HTML</span>
            <input type="checkbox" name="" value="CSS"><span class="tags">CSS</span>
            <input type="checkbox" name="" value="JavaScript"><span class="tags">JS</span>
            <input type="checkbox" name="" value="PHP"><span class="tags">PHP</span>
            <input type="checkbox" name="" value="Python"><span class="tags">Python</span>
            <input type="checkbox" name="" value="SQL"><span class="tags">SQL</span>
            <div class="submitDiv">
              <input class="addSubmitButton" type="submit" name="submit" value="Submit">
              <span class="imageAddress">Image adress: </span> <input id="filechooser" type="text" name="thumb" placeholder="assets/nomedaimagem" >
            </div>
          </form>
        </div>

        <div class="remPost">
          <?php foreach ($posts as $post) { ?>

          <div class="postInfo">
            <form class="remForm" action="delete.php" method="post" autocomplete="off" >
              <input class="postID" type="text" name="idRem" value="<?php echo $post['post_id'] ?>" readonly>
              <input type="text" name="title" value="<?php echo $post['post_title'] ?>" readonly>
              <input type="text" name="author" value="<?php echo $post['post_author'] ?>" readonly>
              <button class="remSubmitButton" type="submit" name="submitRem" value="Submit">Delete post</button>
            </form>
          </div>



          <?php } ?>
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
    $password = $_POST['password'];

    $hash = password_hash($password, PASSWORD_BCRYPT);

    if(empty($username) or empty($password)){
          $error = 'All fields are required.';
      }else{
          $query = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
          $query->bindValue(1, $username);
          $query->bindValue(2, $hash);
          $query->execute();

          if(password_verify($password, $users[0]['password']) && $username == $users[0]['username']){
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
