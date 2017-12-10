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
				<li class="selected"><a href="add_new_question_instructor.php">Add New Question</a></li>
				<li><a href="results_instructor.php">Results</a></li>
				<li><a href="questions_instructor.php">Questions</a></li>
			</ul>
		</nav>
    </header>

	<div id="user_messages">
    	<span>user <?php echo $login_session; ?> has access type of <?php echo $access_type; ?></span>
	</div>

 <div id="content">
	 <div id="container">
	 <form class="add_new_question" onsubmit="addNewQuestion(); return false;" method="post">
	
		<div>Please fill out everything in this form to add a question to the database:</div>
		
		<div>Description:</div>
		
		<textarea name="question_description"></textarea>
		
		<div class="tags">
			<div>
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
			</div>
			
			<div>
				<label for="point_value">Worth</label>
				<input type="number" id="point_value" name="point_value" value="1">
				<span> points</span>
			</div>
			
			<div>						
				<label for="correct_answers">Number of correct answers</label>
				<input type="number" id="correct_answers" name="correct_answers" value="1">
			</div>
			
			<div>						
				<label for="start_date">Start Date</label>
				<input type="date" id="start_date" name="start_date">
			</div>
			
			<div>						
				<label for="start_time">Start Time</label>
				<input type="time" id="start_time" name="start_time">
			</div>
			
			<div>						
				<label for="end_date">End Date</label>
				<input type="date" id="end_date" name="end_date">
			</div>
			
			<div>						
				<label for="end_time">End Time</label>
				<input type="time" id="end_time" name="end_time">
			</div>
						
			<h1 class="centered">Question Logistics</h1>
			
			<div>
				<p>Select the question type:</p>
				<input type="radio" name="question_type" value="radio" onclick="addRadio();" checked="checked"> Radio<br>
				<input type="radio" name="question_type" value="checkbox" onclick="addCheckbox();"> Checkbox<br>
				<input type="radio" name="question_type" value="text" onclick="addText();"> Text<br>
				<input type="radio" name="question_type" value="true_false" onclick="addTF();"> True/False
			</div>
		</div>
		<div id="add_radio" >										
			<div>
				<div>
					<span>Number of incorrect answers: </span><input type="number" name="num_of_incorrect_answers_radio" value="3">
				</div>
					<input type="text" id="radio1" name="radio_question1" value="Enter the correct answer">
					<input type="text" id="radio2" name="radio_question2" value="Enter a incorrect answer">
					<input type="text" id="radio3" name="radio_question3" value="Enter a incorrect answer">
					<input type="text" id="radio4" name="radio_question4" value="Enter a incorrect answer">
			</div>
			
			<div>
				<span>Upload the php file for grading: </span><input type="file" id="upload1" name="php_file_for_text_question">
			</div>				
		</div>
		
		<div id="add_checkbox" class="tabcontent">
			<div>
				<div>
					<span>Number of correct answers: </span><input type="number" name="num_of_incorrect_answers" value="2">
				</div>
				<div>
					<span>Number of incorrect answers: </span><input type="number" name="num_of_incorrect_answers_check" value="2">
				</div>
					<input type="text" id="check1" name="check_question" value="Enter a correct answer">
					<input type="text" id="check2" name="check_question" value="Enter a correct answer">
					<input type="text" id="check3" name="check_question" value="Enter a incorrect answer">
					<input type="text" id="check4" name="check_question" value="Enter a incorrect answer">
			</div>
			
			<div>
				<span>Upload the php file for grading: </span><input type="file" id="upload2" name="php_file_for_text_question">
			</div>
		</div>
				
		<div id="add_text" class="tabcontent">		
			<div>
				<input type="text" id="1" name="text_question" value="Enter the correct answer">
			</div>
			
			<div>
				<span>Upload the php file for grading: </span><input type="file" id="upload3" name="php_file_for_text_question">
			</div>
		</div>
		<div id="add_tf" class="tabcontent">
			<div>
				<p>Correct Answer</p>
				<input type="radio" name="truefalse" value="true"> True<br>
				<input type="radio" name="truefalse" value="false"> False
			</div>
			
			<div>
				<span>Upload the php file for grading: </span><input type="file" id="upload4" name="php_file_for_text_question">
			</div>				
		</div>
		
		<div class="centered">
			<input type="submit" name="submit" value="Add New Question"/>
		</div>
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
			   <img class="html5" src="./Images/html5.png" alt="\'Valid\' HTML5" />
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>
	
	<script src="./web_clicker.js"></script>
	
	</body>
</html>
