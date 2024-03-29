<?php
// require_once('PageData.php');
// $PageData = new PageData();
$admin = true;

// $content = "home";

// $PageData->pageSetup();

// $admin = $PageData->getAdmin();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="This narrative is written primarily to bring justice for Kara Wilhelm, who lost her life in a manner that, to this day, has yet to be resolved.">
  <title>Justice for Kara Wilhelm</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/modernizr.min.js"></script>
</head>
<body>

<header id="page-header" class="header">
  <div class="pageWrapper">
    <img class="header-img header-img--1" src="img/kara-snow.jpg" alt="">
    <img class="header-img header-img--2" src="img/kara-portrait.jpg" alt="">
    <img class="header-img header-img--3" src="img/kara-friend.jpg" alt="">
    <h1>Justice for Kara Wilhelm</h1>
    <h2>1991 - 2011</h2>

    <nav id="page-nav" class="nav">
      <ul>
        <li><a href="#narrative">Kara's Story</a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
    </nav>
  </div>
</header>
<div class="pageWrapper">
  <div class="intro">
    <?php include 'content/intro.html'; ?>
  </div>
  
  <div id="narrative" class="narrative">
    <h2>Kara's Story</h2>
    <div id="story">

      <div class="js-storySection">
        <?php include 'content/01.html'; ?>
      </div>
      <div class="js-storySection">
        <?php include 'content/02.html'; ?>
      </div>  
      <div class="js-storySection">
        <?php include 'content/03.html'; ?>
      </div>
      <div class="js-storySection">
        <?php include 'content/04.html'; ?>
      </div>  
      <div class="js-storySection">
        <?php include 'content/05.html'; ?>
      </div>
      <div class="js-storySection">
        <?php include 'content/06.html'; ?>
      </div>  
      <div class="js-storySection section7">
        <?php include 'content/07.html'; ?>
      </div>
    </div>
  </div>
  
  <div id="contact" class="afterword">
    <h2>Contact Us</h2>
    <img class="header-img header-img--1" src="img/kara-1.jpg" alt="">
    <img class="header-img header-img--2" src="img/kara-2.jpg" alt="">
    <img class="header-img header-img--3" src="img/kara-frame.jpg" alt="">
    <?php include 'content/afterword.html'; ?>
  </div>
</div>
<script src="js/bundle.js"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EB4WJEFK8H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-EB4WJEFK8H');
</script>
</body>
</html>
