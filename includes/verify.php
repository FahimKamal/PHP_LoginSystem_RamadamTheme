<?php

// Check if the user actually pressed the submit button. 
if (isset($_POST['submit'])) {

	// get the inputs and put them in variables for later use.
	$idorEmail = $_POST['ID'];
	$pwd = $_POST['pwd'];

	require_once 'dbh.php';
	require_once 'functions.php';

	// Check if user filled up all the input fields.
	if (emptyInputSignin($idorEmail, $pwd) !== false) {
		header("location: ../signin.php?error=emptyinput");
		exit();
	}

	loginUser($conn, $idorEmail, $pwd);
}
else {
	header("location: ../signin.php");
	exit();
}