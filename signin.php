<?php 
	include_once 'header.php';
?>

		<div class="content">
			<div class="textBox">
				<h2>Login</h2>
				<form action="includes/verify.php" method="post">
				  <div class="mb-3" style="--i:11">
				    <label for="id_number" class="form-label">ID Number/Email</label>
				    <input type="text" name="ID" class="form-control" id="id_number" aria-describedby="emailHelp">
				    <div id="emailHelp" class="form-text">Put your student ID number here or email address.</div>
				  </div>		  
				  <div class="mb-3" style="--i:12">
				    <label for="passwordInput" class="form-label">Password</label>
				    <input type="password" name="pwd" class="form-control" id="passwordInput">
				    <div id="passwordHelpBlock" class="form-text">
					  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
					</div>
				  </div>
				  <div style="--i:13">
				  	<button type="submit" name="submit" class="btn btn-primary">Sign In</button>
				  </div>		  
				  
				</form>

		<!-- Error handling php script. -->
		<?php 
			if (isset($_GET["error"])) {
				if ($_GET["error"] == "emptyinput") {
					echo '
						<div class="alert alert-warning" role="alert">
						  Fill in all fields!
						</div>
					';
				}

				else if ($_GET["error"] == "wrongSignin") {
					echo '
						<div class="alert alert-danger" role="alert">
						  User doesn\'t exists.
						</div>
					';
				}
				else if ($_GET["error"] == "wrongPwd") {
					echo '
						<div class="alert alert-danger" role="alert">
						  Wrong password.
						</div>
					';
				}
			}			
		 ?>
		<!-- Error handling php script. -->
			</div>
		</div>

<?php 
	include_once 'footer.php';
?>