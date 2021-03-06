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
    <script src="./web_clicker.js"></script>
</head>

<body>
    <header>
        <a href="questions_instructor.php">
            <img id="logo" src="./images/logo.png" width="250" alt="UWO WebCLICKER logo" />
        </a>

        <div class="header_user_type"><?php echo $access_type; ?></div>

        <nav>
            <ul>
              <li><a href="logout.php">Log out</a></li>
              <li><a href="change_password_instructor.php">
              Edit Account</a></li>
              <li class="selected"><a href="add_new_question_instructor.php">
              Add New Question</a></li>
              <li><a href="questions_instructor.php">Questions</a></li>
            </ul>
        </nav>
    </header>
    <div id="user_messages">
    	user <?php echo $login_session; ?>
	  </div>
    <div id="content">
        <div id="container">
            <form class="add_new_question" action="create_new_question.php" method="post">

                <div>Please fill out everything in this form to add a question to the database:</div>

                <div>Description:</div>

                <textarea name="question_description" required></textarea>

                <div class="tags">
                    <div>
                        <label for="section">Section:</label>
                        <select id="section" name="section" required>
                            <option disabled selected value> --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                        <label for="sub_section">Sub-section:</label>
                        <select id="sub_section" name="sub_section" required>
                            <option disabled selected value> --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>

                        <label for="subject">Subject:</label>
                        <select id="subject" name="subject" required>
                            <option disabled selected value>--</option>
                            <option value="HTML">HTML</option>
                            <option value="CSS">CSS</option>
                            <option value="PHP">PHP</option>
                            <option value="Javascript">Javascript</option>
                            <option value="Databases">Databases</option>
                        </select>
                    </div>

                    <div>
                        <label for="point_value">Worth:</label>
                        <input type="number" id="point_value" name="point_value" value="1" required>
                        <span> points</span>
					</div>
					<div>
					<div><label for="point_value">Keywords(separated by spaces):</label></div>
						<input type="text" name="keywords" placeholder="Keywords">
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
                    <input type="submit" name="submit" value="Add New Question">
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="validated">
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" />
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
