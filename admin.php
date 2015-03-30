<?php
$acknowledgment = "<p>&nbsp;</p>";

if (isset($_POST['submit'])){
  if ($_POST['login']==='8wilhelm5'){
    session_start();
    $_SESSION['admin'] = "authorized";
    header('Location: index.php');
  }
  else{
    $acknowledgment = "<p class='error'>Incorrect Login</p>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>login</title>
  <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
  <div class="pageWrapper">
    <?php echo $acknowledgment; ?>
    <form method="post" action="admin.php" id="admin">
      <div>
        <p><label>Login: <input type="password" name="login" id="adminLogin" /></label></p>
        <p><input type="submit" name="submit" value="Login"/></p>
      </div>
    </form>
</div>
  </body>
</html>