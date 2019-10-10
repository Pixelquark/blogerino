<?php
  try{
    $pdo = new PDO('mysql:host=localhost; dbname=pixelquark','root', '');
     } catch(PDOException $e){
      exit('Database error.');
  }
 ?>
