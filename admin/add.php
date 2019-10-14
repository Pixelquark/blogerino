<?php
session_start();
require '../includes/connection.php';

if(isset($_SESSION['logged_in'])){

  if (isset($_POST['title'], $_POST['description'], $_POST['uname'], $_POST['linkdemo'], $_POST['linkgit'], $_POST['thumb'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $username = $_POST['uname'];
    $linkdemo = $_POST['linkdemo'];
    $linkgit = $_POST['linkgit'];
    $thumb = $_POST['thumb'];
    if (empty($title) or empty($description) or empty($username) or empty($linkdemo) or empty($linkgit) or empty($thumb)){
      $error = 'All fields are required.';
    }else{

      // echo $_POST['description'];
      $query = $pdo->prepare("INSERT INTO posts(post_date, post_title, post_content, post_author, post_thumb, link_demo, link_git) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $query->bindValue(1,time());
      $query->bindValue(2,$_POST['title']);
      $query->bindValue(3,nl2br($_POST['description']));
      $query->bindValue(4,$_POST['uname']);
      $query->bindValue(5,$_POST['thumb']);
      $query->bindValue(6,$_POST['linkdemo']);
      $query->bindValue(7,$_POST['linkgit']);

      $query->execute();
      
      header('Location: index.php');
    }
  }else{
    $error = 'Not logged in';
  }
}
?>
