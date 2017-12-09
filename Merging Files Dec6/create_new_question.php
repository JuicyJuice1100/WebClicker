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
        <a href="quiz_student.html">
            <img id="logo" src="./images/logo.png"
                   width="250" alt="UWO WebCLICKER logo" />
        </a>
        
        <div class="header_user_type">Instructor</div>
        
        <nav>
          <ul>
            <li><a href="sign_in.html">Log out</a></li>
            <li><a href="change_password_instructor.html">Edit Account</a></li>
            <li class="selected"><a href="add_new_question_instructor.html">
            Add New Question</a></li>
            <li><a href="results_instructor.html">Results</a></li>
            <li><a href="questions_instructor.html">Questions</a></li>
          </ul>

        </nav>
    </header>

<?php
    switch ($questionType) {
    case '3': //Short Answer
    
    $correctAnswer = $_POST['answer_text'];
    
?>
    
    <div id="content">
		<div id="container">
			<?php	ob_start();	 ?>
			 <div>
				<h1>
					<?php echo $questionId; ?> - Section 
					<?php echo $sectionNumber;?>			
				</h1>               
				<form action="grade.php" method="post">                    
					<div class="bold">Short Answer.</div>
					<div><?php echo $topicDescription; ?></div>
					<div>
						<input type="text" name="answer"/>
					</div>
					<?php
				 echo '<input type="hidden" name="questionId" value="'.$questionId.'">';
				 ?>
					<div class="centered">
            <input id = "submitButton" type = "submit" value="Submit"/> 
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
		       
			
			          
		</div>            
    </div> 
</body>
</html>
 
<?php
        break;
        case '0': //TrueFalse
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
				
			<form action="grade.php" method="post">                    
				<div class="bold">True or False</div>
				<div>
					<?php echo $topicDescription; ?>
				</div>        
				<div>
					<input type="radio" name="truefalse" value="true"> True<br>
					<input type="radio" name="truefalse" value="false"> False
				</div>
				<?php
				 echo '<input type="hidden" name="questionId" value="'.$questionId.'>';
				 ?>
					<div class="centered">
            <input id = "submitButton" type = "submit" value="Submit"/>
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
				

			
     
    </div>            
    </div>            
</body>
</html>        
<?php
            break;
        case '1': //Radio
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
            
            <form action="grade.php" method="post">                    
                <div class="bold">Radio(Select one answer)</div>
				<div>
				<?php echo $topicDescription; ?>
				</div>        
                <div>
                
<?php			
          
            $numAnswers = $_POST['num_of_answers_radio'] + 1;
            $letter = chr(97);
            for ($i = 1; $i < $numAnswers; $i++) {
                $question = $_POST['radio_question' . $i];
                echo '<span>('.$letter.')</span>';
                $letter++;
                echo '<input type="radio" name="answer" value="'.$i.'">' . $question .
                '<br />';
            }
            
?>                
                    
                </div>
            <?php
				 echo '<input type="hidden" name="questionId" value="'.$questionId.'">';
				 ?>
					<div class="centered">
            <input id = "submitButton" type = "submit" value="Submit"/>
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
            

        
    </div>            
    </div>            
</body>
</html>        

<?php
        break;
        case '2': //MultipleChoice
?>
<div id="content">
     <div id="container">
<?php	ob_start();	 ?>
     <div>
            <h1>
				Q<?php echo $questionId; ?> - Section 
				<?php echo $sectionNumber;?>  			
			</h1>           
            <form action="grade.php" method="post">                    
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
            $letter = chr(97);
            for ($i = 1; $i < $numAnswers; $i++) {
                $question = $_POST['checkbox_question' . $i];
                echo '<span>('.$letter.')</span>';
                $letter++;
                echo '<input type="checkbox" name="'.$i.'"value="'.
                $i.'" id="Option'.$i.'"">'.$question.'<br />';
            }            
?>                
                    
				</div>
				<?php
				 echo '<input type="hidden" name="questionId" value="'.$questionId.'">';
				 ?>
					<div class="centered">
            <input id ="submitButton" type = "submit" value="Submit"/>
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
             
    </div>            
    </div>    
</body>
</html>    


<?php
	break;
	}
    echo '<script> document.getElementById("submitButton").disabled = true;</script>';
  	insertQuestion($questionId, $questionStatement, $correctAnswer, $numberOfPoints, 
    $topicDescription, $keywords, $sectionNumber, NULL, $numberOfCorrectAnswers,
    NULL, NULL, NULL, 0, $questionType);
}
?>
