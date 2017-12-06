<?php

require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$questionId = getLastQuestionNumber();
	$numberOfCorrectAnswers = 1;
	  if($questionId['LastQuestionId'] == null){ 
		   $questionId = 0;
	  }else{
		  $questionId = $questionId['LastQuestionId'] + 1;
	  }
	
    $topicDescription  = $_POST['question_description'];
    $section        = $_POST['section'];
    $subSection     = $_POST['sub_section'];
    $subject        = $_POST['subject'];
    $numberOfPoints    = $_POST['point_value'];
    $questionType   = $_POST['question_type'];
    
    $sectionNumber = doubleval($section.".".$subSection);


	$keywords  = $_POST['keywords'] . " " . $subject . " " . $sectionNumber;
	

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
                <li class="selected"><a href="add_new_question_instructor.html">Add New Question</a></li>
                <li><a href="results_instructor.html">Results</a></li>
                <li><a href="questions_instructor.html">Questions</a></li>
            </ul>
        </nav>
    </header>

<?php
    switch ($questionType) {
    case '3':
    
    $correctAnswer = $_POST['answer_text'];
?>
    
    <div id="content">
		<div id="container">
			<?php	ob_start();	 ?>
			 <div>
				<h1>
					Q<?php echo $questionId; ?> - Section 
					<?php echo $sectionNumber;?>			
				</h1>               
				<form>                    
					<div class="bold">Short Answer.</div>
					<div><?php echo $topicDescription; ?></div>
					<div>
						<input type="text" name="answer"/>
					</div>
				</form>
			<div id="yourResults"></div>
			<div id="correctAnswer"></div> 
            <div id="classResults"></div>
</div> 
<?php 
    $questionStatement =  ob_get_contents();
    ob_end_flush();
?>     
				<div class="centered">
					<input type="button" name="submit" value="Submit Answer"/>
				</div>        
			
			          
		</div>            
    </div> 
</body>
</html>
 
<?php
        break;
        case '0':
        $correctAnswer = $_POST['answer_true_false'];
?>
   <div id="content">
     <div id="container">
	<?php	ob_start();	 ?>
		 <div>
			<h1>
				Q<?php echo $questionId; ?> - Section 
				<?php echo $sectionNumber;?>
			</h1>
				
			<form>                    
				<div class="bold">True or False</div>
				<div>
					<?php echo $topicDescription; ?>
				</div>        
				<div>
					<input type="radio" name="truefalse" value="true"> True<br>
					<input type="radio" name="truefalse" value="false"> False
				</div>
			</form>
			<div id="yourResults"></div>
			<div id="correctAnswer"></div> 
            <div id="classResults"></div>
</div>
<?php 
    $questionStatement =  ob_get_contents();
    ob_end_flush();
?>  
				<div class="centered">
					<input type="button" name="submit" value="Submit Answer"/>
				</div> 

			
     
    </div>            
    </div>            
</body>
</html>        
<?php
            break;
        case '1':
        $correctAnswer = $_POST['answer_radio'];
?>

<div id="content">
     <div id="container">
<?php	ob_start();	 ?>
     <div>
            <h1>
				Q<?php echo $questionId; ?> - Section 
				<?php echo $sectionNumber;?>  			
			</h1>
            
            <form>                    
                <div class="bold">Radio(Select one answer)</div>
				<div>
				<?php echo $topicDescription; ?>
				</div>        
                <div>
                
<?php			
            $numAnswers = $_POST['num_of_answers_radio'] + 1;
            
            for ($i = 1; $i < $numAnswers; $i++) {
                $question = $_POST['radio_question' . $i];
                echo '<input type="radio" name="q1" value="true">' . $question . '<br>';
            }
            
?>                
                    
                </div>
            </form>
			<div id="yourResults"></div>
			<div id="correctAnswer"></div> 
            <div id="classResults"></div>
<?php 
    $questionStatement =  ob_get_contents();
    ob_end_flush();
?> 
	</div>  
            <div class="centered">
                <input type="button" name="submit" value="Submit Answer"/>
            </div> 

        
    </div>            
    </div>            
</body>
</html>        

<?php
        break;
        case '2': 
?>
<div id="content">
     <div id="container">
<?php	ob_start();	 ?>
     <div>
            <h1>
				Q<?php echo $questionId; ?> - Section 
				<?php echo $sectionNumber;?>  			
			</h1>           
            <form>                    
                    <div class="bold">Checkbox(Select answers)</div>
                    <div>
						<?php echo $topicDescription;?>
					</div>        
			<div>
                
<?php
			$numberOfCorrectAnswers = 0;
			$correctAnswer = "";
			for ($i = 1; $i < 10; $i++) {
				if(isset($_POST[$i])){
				 $numberOfCorrectAnswers++;
				 $correctAnswer = $correctAnswer.$_POST[$i];
				}
			}
            $numAnswers = $_POST['num_of_answers_checkbox'] + 1;
            
            for ($i = 1; $i < $numAnswers; $i++) {
                $question = $_POST['checkbox_question' . $i];
                echo '<input type="checkbox" name="q1" value="true">' . $question . '<br>';
            }
            
?>                
                    
				</div>
            </form>
        </div>
			<div id="yourResults"></div>
			<div id="correctAnswer"></div> 
            <div id="classResults"></div>
<?php 
    $questionStatement =  ob_get_contents();
    ob_end_flush();
?>
            <div class="centered">
                <input type="button" name="submit" value="Submit Answer"/>
            </div>  


               
    </div>            
    </div>            
</body>
</html>    


<?php

	break;
	}
       
  	 insertQuestion($questionId, $questionStatement, $correctAnswer, $numberOfPoints, 
    $topicDescription, $keywords, $sectionNumber, NULL, $numberOfCorrectAnswers,
    NULL, NULL, NULL, 0, $questionType);
}
?>
