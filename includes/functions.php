<?php

// Function checks is all the fields is not empty.
function emptyInputSignup($ID, $name, $email, $pwd, $pwdrepeat){
	$result;

	if (empty($ID) || empty($name) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}

// Function checks if the name of the user is correct or not.
function invalidName($name){
	$result;

	// preg_match(pattern, subject) returns true, if the pattern is exists in the subject.
	if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}

// Function checks if the email address is correct.
function invalidEmail($email){
	$result;

	// filter_var() returns true, if the email is correct.
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}

// Function checks if the password and repeat password is the same.
function pwdMatch($pwd, $pwdrepeat){
	$result;

	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}

// Function checks if the user already exists in the database.
function IDExists($conn, $ID, $email){
	$sql = "SELECT * FROM users WHERE studentId = ? OR email = ?;";
	$stmt = mysqli_stmt_init($conn);

	// Check is the sql and sql statement is correct.
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $ID, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	// Now check if the user data exists in the database.
	// if exists, return all the data.
	// else return false as in user doesn't exists.
	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

	// Close the connection to the database.
	mysqli_stmt_close($stmt);
}

// If this function is called that means everything is OK. Now put all the
// data in the database and be done with it.
function createUser($conn, $ID, $name, $email, $pwd){
	$sql = "INSERT INTO users(studentId, name, email, password) VALUES(?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);

	// Check is the sql and sql statement is currect.
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $ID, $name, $email, $hashedPwd);
	mysqli_stmt_execute($stmt);

	// Close the connection to the database.
	mysqli_stmt_close($stmt);	

	// Now inform the user that the signUp is successful.
	header("location: ../signup.php?error=none");
	exit();
}

// Function checks if all the fields is not empty.
function emptyInputSignin($idorEmail, $pwd){
	$result;

	if (empty($idorEmail) || empty($pwd)) {
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}

function loginUser($conn, $idorEmail, $pwd){
	$userExists = IDExists($conn, $idorEmail, $idorEmail);

	if ($userExists === false) {
		header("location: ../signin.php?error=wrongSignin");
		exit();
	}

	$pwdHashed = $userExists['password'];
	$checkPwd = password_verify($pwd, $pwdHashed);
	if ($checkPwd === false) {
		header("location: ../signin.php?error=wrongPwd");
		exit();
	}
	else if ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $userExists['studentId'];
		$_SESSION["userName"] = $userExists['name'];
		header("location: ../index.php?error=none");
		exit();
	}
}