<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Justice for Kara Wilhelm</title>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet'>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header id="page-header" class="header">
<div class="pageWrapper">
  <img src="img/kara-portrait.jpg" alt="">
  <h1>Justice for Kara Wilhelm</h1>

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
      <div class="js-storySection">
        <?php include 'content/07.html'; ?>
      </div>
    </div>
  </div>
  
  <div id="contact" class="afterword">
    <h2>Contact Us</h2>
    <?php include 'content/afterword.html'; ?>
  </div>
</div>
<script src="js/bundle.js"></script>
</body>
</html>