<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';

$question = getQuestionById($_POST['questionId']);
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
		
		<div class="header_user_type">Instructor</div>
		
		<nav>
			<ul>
				<li><a href="sign_in.html">Log out</a></li>
				<li><a href="change_password_instructor.html">Edit Account</a></li>
				<li><a href="add_new_question_instructor.html">Add New Question</a></li>
				<li><a href="results_instructor.html">Results</a></li>
				<li class="selected"><a href="questions_instructor.php">Questions</a></li>
			</ul>
		</nav>
    </header>
	
 <div id="content">
	 <div id="container">
		
		<form class="add_new_question" action="create_new_question.php" method="post">

                <h1>Edit Q<?php echo $question['QuestionId'];?>  - 
				Section <?php echo $question['SectionNumber']; ?></h1>

                <div>Description:</div>

                <textarea name="question_description" required><?php echo $question['QuestionStatement'];?></textarea>

                <div class="tags">
                    <div>
					
					<?php 				
					$section = $question['SectionNumber'];
					$intpart = floor( $section );  
					$fraction = $section - $intpart; 
					?>				
                        <label for="section">Section:</label>
                        <select id="section" name="section" required>
						

                            <option value="1" <?php if ($intpart == 1) echo "selected"?>>1</option>
                            <option value="2" <?php if ($intpart == 2) echo "selected"?>>2</option>
                            <option value="3" <?php if ($intpart == 3) echo "selected"?>>3</option>
                            <option value="4" <?php if ($intpart == 4) echo "selected"?>>4</option>
                        </select>

                        <label for="sub_section">Sub-section:</label>
                        <select id="sub_section" name="sub_section" required>

                            <option value="1" <?php if ($intpart == 0.1) echo "selected"?>>1</option>
                            <option value="2" <?php if ($intpart == 0.2) echo "selected"?>>2</option>
                            <option value="3" <?php if ($intpart == 0.3) echo "selected"?>>3</option>
                            <option value="4" <?php if ($intpart == 0.4) echo "selected"?>>4</option>
                            <option value="5" <?php if ($intpart == 0.5) echo "selected"?>>5</option>
                            <option value="6" <?php if ($intpart == 0.6) echo "selected"?>>6</option>
                        </select>
						
						<?php 
						$subject = 0;
						if (strpos($question['Keyword'], 'HTML') !== false){ 
							$subject = 1;
						}
						else if (strpos($question['Keyword'], 'CSS' !== false)){
							$subject = 2;
						}
						else if (strpos($question['Keyword'], 'PHP' !== false)){
							$subject = 3;
						}
						else if (strpos($question['Keyword'], 'Javascript' !== false)){
							$subject = 4;
						}
						else if (strpos($question['Keyword'], 'Databases' !== false)){
							$subject = 5;
						}
						?>
                        <label for="subject">Subject:</label>
                        <select id="subject" name="subject" required>
                            <option value="HTML" <?php if ($subject == 1) echo "selected"?> >HTML</option>
                            <option value="CSS" <?php if ($subject == 2) echo "selected"?>>CSS</option>
                            <option value="PHP" <?php if ($subject == 3) echo "selected"?>>PHP</option>
                            <option value="Javascript" <?php if ($subject == 4) echo "selected"?>>Javascript</option>
                            <option value="Databases" <?php if ($subject == 5) echo "selected"?>>Databases</option>
                        </select>
                    </div>

                    <div>
                        <label for="point_value">Worth:</label>
                        <input type="number" id="point_value" name="point_value" value="1" required>
                        <span> points</span>
					</div>
					<div>
					<div><label for="point_value">Keywords(separated by spaces):</label></div>
						<input type="text" name="keywords" value="<?php echo $question['Keyword']; ?>">
                    </div>

                    <h1 class="centered">Question Logistics</h1>

                    <div>
                        <p>Select the question type:</p>
                        <input type="radio" name="question_type" value="1" onclick="addRadio();" required> Radio
                        <br>
                        <input type="radio" name="question_type" value="2" onclick="addCheckbox();" required> Checkbox
                        <br>
                        <input type="radio" name="question_type" value="3" onclick="addText();" required> Text
                        <br>
                        <input type="radio" name="question_type" value="0" onclick="addTF();" required> True/False
                    </div>
                </div>
                <div id="add_radio">
                    <div>
                        <div>
                            <span>Number of answers: </span>
                            <input type="number" name="num_of_answers_radio" onchange="addRadioOptions()" id="num_of_answers_radio" value="4">
                        </div>

                        <div id="radio_container">
                            <!-- uses javascript to populate based on value 
					in num_of_correct_answers_radio -->
                        </div>
                    </div>
                </div>

                <div id="add_checkbox" class="tabcontent">

                    <div>
                        <span>Number of answers: </span>
                        <input type="number" name="num_of_answers_checkbox" onchange="addCheckBoxOptions()" id="num_of_answers_checkbox" value="4">
                    </div>

                    <div id="checkbox_container">
                        <!-- uses javascript to populate based on value 
					in num_of_correct_answers_checkbox -->
                    </div>
                </div>

                <div id="add_text" class="tabcontent">
                    <div>
                        <input type="text" id="1" name="answer_text" placeholder="Enter the correct answer">
                    </div>

                </div>
                
                <div id="add_tf" class="tabcontent">
                    <div>
                        <p>Correct Answer</p>
                        <input type="radio" name="answer_true_false" value="true"> True
                        <br>
                        <input type="radio" name="answer_true_false" value="false"> False
                    </div>
                </div>

                <div class="centered">
                    <input type="submit" name="submit" value="Submit Changes">
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
			   <img class="html5" src="./images/html5.png" alt="\'Valid\' HTML5" />
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>
	
	<script src="./web_clicker.js"></script>
	
	</body>
</html>

