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
		<a href="quiz_student.html">
			<img id="logo" src="./images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type">Student</div>
		
		<nav>
			<ul>
				<li><a href="sign_in.html">Log out</a></li>
				<li class="selected"><a href="change_password_student.html">Edit Account</a></li>				
				<li><a href="review_student.html">Review</a></li>
				<li><a href="quiz_student.html">Quiz</a></li>
			</ul>
		</nav>
    </header>

<div id="content">
      <form class="box" onsubmit="submitPasswordChangeStudent(); return false;"
            method="post">
			
		<div class="formTitle">Change password</div>
		
		<div class="textInput">
		  <label for="username_student">Username:</label>
		  <input type="text" class="readonly" id="username_student"  name="username_student"
				readonly
				value="dunkod78"/>
		</div><br />
		
		<div class="textInput">
		  <label for="oldPassword_student">Old password:</label>
		  <input type="password" id="oldPassword_student" name="oldPassword_student"
				value=""/>
		</div><br />
		
		<div class="textInput">
		  <label for="newPassword_student">New password:</label>
		  <input type="password" id="newPassword_student" name="newPassword_student"
				 value=""/>
		</div><br />
		
		<div class="textInput">
		  <label for="confirm">Confirm new password:</label>
		  <input type="password" id="confirm" name="confirm"
						  value=""/>
		</div>
		
		<div id="pwdconstraints">
		  <p>
			Your password MUST meet all three requirements below:
		  </p>
		  <ol>
			 <li>It must contain AT&nbsp;LEAST&nbsp;8 characters.</li>
			 <li>It may NOT appear in Cain &amp; Abel's dictionary of common
				 passwords.</li>
			 <li>It may NOT contain your username as a substring.</li>
		  </ol>
		</div>
		
		<div class="centered">
		  <input type="submit" name="submit" value="Change password"  />
		</div>
      </form>
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
	
	<script src="./web_clicker.js"></script>
	
	</body>
</html>

