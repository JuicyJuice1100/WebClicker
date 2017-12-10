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

session_start(); // start session
$error=''; // error message variable

if (isset($_POST['submit_instructor'])) {
	if (empty($_POST['username_instructor']) || empty($_POST['password_instructor'])) {
		$error = "Error Instructor : username or password field is empty";
	}
	else{

		// Define $username and $password
		$username=$_POST['username_instructor'];
		$password=$_POST['password_instructor'];

		// Establish connection (this is already established)
		// $connection = mysql_connect("localhost", "team1", "steam1", "team1");

    // protect against SQL injection for security
    // (don't have to worry because we don't )
		// $username = stripslashes($username);
		// $password = stripslashes($password);
		// $username = mysql_real_escape_string($username);
		// $password = mysql_real_escape_string($password);

		// select database (this is already established)
		// $db = mysql_select_db("team1", $connection);

    // SQL query to fetch information of registerd users and finds user match.
    
		// $query = mysql_query("SELECT * FROM Instructor WHERE HashedPassword='$password' AND Username='$username'", $connection);
		// $rows = mysql_num_rows($query);
		// if ($rows == 1) {
		// 	$_SESSION['login_user']=$username; // initialize session variables
		// 	$_SESSION['instructor']=true;
		// 	header("location: profile.php"); // redirect to user account type home page
		// } else {
		// 	$error = "Error Instructor : username or password is incorrect";
		// }

	// mysql_close($connection); // close connection
  
    $query = getInstructorPasswordByUsername($username);
    if($query["HashedPassword"] === crypt($password, $query["HashedPassword"]){
      $_SESSION['login_user']=$username; // initialize session variables
			$_SESSION['instructor']=true;
			header("location: profile.php"); // redirect to user account type home page
    } else {
      $error = "Error Instrucotr : username or password is incoreect";
    }
    
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

		// // Establish connection
		// $connection = mysql_connect("localhost", "team1", "steam1", "team1");

		// // protect against SQL injection for security
		// $username = stripslashes($username);
		// $password = stripslashes($password);
		// $username = mysql_real_escape_string($username);
		// $password = mysql_real_escape_string($password);

		// // select database
		// $db = mysql_select_db("team1", $connection);

		// // SQL query to fetch information of registerd users and finds user match.
		// $query = mysql_query("SELECT * FROM Student WHERE HashedPassword='$password' AND Username='$username'", $connection);
		// $rows = mysql_num_rows($query);
		// 	if ($rows == 1) {
		// 	$_SESSION['login_user']=$username; // initialize session variables
		// 	$_SESSION['instructor']=false;
		// 	header("location: profile.php"); // redirect to user account type home page
		// } else {
		// 	$error = "Error Student : username or password is incorrect";
		// }

  // mysql_close($connection); // close connection
  $query = getStudentPasswordByUsername($username);
  if($query["HashedPassword"] === crypt($password, $query["HashedPassword"]){
    $_SESSION['login_user']=$username; // initialize session variables
    $_SESSION['instructor']=true;
    header("location: profile.php"); // redirect to user account type home page
  } else {
    $error = "Error Student : username or password is incoreect";
  }
	}
}

?>