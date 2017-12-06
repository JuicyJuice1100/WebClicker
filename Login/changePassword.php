<?php

// checks to make sure all data fields are filled out
// checks to make sure current password is correct
// updates password in the database


include("user_account_functions.php");
if (isset($_REQUEST["username_student"]) && isset($_REQUEST["oldPassword_student"]) && isset($_REQUEST["newPassword_student"]) ) {
	// change password student
  $username = $_REQUEST["username_student"];
  $password = $_REQUEST["oldPassword_student"];
  //call the blowfish hash here for $password
  $correctPass = getStudentPasswordByUsername($username);
  if (){
  	$newPassword = $_REQUEST["newPassword_student"];
  	editStudentPassword($name, $newPassword);
  	redirect("change_password_student.html", "Password has been successfully updated.");
  }
  else{
  	redirect("change_password_student.html", "Incorrect username or password.");
  }
}
elseif (isset($_REQUEST["username_instructor"]) && isset($_REQUEST["oldPassword_instructor"]) && isset($_REQUEST["newPassword_instructor"]) ) {
	// instructor change password
  $username = $_REQUEST["username_instructor"];
  $password = $_REQUEST["oldPassword_instructor"];
  if (getInstructorPasswordByUserName($username)) {
  	$newPassword = $_REQUEST["newPassword_instructor"];
  	editInstructorPassword($username, $newPassword);
  	redirect("change_password_instructor.html", "Password has been successfully updated.");
  }
  else{
  	redirect("change_password_instructor.html", "Incorrect username or password.");
  }
}else{
	redirect("change_password_instructor.html", "Please enter all fields to continue.");
}

?>