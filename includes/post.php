<?php

  class Post{

    public function fetch_all(){
      global $pdo;

      $query = $pdo->prepare("SELECT * FROM posts");
      $query -> execute();

      return $query->fetchAll();
    }

    public function fetch_data($post_id){
      global $pdo;

      $query = $pdo->prepare("SELECT * FROM posts WHERE post_id = ?");
      $query->bindValue(1, $post_id);
      $query->execute();

      return $query->fetch();
    }
  }


  class User{

    public function fetch_all(){
      global $pdo;

      $query = $pdo->prepare("SELECT * FROM users");
      $query -> execute();

      return $query->fetchAll();
    }

    public function fetch_data($user_id){
      global $pdo;

      $query = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
      $query->bindValue(1, $user_id);
      $query->execute();

      return $query->fetch();
    }
  }

?>
