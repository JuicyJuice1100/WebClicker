<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';
function loadHtmlFile($questionId, $studentId){
  if(isset($questionId)){
    $question = getQuestionById($questionId);
    $questionStatement = $question['QuestionStatement']; ?>
  <!doctype html>

  <html lang="en">
      <head>
          <title>UWO WebCLICKER - Student</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" media="all" href="dev.css" />
          <script src="splashMsg.js"></script>
      </head>
  <body>
   <header>
          <a href="quiz_student.html">
              <img id="logo" src="./images/logo.png"
                     width="250" alt="UWO WebCLICKER logo" />
          </a>
          
          <div class="header_user_type">Welcome <?php echo $access_type;
		 ?> : <?php echo $login_session; ?></div>
		
		<nav>
			<ul>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="change_password_student.php">Edit Account</a></li>				
				<li><a href="review_student.php">Review</a></li>
				<li class="selected"><a href="quiz_student.php">Quiz</a></li>
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
        <div id="submittedAnswer">
<!----------------Insert Question HTML from Database--------------------------->
          <?php
            echo $questionStatement; 
            $submission = getSubmission($questionId, $studentId);
            $studentSubmission = $submission['StudentSubmission'];
            if(isset($studentSubmission)){
              $pointsEarned = $submission['PointsEarned'];
              $question = getQuestionById($questionId);
              $correctAnswer = $question['CorrectAnswer'];
              $numberOfPoints = $question['NumberOfPoints'];
              $questionStatus = $question['QuestionStatus'];
              
              if($questionStatus === 0 || $questionStatus === 3) {
                $splashMsg = "You submitted: $studentSubmission. The correct ".
                "answer was $correctAnswer. You earned $pointsEarned point(s) ".
                "out of a total of $numberOfPoints point(s).";
              }
              else {
                 $splashMsg = makeSplashMsg($studentSubmission, $correctAnswer,
                       $pointsEarned, $numberOfPoints);
              }
             echo $splashMsg."</div>"; 
           }
    ?>
<!----------------------------------------------------------------------------->
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
  </body>
  </html>        
  <?php
    return 0;
}
  else{
    header('Location:quiz_student.php');  
  }
}

function makeSplashMsg($studentSubmission, $correctAnswer,
                       $pointsEarned, $numberOfPoints){
    
  $splashMsg = "You submitted: ";            
  $strlen = strlen($studentSubmission);
  for($i = 0; $i < $strlen; $i++ ) {
    $char = substr($studentSubmission, $i, 1);
    $num = $char + 97 - 1;
    $optionText = chr($num); 
    $splashMsg .= $optionText." ";
  }
  
  $splashMsg .= ". The correct answer was ";      
  $strlen = strlen($correctAnswer);
  for($i = 0; $i < $strlen; $i++ ) {
    $char = substr($correctAnswer, $i, 1);
    $num = $char + 97 - 1;
    $optionText = chr($num); 
    $splashMsg .= $optionText." ";
  }   
             
  $splashMsg .= ". You earned $pointsEarned point(s) ".
              "out of a total of $numberOfPoints point(s).";    
              
  return $splashMsg;
}
?>
