<?php
include('session.php');
?>
<!doctype html>

<html lang="en">
	<head>
		<title>UWO WebCLICKER  - Student</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" media="all" href="dev.css" />
	</head>

<body>
    <header>
		<a href="quiz_student.php">
			<img id="logo" src="./images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type"><?php echo $access_type;?></div>
		
		<nav>
			<ul>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="change_password_student.php">Edit Account</a></li>				
				<li><a href="review_student.php">Review</a></li>
				<li  class="selected"><a href="quiz_student.php">Quiz</a></li>
			</ul>
		</nav>
    </header>

    <div id="user_messages">
    	user: <?php echo $login_session; ?>
	</div>

	<div id="content">
		<div class="box">
			<div class="formTitle">Begin Quiz</div>
			  <p>Click the button below to check to see if your instructor 
				  has activated a question.</p>
			  <div class="centered">
			  
				  <button type="button" id="button1" onclick="redirect()">
						   View question</button>
			  </div>
		  </div>		
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
  
  <script src="./web_clicker.js"></script>
  
  </body>
</html>


