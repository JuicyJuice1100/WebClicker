<?php
include('session.php');
?>
<!doctype html>

<html lang="en">
	<head>
		<title>UWO WebCLICKER - Instructor</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" media="all" href="dev.css" />
	</head>

<body>
    <header>
		<a href="questions_instructor.html">
			<img id="logo" src="./images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
	<div class="header_user_type">Welcome <?php echo $access_type;
	 ?> : <?php echo $login_session; ?></div>
		
		<nav>
			<ul>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="change_password_instructor.php">Edit Account</a></li>
				<li><a href="add_new_question_instructor.php">Add New Question</a></li>
				<li class="selected"><a href="results_instructor.php">Results</a></li>
				<li><a href="questions_instructor.php">Questions</a></li>
			</ul>
		</nav>
    </header>

    <div id="user_messages">
    	<span>user <?php echo $login_session; ?> has access type of
    	 <?php echo $access_type; ?></span>
	</div>
	
 <div id="content">
	 <div id="container">
	 <div class="question_in_review">
			<h1> Q3 - Section 2.3</h1>
			<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			Sed sit amet augue sit amet libero pellentesque convallis. 
			Vivamus et lorem fermentum, tristique erat non, feugiat ex. 
			Nulla in leo in erat viverra venenatis vel ut massa. Vivamus 
			volutpat urna eu lacus congue, non laoreet est pulvinar.</p>

			<div id="active_quiz_question">
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
			</form>
		</div>
			<div class="centered">
				<button type="button" onclick="deactivateQuestion(1)">
				 Deactivate</button>	 
			</div>
			<div class="centered">
				<button id="edit" type="button" onclick="editQuestion(1)">
				Edit</button>	
				<button class="delete_question" type="button" onclick="deleteQuestion(1)">
				Delete</button>
			</div>	
			<p class="centered bold">Class Average: 2/3 or 66%</p>
			<p class="centered bold">Correct Answer: Option 3</p>
			<p class="bold">Submitted Answers:</p>
			<p>Option 1: jamesk32</p>
			<p>Option 2: </p>
			<p>Option 3: calvin12, dunkod78</p>
			<p>Option 4: </p>			
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


