<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';
// // establish connection with server
// $connection = mysql_connect("localhost", "team1", "steam1", "team1");

// // select the database ans start a session
// $db = mysql_select_db("team1", $connection);
session_start();
$username=$_SESSION['login_user'];
// grab the login username to display on any pages the user visits
$login_session = $username;
// SQL query to grab all data of the current user
if($_SESSION['instructor'] === true){
	$session=getInstructorPasswordByUsername($username);
	$access_type ="Instructor";
}
else {
	$session=getStudentPasswordByUsername($username);
	$access_type ="Student";
	$studentId = $session["StudentId"];
}




if(!isset($session)) {
// mysql_close($connection); // close connection
header('location: ../Public/index.php'); // redirect to home
}

?>
