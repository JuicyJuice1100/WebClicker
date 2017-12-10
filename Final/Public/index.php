<?php
include('../Private/login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: ../Private/profile.php");
}
?>

<!doctype html>

<html lang="en">
	<head>
		<title>UWO WebCLICKER</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" media="all" href="dev.css" />
	</head>

<body>

  <header>
    <img id="logo" src="./images/logo.png"
             width="250" alt="UWO WebClicker logo" />
  </header>

	<div id="content">
		<div class="tab centered">
			<button class="tablinks" onclick="openTab(event, 'student')" id="defaultOpen">Student</button>
			<button class="tablinks" onclick="openTab(event, 'instructor')">instructor</button>
		</div>
		
		
		<div id="student" class="tabcontent">
		  <form class="box" action="" method="post">
		  
			<div class="formTitle">Welcome Student</div>
			
			<div class="textInput">
			  <label for="username_student">Username:</label>
			  <input type="text" id="username_student" name="username_student" size="12" value=""/>
			</div><br />
			
			<div class="textInput"> 
			  <label for="password_student">Password:</label>
			  <input type="password" id="password_student" name="password_student" size="12" value="" />
			</div>
			
			<div class="centered">
			  <input id='submit_student' type='submit' name='submit_student' value='Log In'  />
			</div>
			
			<span><?php echo $error; ?></span>

		  </form>
		</div>
		
		
		<div id="instructor" class="tabcontent">
			<form class="box" action="" method="post">
			
				<div class="formTitle">Welcome Instructor</div>
				
				<div class="textInput">
				  <label for="username_instructor">Username:</label>
				  <input type="text" id="username_instructor" name="username_instructor" size="12"
						 value=""/>
				</div><br />
				
				<div class="textInput"> 
				  <label for="password_instructor">Password:</label>
				  <input type="password" id="password_instructor" name="password_instructor" size="12" value="" />
				</div>
				
				<div class="centered">
				  <input id='submit_instructor' type='submit' name='submit_instructor' value='Log In'  />
				</div>
				
				<span><?php echo $error; ?></span>

			  </form>
		</div>	
	</div>

	<footer>
		<div class="validated">
			 <a href="http://jigsaw.w3.org/css-validator/check/referer">
			   <img
				   src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
				  alt="Valid CSS!" />
			</a>
		</div>
		
		<div class="validated">	
			<a href="https://validator.w3.org/check?uri=referer">
			   <img class="html5" src="./images/html5.png" alt="\'Valid\' HTML5" />
			  </a>
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>

	<script src="../Private/web_clicker.js"></script>
	
	</body>
</html>


