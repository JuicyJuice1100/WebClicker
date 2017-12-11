<?php
require_once '../../Private/queries.php';
require_once '../../Private/dbCredentials.php';
require_once '../../Private/initialize.php';

if(isset($_POST['questionId'])){
	$question = getQuestionById($_POST['questionId']);
}	
	
?>

<!doctype html>

<html lang="en">
<head>
	<title>UWO WebCLICKER - Instructor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="all" href="../dev.css" />
	<script src="../../Private/web_clicker.js"></script>
</head>

<body>
    <header>
		<a href="questions.php">
			<img id="logo" src="../images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type">Instructor</div>
		
		<nav>
			<ul>
				 <li><a href="../../Private/logout.php">Log out</a></li>
				<li><a href="change_password.php">Edit Account</a></li>
				<li><a href="add_new_question.php">Add New Question</a></li>
				<li class="selected"><a href="questions.php">Questions</a></li>
			</ul>
		</nav>
    </header>
	
 <div id="content">
	 <div id="container">
		
		<form class="add_new_question" action="./questions.php" method="post">

                <h1>Edit Q<?php echo $question['QuestionId'];?>  - 
				Section <?php echo $question['SectionNumber']; ?></h1>
				<input type="hidden" name="questionId" value="<?php echo $question['QuestionId'];?>" />
				<input type="hidden" name="section" value="<?php echo $question['SectionNumber']; ?>" />
			
                <div>Description:</div>

                <textarea name="question_description" required><?php echo $question['QuestionStatement'];?></textarea>

                <div class="tags">
                    <div>
					
					<?php 				
					$section = $question['SectionNumber'];
					$intpart = floor( $section );  
					$fraction = $section - $intpart .""; 
					

					?>				
                        <label for="section">Section:</label>
                        <select id="section" name="section">								
                            <option value="1" <?php if ($intpart == 1) echo "selected"?>>1</option>
                            <option value="2" <?php if ($intpart == 2) echo "selected"?>>2</option>
                            <option value="3" <?php if ($intpart == 3) echo "selected"?>>3</option>
                            <option value="4" <?php if ($intpart == 4) echo "selected"?>>4</option>
                        </select>

                        <label for="sub_section">Sub-section:</label>
                        <select id="sub_section" name="sub_section">

                            <option value="1" <?php if ($fraction == "0.1") echo "selected"?>>1</option>
                            <option value="2" <?php if ($fraction == "0.2") echo "selected"?>>2</option>
                            <option value="3" <?php if ($fraction == "0.3") echo "selected"?>>3</option>
                            <option value="4" <?php if ($fraction == "0.4") echo "selected"?>>4</option>
                            <option value="5" <?php if ($fraction == "0.5") echo "selected"?>>5</option>
                            <option value="6" <?php if ($fraction == "0.6") echo "selected"?>>6</option>
                        </select>
						
						<?php 
						$subject = 0;
						if (preg_match('/HTML/',$question['Keyword'])){ 
							$subject = 1;
						}
						else if (preg_match('/CSS/',$question['Keyword'])){
							$subject = 2;
						}
						else if (preg_match('/PHP/',$question['Keyword'])){
							$subject = 3;
						}
						else if (preg_match('/Javascript/',$question['Keyword'])){
							$subject = 4;
						}
						else if (preg_match('/Databases/',$question['Keyword'])){
							$subject = 5;
						}

						?>
                        <label for="subject">Subject:</label>
                        <select id="subject" name="subject">
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
               

                <div class="centered">
                    <input type="submit" name="submitEdit" value="Submit Changes">
                </div>
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
			<a href="https://validator.w3.org/check?uri=referer">
			   <img class="html5" src="../images/html5.png" alt="\'Valid\' HTML5" />
			  </a>
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>
	
	<script src="../../Private/web_clicker.js"></script>
	
	</body>
</html>

