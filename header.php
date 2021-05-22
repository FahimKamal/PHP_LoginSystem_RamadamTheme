<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ramadan Kareem</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
</head>
<body>
	<section>
		<img src="img/mosque.jpg" class="mosque">
		<header>
			<a href="index.php" class="logo">Ramadan</a>
			<div class="toggle"></div>
			<ul class="navigation">
				<li><a href="index.php" style="--i:1;">Home</a></li>
				<li><a href="about.php" style="--i:2;">About</a></li>
				<?php 
                  if (isset($_SESSION["userid"])) {
                    echo '
                        <li>
                          <a href="#" style="--i:3;">Profile</a>
                        </li>
                        <li>
                          <a href="includes/logout.php" style="--i:4;">Logout</a>
                        </li>
                    ';
                  }
                  else {
                    echo '
                        <li>
                          <a href="signup.php" style="--i:3;">Sign Up</a>
                        </li>
                        <li>
                          <a href="signin.php" style="--i:4;">Sign In</a>
                        </li>
                    ';                    
                  }
               ?>
			</ul>
		</header>