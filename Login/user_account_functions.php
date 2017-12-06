<?php

session_start();
// student instructions
function is_password_correct_student($name, $password) {	
  $db = new PDO("mysql:host=LocalHost;dbname=team1", "team1", "steam1");
  $name = $db->quote($name);
  $rows = $db->query("SELECT HashedPassword FROM Student WHERE Username = $name");
  if ($rows) {
    foreach ($rows as $row) {
      $correct_password = $row["HashedPassword"];
      return $password === $correct_password;
    }
  } else {
    return FALSE;
  }
}

function change_password_student($name, $password, $newPassword){
	
	$db = new PDO("mysql:host=LocalHost;dbname=team1", "team1", "steam1");
	$name = $db->quote($name);

	$result = mysql_query("SELECT * FROM Student WHERE Username='".$_POST[$name] . "' AND HashedPassword='".md5( $_POST[$oldPassword] )."'";);
  $row    = mysql_fetch_array($result);
	mysql_query("UPDATE Student SET HashedPassword='" .md5($_POST[$newPassword]) . "' WHERE Username='" . $_SESSION[$name] . "'");
}


// instructor functions
function is_password_correct_instructor($name, $password) {	
  $db = new PDO("mysql:host=LocalHost;dbname=team1", "team1", "steam1");
  $name = $db->quote($name);
  $rows = $db->query("SELECT HashedPassword FROM Instructor WHERE Username = $name");
  if ($rows) {
    foreach ($rows as $row) {
      $correct_password = $row["HashedPassword"];
      return $password === $correct_password;
    }
  } else {
    return FALSE;
  }
}

function change_password_instructor($name, $password, $newPassword){
	
	$db = new PDO("mysql:host=LocalHost;dbname=team1", "team1", "steam1");
	$name = $db->quote($name);

	$result = mysql_query("SELECT * FROM Instructor WHERE Username='".$_POST[$name] . "' AND HashedPassword='".md5( $_POST[$oldPassword] )."'";);
  $row    = mysql_fetch_array($result);
	mysql_query("UPDATE Instructor SET HashedPassword='" .md5($_POST[$newPassword]) . "' WHERE Username='" . $_SESSION[$name] . "'");
}

?>