<?php

/**
 * This class extends Database, this class update posts and fetch posts from db.
 */
class UserHome extends Database {
  /**
   * This function update post to DB.
   *
   * @param  string $content
   *   Post's content.
   * @param  mixed $image_path
   *   Post's image.
   *
   * @return bool
   *   Return true if updated else false.
   */
  public function updatePost(string $content, string $image_path = ''):bool {
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

  /**
   * This function fetch posts from db.
   *
   * @return array
   *   Return array of posts.
   */
  public function getPosts():array {
    $sql = "SELECT * FROM posts ORDER BY sno DESC LIMIT 0,10";
    $this->query($sql);
    return $this->fetch_all();
  }
}

