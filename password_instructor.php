<?php

/* required hashing algorithm:
  $iv = mcrypt_create_iv(22,MCRYPT_DEV_URANDOM);
  $encoded_iv = str_replace('+', '.', base64_encode($iv));
  $salt = '$2y$10$' . $encoded_iv . '$';
  $hashed_password = crypt($pwd,$salt);

  then: the submitted passord is correct iff the following is true
          $hashed_password === crypt($submitted_password,$hashed_password)

  watch out:
    === string comparison is vulnerable to timing attacks (but that's
    OK for our class project)
*/

$error='';

if (isset($_POST['instructor_submit'])) {

	$password_1=$_POST['newPassword_instructor'];
	$password_2=$_POST['confirm'];

	if (empty($_POST['oldPassword_instructor']) || empty($_POST['newPassword_instructor']) || empty($_POST['confirm'])) {
		$error = "Error : change password fields must all be completed";
	}
	else if ($password_1 === $password_2){

		// Define $username and $password
		$username=$_POST['username_instructor'];
		$password=$_POST['oldPassword_instructor'];
		$newPassword=$_POST['confirm'];

		// Establish connection
		$connection = mysql_connect("localhost", "team1", "steam1", "team1");

		// protect against SQL injection for security
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		// select database
		$db = mysql_select_db("team1", $connection);

		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("SELECT * FROM Instructor WHERE HashedPassword='$password' AND Username='$username'", $connection);
		$rows = mysql_num_rows($query);

		if ($rows == 1) {
			// if password is correct, update the field with new password
			$query = mysql_query("UPDATE Instructor SET HashedPassword='$newPassword' WHERE Username='$username'", $connection);
			$rows = mysql_num_rows($query);
			$error="Success! Your password has been updated.";
		}
		else
			$error = "Error : username or password is incorrect";

	mysql_close($connection); // close connection
	
	}
	else
		$error = "Error : new passwords do not match";

}

?>