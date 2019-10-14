<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if(isset($_SESSION['logged_in'])){
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = $pdo->prepare("DELETE FROM articles WHERE article_id = ?");
    $query->bindValue(1, $id);
    $query->execute();

    header('Location: delete.php');
  }
  $articles = $article->fetch_all();
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

      <h4>Delete article</h4>
      <?php
      if(isset($error)){
        ?>
        <small style="color:#aa0000"> <?php echo $error; ?> </small>
        <br/><br/>
        <?php
      }
      ?>
      <form action="delete.php" method="get" autocomplete="off">
        <select onchange="this.form.submit();" name="id">
          <option value="" selected disabled hidden>Choose the article to delete</option>
          <?php foreach($articles as $article){  ?>
            <option value="<?php echo $article['article_id'] ?>">
              <?php echo $article['article_title'] ?>
            </option>
          <?php } ?>
        </select>
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
