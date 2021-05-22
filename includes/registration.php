<?php

// Check if the user actually pressed the submit button. 
if (isset($_POST["submit"])) {
	
	// get the inputs and put them in variables for later use.
	$ID = $_POST["ID"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];

	require_once 'dbh.php';
	require_once 'functions.php';

	// Check if user filled up all the input fields.
	if (emptyInputSignup($ID, $name, $email, $pwd, $pwdrepeat) !== false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}

	// Check if the user name is correct.
	if (invalidName($name) !== false) {
		header("location: ../signup.php?error=invalidName");
		exit();
	}

	// Check if the email address is correct.
	if (invalidEmail($email) !== false) {
		header("location: ../signup.php?error=invalidEmail");
		exit();
	}

	// Check if the password and repeat password is same.
	if (pwdMatch($pwd, $pwdrepeat) !== false) {
		header("location: ../signup.php?error=passwordDontMatch");
		exit();
	}

	// Check if the user already exists in the database.
	if (IDExists($conn, $ID, $email) !== false) {
		header("location: ../signup.php?error=IDTaken");
		exit();
	}

	// If no error arised then register the user in the database.
	createUser($conn, $ID, $name, $email, $pwd);

}else {
	header("location: ../signup.php");
	exit();
}