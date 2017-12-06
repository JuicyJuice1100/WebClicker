<?php

// check which tab is selected Student / Instructor
// grab info from form and check with database
// confirm credentials are authorized
// redirect to next page or display error message accordingly

include("user_account_functions.php");
if (isset($_REQUEST["username_student"]) && isset($_REQUEST["password_student"]) && isset ( $_POST['submit'] )) {
	// student login
  $username = $_REQUEST["username_student"];
  $password = $_REQUEST["password_student"];
  
  if (getStudentPasswordByUsername($username)) {
    if (isset($_SESSION)) {
      session_destroy();
      session_regenerate_id(TRUE);
      session_start();
    }
    $_SESSION["name"] = $name;     // start session, remember user info
    redirect("quiz_student.html", "Login successful");
  }
}
else if(isset($_REQUEST["username_instructor"]) && isset($_REQUEST["password_instructor"]) && isset ( $_POST['submit'] )){
	// instructor login
  $name = $_REQUEST["username_instructor"];
  $password = $_REQUEST["password_instructor"];
  if (getInstructorPasswordByUsername($username)) {
    if (isset($_SESSION)) {
      session_destroy();
      session_regenerate_id(TRUE);
      session_start();
    }
    $_SESSION["name"] = $name;     // start session, remember user info
    redirect("questions_instructor.html", "Login successful");
  }
}
  else {
    redirect("sign_in.html", "Incorrect username or password.");
  }
}
?>