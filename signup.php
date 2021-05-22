<?php 
	include_once 'header.php';
?>

		<div class="content">
			<div class="textBox">
					<h2>Sign Up</h2>
					<form id="regform" action="includes/registration.php" method="post">
						  <div class="mb-3" style="--i:11;">
						    <label  for="id_number" class="form-label">ID Number</label>
						    <input  type="text" name="ID" class="form-control" id="id_number" aria-describedby="emailHelp">
						    <div id="emailHelp" class="form-text">Put your student ID number here.</div>
						  </div>
						  <div class="mb-3" style="--i:12;">
						    <label for="name" class="form-label">Full Name</label>
						    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
						    <div id="emailHelp" class="form-text">Write your full name here.</div>
						  </div>
						  <div class="mb-3" style="--i:13;">
						    <label for="emailInput" class="form-label">Email address</label>
						    <input type="email" name="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
						    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						  </div>
						  <div class="mb-3" style="--i:14;">
						    <label for="passwordInput" class="form-label">Password</label>
						    <input type="password" name="pwd" class="form-control" id="passwordInput">
						    <div id="passwordHelpBlock" class="form-text">
							  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
							</div>
						  </div>
						  <div class="mb-3" style="--i:15;">
						    <label for="ConfirmPasswordInput" class="form-label">Confirm Password</label>
						    <input type="password" name="pwdrepeat" class="form-control" id="ConfirmPasswordInput">
						    
						  </div>
						  <div style="--i:16;">
						  		<button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
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

								else if ($_GET["error"] == "invalidName") {
									echo '
										<div class="alert alert-danger" role="alert">
										  Invalid Name.
										</div>
									';
								}

								else if ($_GET["error"] == "invalidEmail") {
									echo '
										<div class="alert alert-danger" role="alert">
										  Invalid Email Address.
										</div>
									';
								}

								else if ($_GET["error"] == "passwordDontMatch") {
									echo '
										<div class="alert alert-danger" role="alert">
										  Passwords doesn\'t match.
										</div>
									';
								}

								else if ($_GET["error"] == "IDTaken") {
									echo '
										<div class="alert alert-danger" role="alert">
										  The user already exists in the database.
										</div>
									';
								}

								else if ($_GET["error"] == "stmtfailed") {
									echo '
										<div class="alert alert-danger" role="alert">
										  Something went wrong. try again!
										</div>
									';
								}

								else if ($_GET["error"] == "none") {
									echo '
										<div class="alert alert-success" role="alert">
										  Everything is good. You have successfully Signed Up!
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