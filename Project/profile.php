<?php
include('session.php');

// simple profile page that determines user type and redirects them to appropriate home page

if($_SESSION['instructor'] === true)
	header("location: ./questions_instructor.php");
else 
	header("location: ./quiz_student.php");
?>
