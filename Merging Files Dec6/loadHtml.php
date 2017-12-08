<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';

//In student: Onclick of show question// or on click go to this page?
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
      </head>
  <body>
   <header>
          <a href="quiz_student.html">
              <img id="logo" src="./images/logo.png"
                     width="250" alt="UWO WebCLICKER logo" />
          </a>
          
          <div class="header_user_type">Student</div>
          
          <nav>
              <ul>
                  <li><a href="sign_in.html">Log out</a></li>
                  <li><a href="change_password_student.html">Edit Account</a></li>
                  <li><a href="review_student.html">Review</a></li>
                  
                  <li class="selected"><a href="quiz_student.html">Quiz</a></li>
              </ul>
          </nav>
      </header>

  <div id="content">
    <div id="container">
      <div class="question_in_review">
        <div id="submittedAnswer">
<!----------------Insert Question HTML from Database--------------------------->
          <?php
            $submission = getSubmission($questionId, $studentId);
            $studentSubmission = $submission['StudentSubmission'];
            if(isset($studentSubmission)){
              $pointsEarned = $submission['PointsEarned'];
              $question = getQuestionById($questionId);
              $correctAnswer = $question['CorrectAnswer'];
              $numberOfPoints = $question['NumberOfPoints'];
              $splashMsg = "You submitted: $studentSubmission. The correct ".
              "answer was $correctAnswer. You earned $pointsEarned point(s) ".
              "out of a total of $numberOfPoints point(s).";
             echo $splashMsg."</div>"; 
           }
           echo $questionStatement; ?>
  <!--------------------------------------------------------------------------->
	      </div>      
      </div>            
    </div> 
  </div>           
  </body>
  </html>        
  <?php
    return 0;
}
  else{
    
    
    header('Location:quiz_student.html');
   
}
}


?>
