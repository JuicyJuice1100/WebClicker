<?php
include('session.php');

// simple profile page that determines user type and redirects them to appropriate home page

if($_SESSION['instructor'] === true)
	header("location: ../Public/Instructor/questions.php");
else 
	header("location: ../Public/Student/quiz.php");
?>
