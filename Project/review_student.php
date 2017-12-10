<?php
include('session.php');
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
		<a href="quiz_student.html">
			<img id="logo" src="./Images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type">Welcome <?php echo $access_type; ?> : <?php echo $login_session; ?></div>
		
		<nav>
			<ul>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="change_password_student.php">Edit Account</a></li>				
				<li class="selected"><a href="review_student.php">Review</a></li>
				<li><a href="quiz_student.php">Quiz</a></li>
			</ul>
		</nav>
    </header>

    <div id="user_messages">
    	<span>user <?php echo $login_session; ?> has access type of <?php echo $access_type; ?></span>
	</div>
	
  <div id="content">
	  <div id="container">
			<div class="pageTitle">Begin by searching or reviewing below</div>
			
			<form class="searchBar" onsubmit="searchQuestion(); return false;" 
					method="post">
					
					<div>Search and select as many tags as you'd like to specify your search!</div>
					
					<input type="search" name="searchString" />
					<input type="submit" name="submit" value="Search"/>
					
					<div class="tags">
					
						<label for="section">Section:</label>
						<select id="section" name="section">
						  <option disabled selected value> --</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						</select>
						
						<label for="sub_section">Sub-section:</label>
						<select id="sub_section" name="sub_section">
						  <option disabled selected value> --</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						</select>
						
						<label for="subject">Subject</label>
						<select id="subject" name="subject">
						  <option disabled selected value>--</option>
						  <option value="HTML">HTML</option>
						  <option value="CSS">CSS</option>
						  <option value="PHP">PHP</option>
						  <option value="Javascript">Javascript</option>
						  <option value="Databases">Databases</option>
						</select>
						
						<label for="point_value">Worth</label>
						<select id="point_value" name="point_value">
						  <option disabled selected value> --</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6+</option>
						</select>
						
						<span> points</span>
						<div>
							<input type="checkbox" id="incorrect_questions" name="incorrect_questions" value="true">
							<label for="incorrect_questions">Only display incorrectly answered questions</label>
						</div>
					</div>
			</form>
				
			<div class="pageTitle">Your total score so far: 0/0. </div>
			
				<div class="question_in_review">
					<h1> Q1 - Section 1.0</h1>
					<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Sed sit amet augue sit amet libero pellentesque convallis. 
					Vivamus et lorem fermentum, tristique erat non, feugiat ex. 
					Nulla in leo in erat viverra venenatis vel ut massa. Vivamus 
					volutpat urna eu lacus congue, non laoreet est pulvinar.</p>
					<p>Your score: 0/0</p>		
					<div class="centered">
						<button type="button" id="button1" onclick="displayQuestion(1)">
						 View question</button>
					</div>
					<div id="question1" class="tabcontent">
						Insert question 1 here
					</div>					 
				</div>
				
			
			
			<div class="question_in_review">
				<h1> Q2 - Section 1.3</h1>
				<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Sed sit amet augue sit amet libero pellentesque convallis. 
				Vivamus et lorem fermentum, tristique erat non, feugiat ex. 
				Nulla in leo in erat viverra venenatis vel ut massa. Vivamus 
				volutpat urna eu lacus congue, non laoreet est pulvinar.</p>
				<p>Your score: 0/0</p>
				
				<div class="centered">
					<button type="button" id="button2" onclick="displayQuestion(2)">
						 View question</button>
					</div>
				<div id="question2" class="tabcontent">
					Insert question 2 here
				</div>	
			</div>  
			
			<div class="question_in_review">
				<h1> Q3 - Section 2.3</h1>
				<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Sed sit amet augue sit amet libero pellentesque convallis. 
				Vivamus et lorem fermentum, tristique erat non, feugiat ex. 
				Nulla in leo in erat viverra venenatis vel ut massa. Vivamus 
				volutpat urna eu lacus congue, non laoreet est pulvinar.</p>
				<p>Your score: 0/0</p>		
				<div class="centered">
					<button type="button" id="button3" onclick="displayQuestion(3)">
						 View question</button>
					</div>
				<div id="question3" class="tabcontent">
					Insert question 3 here
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


