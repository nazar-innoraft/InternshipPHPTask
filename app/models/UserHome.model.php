<?php

class UserHome extends Database {
  public function updatePost(string $content, string $image_path = '') {
    if(!empty($image_path)) {
      $sql = "INSERT INTO posts (email, content, image_path, time) VALUES (?, ?, ?, ?)";
      $time = date('Y-m-d H:i:s', time());
      return $this->query($sql, [$_SESSION['username'], $content, $image_path, $time]);
    } else {
      $sql = "INSERT INTO posts (email, content, time) VALUES (?, ?, ?)";
      $time = date('Y-m-d H:i:s', time());
      return $this->query($sql, [$_SESSION['username'], $content, $time]);
    }

  }
  public function getPosts() {
    $sql = "SELECT * FROM posts ORDER BY sno DESC LIMIT 0,10";
    $this->query($sql);
    return $this->fetch_all();
  }
}

