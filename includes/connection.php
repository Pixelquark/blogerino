<?php
  try{
    // $pdo = new PDO('mysql:host=localhost:3306; dbname=pixelqua_pixelquark','pixelqua_pixelquark', 'erikBALAzildo00@');
    $pdo = new PDO('mysql:host=localhost; dbname=pixelquark','root', '');
     } catch(PDOException $e){
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
 ?>
