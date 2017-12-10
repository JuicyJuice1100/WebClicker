<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit_instructor'])) {
	if (empty($_POST['username_instructor']) || empty($_POST['password_instructor'])) {
		$error = "Error Instructor : username or password field is empty";
	}
	else{
		// Define $username and $password
		$username=$_POST['username_instructor'];
		$password=$_POST['password_instructor'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysql_connect("localhost", "team1", "steam1", "team1");
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		$db = mysql_select_db("team1", $connection);
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("SELECT * FROM Instructor WHERE HashedPassword='$password' AND Username='$username'", $connection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session Variables
			$_SESSION['instructor']=true;
			header("location: profile.php"); // Redirecting To Other Page
		} else {
			$error = "Error Instructor : username or password is incorrect";
		}

	mysql_close($connection); // Closing Connection
	
	}
	
}

if (isset($_POST['submit_student'])) {
	if (empty($_POST['username_student']) || empty($_POST['password_student'])) {
		$error = "Error Student : username or password field is empty";
	}
	else{
		// Define $username and $password
		$username=$_POST['username_student'];
		$password=$_POST['password_student'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysql_connect("localhost", "team1", "steam1", "team1");
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		$db = mysql_select_db("team1", $connection);
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("SELECT * FROM Student WHERE HashedPassword='$password' AND Username='$username'", $connection);
		$rows = mysql_num_rows($query);
			if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session Variables
			$_SESSION['instructor']=false;
			header("location: profile.php"); // Redirecting To Other Page
		} else {
			$error = "Error Student : username or password is incorrect";
		}

	mysql_close($connection); // Closing Connection

	}
}

?>