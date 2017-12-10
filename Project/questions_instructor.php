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
			<img id="logo" src="./Images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type">Welcome <?php echo $access_type; ?> : <?php echo $login_session; ?></div>
		
		<nav>
			<ul>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="change_password_instructor.php">Edit Account</a></li>
				<li><a href="add_new_question_instructor.php">Add New Question</a></li>
				<li><a href="results_instructor.php">Results</a></li>
				<li class="selected"><a href="questions_instructor.php">Questions</a></li>
			</ul>
		</nav>
    </header>

    <div id="user_messages">
    	<span>user <?php echo $login_session; ?> has access type of <?php echo $access_type; ?></span>
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
					
					<p>Class Average: 0/0</p>	
					
				<div class="centered">
					<button type="button" onclick="displayQuestion(1)">
					 View</button>
					 
					<button type="button" onclick="editQuestion(1)">
					Edit</button>	 
				</div>
				
				<div class="centered">
					<form class="inlineBlock" action="./results_instructor.html">
						<input type="submit" value="Activate" />
					</form>
					
					<button type="button" onclick="deactivateQuestion(1)">
					 Deactivate</button>
					 
					<button class="delete_question" type="button" onclick="deleteQuestion(2)">
					Delete</button>
				</div>
		</div>   
		<div class="question_in_review">
			<h1> Q2 - Section 1.3</h1>
			
			<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			Sed sit amet augue sit amet libero pellentesque convallis. 
			Vivamus et lorem fermentum, tristique erat non, feugiat ex. 
			Nulla in leo in erat viverra venenatis vel ut massa. Vivamus 
			volutpat urna eu lacus congue, non laoreet est pulvinar.</p>
			
			<p>Class Average: 0/0</p>		
			
			<div class="centered">
				<button type="button" onclick="displayQuestion(2)">
				 View</button>
				 <button type="button" onclick="editQuestion(2)">
				 Edit</button>	 
			</div>
			
			<div class="centered">
				<form class="inlineBlock" action="./results_instructor.html">
					<input type="submit" value="Activate" />
				</form>
				<button type="button" onclick="deactivateQuestion(2)">
				 Deactivate</button>
				 <button class="delete_question" type="button" onclick="deleteQuestion(2)">
				 Delete</button>
			</div>
			
		</div>  
		<div class="question_in_review">

			<h1> Q1 - Section 1.0</h1>
			
			<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			Sed sit amet augue sit amet libero pellentesque convallis. 
			Vivamus et lorem fermentum, tristique erat non, feugiat ex. 
			Nulla in leo in erat viverra venenatis vel ut massa. Vivamus 
			
			volutpat urna eu lacus congue, non laoreet est pulvinar.</p>
			<p>Class Average: 0/0</p>		
			
			<div class="centered">
				<button type="button" onclick="displayQuestion(3)">
				 View</button>
				 
				<button type="button" onclick="editQuestion(3)">
				Edit</button>	 
			</div>
			
			<div class="centered">
				<form class="inlineBlock" action="./results_instructor.html">
					<input type="submit" value="Activate" />
				</form>
				
				<button type="button" onclick="deactivateQuestion(3)">
				 Deactivate</button>
				 
				<button class="delete_question" type="button" onclick="deleteQuestion(2)">
				Delete</button>
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
			   <img class="html5" src="./Images/html5.png" alt="\'Valid\' HTML5" />
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>
	
	<script src="./web_clicker.js"></script>
	
	</body>
</html>


