<?php
session_start();
require '../includes/connection.php';

if(isset($_SESSION['logged_in'])){
    if(isset($_POST['idRem'])){
      $id = $_POST['idRem'];

      $query = $pdo->prepare("DELETE FROM posts WHERE post_id = ?");
      $query->bindValue(1, $id);
      $query->execute();

      header('Location: index.php');
    }
  else{
    header('Location: index.php');
  }
}
?>
