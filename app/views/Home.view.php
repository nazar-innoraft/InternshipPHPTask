<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>Home</title>
</head>

<body>
  <!-- Header section -->
  <header>
    <div class="logo">
      <a href="<?php echo ROOT . '/home' ?>">
        <img src="<?= ROOT ?>/assets/logo/logo.png" alt="Logo">
      </a>
    </div>
    <div class="profile">
      <div class="user">
        <a href="<?php echo '/Profile/' . $_SESSION['username'] ?>">
          <img src=<?php
                    $user = $_SESSION['username'] ?? null;
                    if (file_exists('assets/profile_images/' . $user . '.jpg')) {
                      echo ROOT . '/assets/profile_images/' . $user . '.jpg';
                    } else {
                      echo ROOT . '/assets/profile_images/user.png';
                    }
                    ?>>
        </a>
        <p class="username"><?= $_SESSION['username'] ?? null ?></p>
      </div>
      <a class="logout-btn" href="/logout">Logout</a>
    </div>
  </header>

  <!-- Upload post. -->
  <section id="create_post">
    <form method="post" enctype="multipart/form-data">
      <input type="text" name="content">
      <label for="upload_file"><img width="30px" src="<?php ROOT ?>/assets/images/image-icon.png"></label>
      <input style="display: none;" type="file" name="upload_file" id="upload_file">
      <input type="submit" name="submit_post" id="submit_post" value="post">
    </form>
    <div class="error-message"><?php echo $data['error_message'] ?? null ?></div>
  </section>

  <!-- Show posts -->
  <section class="posts" id="posts">
    <?php
    foreach ($data as $row) :
      if(isset($row['error_message'])) {
        continue;
      }
    ?>
      <div class="post">
        <div class="upper">
          <div class="profile">
            <a href="<?php echo '/Profile/' . $row['email'] ?>">
              <img src="<?php
                        $user_photo = 'assets/profile_images/' . $row['email'] . '.jpg';
                        if (file_exists($user_photo)) {
                          echo $user_photo;
                        } else {
                          echo 'assets/profile_images/user.png';
                        }
                        ?>">
            </a>
            <p class="username"><?= $row['email'] ?></p>
          </div>
          <div class="time"><?= $row['time'] ?></div>
        </div>
        <div class="content">
          <p><?= $row['content'] ?></p>
          <div class="image">
            <?php
            if ($row['image_path'] != null) {
              echo '<img src="assets/post_images/' . $row['image_path'] . '" >';
            }
            ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </section>
  <div id="message"></div>
  <button onclick="deleteChildren()">Load less</button> <br>
  <button id="load_more">Load more</button>


  <script src="assets/js/ajax.js"></script>
</body>

</html>
