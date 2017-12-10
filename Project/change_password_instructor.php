<?php
include('session.php');
include('password_instructor.php');
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
		<a href="questions_instructor.html">
			<img id="logo" src="./Images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type">Welcome <?php echo $access_type; ?> : <?php echo $login_session; ?></div>
		
		<nav>
			<ul>
				<li><a href="logout.php">Log out</a></li>
				<li class="selected"><a href="change_password_instructor.php">Edit Account</a></li>
				<li><a href="add_new_question_instructor.php">Add New Question</a></li>
				<li><a href="results_instructor.php">Results</a></li>
				<li><a href="questions_instructor.php">Questions</a></li>
			</ul>
		</nav>
    </header>

    <div id="user_messages">
    	<span>user <?php echo $login_session; ?> has access type of <?php echo $access_type; ?></span><br>
    	<span><?php echo $error; ?></span>
	</div>

<div id="content">
      <form class="box" action="" method="post">
			
        <div class="formTitle">Change password</div>
		
        <div class="textInput">
          <label for="username_instructor">Username:</label>
          <input type="text" class="readonly" id="username_instructor"  name="username_instructor"
                readonly
                value="<?php echo $login_session; ?>"/>
        </div><br />
		
        <div class="textInput">
          <label for="oldPassword_instructor">Old password:</label>
          <input type="password" id="oldPassword_instructor" name="oldPassword_instructor"
                value=""/>
        </div><br />
		
        <div class="textInput">
          <label for="newPassword_instructor">New password:</label>
          <input type="password" id="newPassword_instructor" name="newPassword_instructor"
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

        <span><?php echo $error; ?></span>
		
        <div class="centered">
          <input id="instructor_submit" type="submit" name="instructor_submit" value="Change password"  />
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
			   <img class="html5" src="./Images/html5.png" alt="\'Valid\' HTML5" />
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>
	
	<script src="./web_clicker.js"></script>
	
	</body>
</html>

