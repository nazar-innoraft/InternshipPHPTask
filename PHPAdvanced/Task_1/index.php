<?php

require 'Api.php';

$i = 12;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Home |</title>
</head>

<body>
  <header>
    <div class="upper">
      <img id="logo" src="img/innoraft-logo-big-color.png" alt="inno">
      <div class="menu">
        <a href=""><i class="fa fa-bars"></i></a>
        <div class="triangle"></div>
      </div>
    </div>
    <div class="lower wrapper">
      <div class="left">
        <h2>SERVICES</h2>
        <div class="line"></div>
        <p>What matters to us is the quality of our services and the way we provide it. We always want to be partners to our clients.</p>
      </div>
      <img src="https://www.innoraft.com/sites/default/files/2020-11/service-banner.png" alt="banner" width="500px">
    </div>
  </header>

  <!-- Location bar. -->
  <nav>
    <div class="wrapper"><a href="https://www.innoraft.com/">Home </a>/ Services</div>
  </nav>

  <!-- Information section. -->
  <section class="info">
    Innoraft has been successfully delivering web and mobile solutions to esteemed global clientele. Our key solutions include website design and development, Drupal development and maintenance, mobile app design and development, and E-Commerce solutions. The quality-driven processes for all these services is our USP and we live by them every single day. We love to work with startups, small, medium, and large scale enterprises in the same way i.e. as partners.
  </section>

  <!-- Section 1. -->
  <section class="wrapper">
    <?php
    $obj1 = new API($i);
    ?>
    <div class="left">
      <img src=<?= $obj1->get_field_image() ?> alt="">
    </div>
    <div class="right">
      <p><a href=<?= $obj1->get_alias() ?>> <?= $obj1->get_field_secondary_title() ?> </a></p>
      <div class="child">
        <?php for ($m = 0; $m < $obj1->child_count; $m++) : ?>
          <img src="<?php echo $obj1->icon_array[$m]; ?>">
        <?php endfor; ?>
      </div>
      <div class="list">
        <?= $obj1->get_field_service(); ?>
      </div>
      <a id="explore" href=<?= $obj1->get_alias() ?>>EXPLORE MORE</a>
    </div>
  </section>

  <!-- Section 2. -->
  <section class="wrapper">
    <?php
    $i++;
    $obj2 = new API($i);
    ?>
    <div class="left">
      <p><a href=<?= $obj2->get_alias() ?>> <?= $obj2->get_field_secondary_title() ?> </a></p>
      <div class="child">
        <?php for ($m = 0; $m < $obj2->child_count; $m++) : ?>
          <img src="<?php echo $obj2->icon_array[$m]; ?>">
        <?php endfor; ?>
      </div>
      <div class="list">
        <?= $obj2->get_field_service(); ?>
      </div>
      <a id="explore" href=<?= $obj2->get_alias() ?>>EXPLORE MORE</a>
    </div>

    <div class="right">
      <img src=<?= $obj2->get_field_image() ?> alt="">
    </div>
  </section>

  <!-- Section 3. -->
  <section class="wrapper">
    <?php
    $i++;
    $obj3 = new API($i);
    ?>
    <div class="left">
      <img src=<?= $obj3->get_field_image() ?> alt="">
    </div>
    <div class="right">
      <p><a href=<?= $obj3->get_alias() ?>> <?= $obj3->get_field_secondary_title() ?> </a></p>
      <div class="child">
        <?php for ($m = 0; $m < $obj3->child_count; $m++) : ?>
          <img src="<?php echo $obj3->icon_array[$m]; ?>">
        <?php endfor; ?>
      </div>
      <div class="list">
        <?= $obj3->get_field_service(); ?>
      </div>
      <a id="explore" href=<?= $obj3->get_alias() ?>>EXPLORE MORE</a>
    </div>
  </section>

  <!-- Section 4. -->
  <section class="wrapper">
    <?php
    $i++;
    $obj4 = new API($i);
    ?>
    <div class="left">
      <p><a href=<?= $obj4->get_alias() ?>> <?= $obj4->get_field_secondary_title() ?> </a></p>
      <div class="child">
        <?php for ($m = 0; $m < $obj4->child_count; $m++) : ?>
          <img src="<?php echo $obj4->icon_array[$m]; ?>">
        <?php endfor; ?>
      </div>
      <div class="list">
        <?= $obj4->get_field_service(); ?>
      </div>
      <a id="explore" href=<?= $obj4->get_alias() ?>>EXPLORE MORE</a>
    </div>
    <div class="right">
      <img src=<?= $obj4->get_field_image() ?> alt="">
    </div>
  </section>

</body>

</html>
