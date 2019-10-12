<?php
session_start();
include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])){
  if(isset($_POST['title'], $_POST['content'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    if(empty($title) or empty($content)){
      $error = 'All fields are required.';
    }else{
      $query = $pdo->prepare("INSERT INTO articles(article_title, article_content, article_timestamp) VALUES(?, ?, ?)");
      $query->bindValue(1,$_POST['title']);
      $query->bindValue(2,nl2br($_POST['content']));
      $query->bindValue(3, time());

      $query->execute();
      header('Location: index.php');
    }
  }
  ?>

  <html>
  	<head>
  		<title>CMS Tutorial</title>
  		<link rel="stylesheet" href="../assets/style.css" />
  	</head>
  	<body>

      <div class="navbar">
        <nav>
          <ul>
            <li><a href="../index.php">Webapps</a></li>
            <?php if(!isset($_SESSION['logged_in'])){?>
              <li><a href="admin/index.php">Login</a></li>
            <?php }else{ ?>
              <li><a href="index.php">Control Panel</a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>

  		<div class="container">

  			<a href="index.php" id="logo">CMS</a>
        <br/><br/>

        <h4>Add article</h4>
        <?php
          if(isset($error)){
        ?>
        <small style="color:#aa0000"> <?php echo $error; ?> </small>
        <br/><br/>
        <?php
          }
        ?>
        <form action="add.php" method="post" autocomplete="off">
          <input type="text" name="title" placeholder="Title"><br><br>
          <textarea name="content" rows="15" cols="50" placeholder="Content"></textarea><br><br>
          <input type="submit" name="submit" value="Add article">
        </form>
        <a href="index.php">&larr;  Back</a><br>
  		</div>

  	</body>
  </html>

<?php
}else{
  header('Location: index.php');
}
?>
