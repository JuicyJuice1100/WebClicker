<?php

// // establish connection with server
// $connection = mysql_connect("localhost", "team1", "steam1", "team1");

// // select the database ans start a session
// $db = mysql_select_db("team1", $connection);
session_start();
$user=$_SESSION['login_user'];

// SQL query to grab all data of the current user
if($_SESSION['instructor'] === true){
	$session=getInstructorPasswordByUsername($user);
	$access_type ="Instructor";
}
else {
	$session=getInstructorPasswordByUsername($user);
	$access_type ="Student";
}

// grab the login username to display on any pages the user visits
// $login_session =$session["Username"];

if(!isset($session["Username"])) {
// mysql_close($connection); // close connection
header('location: index.php'); // redirect to home
}

?>