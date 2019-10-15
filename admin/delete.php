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

}else{
  header('Location: index.php');
}

?>


DELETE FROM `posts` WHERE `posts`.`post_id` = 4
