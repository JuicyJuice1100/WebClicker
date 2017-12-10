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
		<a href="quiz_student.html">
			<img id="logo" src="./images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type">Welcome <?php echo $access_type; ?> : <?php echo $login_session; ?></div>
		
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
    	<span>user <?php echo $login_session; ?> has access type of <?php echo $access_type; ?></span>
	</div>

	<div id="content">
		<div class="box">
			<div class="formTitle">Begin Quiz</div>
			<p>Click the button below to check to see if your instructor 
				has activated a question.</p>
			<div class="centered">
				<button type="button" id="button1" onclick="displayQuestion(1)">
						 View question</button>
			</div>
			<div id="question1" class="tabcontent">
				<form>
					<div class="bold">Select the Correct Answer</div>
					
					<div>From this php code, what ends up being printed?</div>
<pre>	
<code>	
	&lt;?php
		$var1 = 3;
		$var2 = 4;
		$var3 = $var1 * $var2;
		echo $var3;
		
		if($var3 === "12"){
			echo "Option 1";
		}
		else if($var3 == "12"){
			echo "Option 2";
		}
		else if($var3 == 12.0){
			echo "Option 3";
		}
		else{
			echo "Option 4";
		}
	?&gt;
</code>
</pre>
				<div>
					<input type="radio" name="answer" value="value1"/>
						Option 1
					
				</div>
				<div>
					<input type="radio" name="answer" value="value2"/>
						Option 2
					
				</div>
				<div>
					<input type="radio" name="answer" value="value3"/>
						Option 3
				
				</div>
				<div>
					<input type="radio" name="answer" value="value4"/>
						Option 4
				
				</div>
			<div class="centered">
				<input type="button" name="submit" value="Submit Answer"/>
			</div>
		</form>
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
           <img class="html5" src="./images/html5.png" alt="\'Valid\' HTML5" />
    </div>

    <div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
  </footer>
  
  <script src="./web_clicker.js"></script>
  
  </body>
</html>

