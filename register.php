<?php 
include('dbconnect.php');
$username= $password = "";

?>
<!DOCTYPE html>
<html>
<head>
  <title> PHP Registration </title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
  	<h2>Register</h2>

  </div>
	
  <form method="post" action="registeruser.php">
  <?php if ( isset( $_SESSION['message'] ) ): ?>
    <div class="msg">
        <?php
echo $_SESSION['message'];

unset( $_SESSION['message'] );
?>
    </div>
    <?php endif ?>
	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" >
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="confirm_password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="register">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>