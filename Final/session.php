<?php

// establish connection with server
$connection = mysql_connect("localhost", "team1", "steam1", "team1");

// select the database ans start a session
$db = mysql_select_db("team1", $connection);
session_start();
$user_check=$_SESSION['login_user'];

// SQL query to grab all data of the current user
if($_SESSION['instructor'] === true){
	$ses_sql=mysql_query("SELECT * FROM Instructor WHERE Username='$user_check'", $connection);
	$access_type ="Instructor";
}
else {
	$ses_sql=mysql_query("SELECT * FROM Student WHERE Username='$user_check'", $connection);
	$access_type ="Student";
	
}

// grab the login username to display on any pages the user visits
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['Username'];

if($access_type === "Student"){
  $sessionId = $row['StudentId'];
}

if(!isset($login_session)) {
mysql_close($connection); // close connection
header('location: index.php'); // redirect to home
}

?>
