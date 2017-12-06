<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';



/*Test here: http://webdev.cs.uwosh.edu/students/seymej72/TeamProject/grade.php 
  Need to delete StudentSubmissionId 1 from phpMyAdmin after a submittion to 
  retest.*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $studentId = 1; //= $_COOKIE['studentId'];Get from cookie/session?
  $questionId = $_POST['questionId'];
  $studentSubmission = getSubmission($questionId, $studentId)['StudentSubmission'];
  $pointsEarned;

  if(!isset($studentSubmission)){
    $question = getQuestionById($questionId);
    //echo '<pre>';
    //print_r($question);
    // echo '</pre>';
    $questionStatement = $question['QuestionStatement'];
    $correctAnswer = $question['CorrectAnswer'];
    $numberOfPoints = $question['NumberOfPoints'];
    $topicDescription = $question['TopicDescription'];
    $keyword = $question['Keyword'];
    $sectionNumber = $question['SectionNumber'];
    $phpGraderCode = $question['PhpGraderCode'];
    $numberOfCorrectAnswers = $question['NumberOfCorrectAnswers'];
    $averagePoints = $question['AveragePoints'];
    $startTime = $question['StartTime'];
    $endTime = $question['EndTime'];
    $questionStatus = $question['QuestionStatus'];
    $questionType = $question['QuestionType'];

    $studentSubmission = $_POST["answer"]; 
    //echo "The student submitted: $studentSubmission. The correctAnswer was: ".
   // "$correctAnswer. <br />";

    
    switch ($questionType) {
      case 0: //True or False
          if($studentSubmission === $correctAnswer){
           $pointsEarned = $numberOfPoints;
          }
          else{
            $pointsEarned = 1;
          }
          break;
      case 1: //Radio Button
          if($studentSubmission === $correctAnswer){
            $pointsEarned = $numberOfPoints;
          }
          else{
           $pointsEarned = 1;
          }
          break;
      case 2: //Multiple Choice
          $studentSubmission = "";
          $pointsEarned = $numberOfPoints;
          $strlen = strlen($correctAnswer);
          for( $i = 0; $i <= $strlen; $i++ ) {
            $char = substr($correctAnswer, $i, 1);
            if(!isset($_POST[$char])){
              $pointsEarned = max($pointsEarned--, 1);
            }
            else{
              $studentSubmission .= $char;
            }
          }
          break;
      case 3: //Short Answer 
          $tempString = strtolower($studentSubmission);
          $tempString = trim($tempString);
          if($tempString === $correctAnswer){
            $pointsEarned = $numberOfPoints;
          }
          else{
            $pointsEarned = 1;
          }
          break;
      default:
          echo "There was a problem while grading the question!";
          exit();
    }
    //echo "They earned $pointsEarned point(s) out of a total of $numberOfPoints ".
    //"point(s).<br />";
    
    $submittedId = 1;  //Temporary Fix
    insertSubmission($submittedId, $questionId, $studentId, 
    $studentSubmission, $pointsEarned);
    
    //Redirect to same page with a GET: - Needs to be dynamic:
    //header("Location:$_SERVER['PHP_SELF']");
  }
  else {//Student already answered
  $submission = getSubmission($questionId, $studentId);
  $studentSubmission = $submission['StudentSubmission'];
  $pointsEarned = $submission['PointsEarned'];
  
  $question = getQuestionById($questionId);
  $correctAnswer = $question['CorrectAnswer'];
  $numberOfPoints = $question['NumberOfPoints'];
  
  /*
  echo "(*Display splash message with graded info)<br /> This student already ".
  "answered the question. They submitted: $studentSubmission. The correct ".
  "answer was $correctAnswer. They earned $pointsEarned point(s) out of a ".
  "total of $numberOfPoints point(s).<br />";
  */
  }
  
  //////////////////////////////////////////////////////////////////////////////
  ?>
  <!doctype html>

<html lang="en">
	<head>
		<title>UWO WebCLICKER  - Student</title>
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
				<li  class="selected"><a href="quiz_student.html">Quiz</a></li>
			</ul>
		</nav>
    </header>

	<div id="content">
		<div class="box">
		
		
		<div>
		<?php
		echo "
		//////////////////////////////////////////////////////////////////////<br />
		(Display splash message with graded info)<br /> ".
		"You submitted: $studentSubmission. The correct ".
  "answer was $correctAnswer. They earned $pointsEarned point(s) out of a ".
  "total of $numberOfPoints point(s).<br />".
  "////////////////////////////////////////////////////////////////////<br />";
		?>
		
		</div>
		

  
  
			<div class="formTitle">Begin Quiz</div>
			<p>Click the button below to check to see if your instructor 
				has activated a question.</p>
			<div class="centered">
				<button type="button" id="button1" onclick="displayQuestion(1)">
						 View question</button>
			</div>
			<div id="question1" class="tabcontent">
				<form action="grade.php" method="post">
				  <input id="id" name="questionId" type="hidden" value="1">
					<div class="bold">Select the Correct Answer</div>
					
					<div>From this php code, what ends up being printed?</div>
<pre>	
<code>	
	&lt;?php
		$var1 = 3;
		$var2 = 4;
		$var3 = $var1 * $var2;
		echo $var3;
		
		if($var3 === "12"){
			echo "Option 1";
		}
		else if($var3 == "12"){
			echo "Option 2";
		}
		else if($var3 == 12.0){
			echo "Option 3";
		}
		else{
			echo "Option 4";
		}
	?&gt;
</code>
</pre>
				<div>
					<input type="radio" name="answer" value="1"/>
						Option 1
					
				</div>
				<div>
					<input type="radio" name="answer" value="2"/>
						Option 2
					
				</div>
				<div>
					<input type="radio" name="answer" value="3"/>
						Option 3
				
				</div>
				<div>
					<input type="radio" name="answer" value="4"/>
						Option 4
				
				</div>
			<div class="centered">
				 <input type = "submit" value="Submit"/> 
			</div>
		</form>
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
           <img class="html5" src="./images/html5.png" alt="\'Valid\' HTML5" />
    </div>

    <div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
  </footer>
  
  <script src="./web_clicker.js"></script>
  
  </body>
</html>


  
  
  
  
  
  <?php
  
 ////////////////////////////////////////////////////////////////////////////// 
}//End of: if ($_SERVER['REQUEST_METHOD'] === 'POST')

else{ // ($_SERVER['REQUEST_METHOD'] === 'GET') 
  // 1.Include User Authentication and Check to make sure user signed in
  // 2.If(submitted solution set)
  //   {Display Splash Mssg)
  
  $studentId = 1; //= $_COOKIE['studentId'];Get from cookie/session?
  $questionId = 1; //how to get this when loading page as get?
  
  $submission = getSubmission($questionId, $studentId);

  $studentSubmission = $submission['StudentSubmission'];
  $pointsEarned = $submission['PointsEarned'];
  $studentAnswer = $submission['StudentSubmission'];
  
  $question = getQuestionById($questionId);
  $correctAnswer = $question['CorrectAnswer'];
  $numberOfPoints = $question['NumberOfPoints'];
  
  // 3.Then display question HTML  
 /////////////////////////////////////////////////////////////////////////////
 ?> 
  
 
 
 
 
 <!doctype html>

<html lang="en">
	<head>
		<title>UWO WebCLICKER  - Student</title>
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
				<li  class="selected"><a href="quiz_student.html">Quiz</a></li>
			</ul>
		</nav>
    </header>

	<div id="content">
		<div class="box">
		<div>
		<?php
		if(isset($studentSubmission)){
 echo "<div id = splashMssg>You already answered this question! ".
 "You earned $pointsEarned point(s) out of ".
      "$numberOfPoints <br />You selected $studentAnswer, and the ".
      "correct answer was $correctAnswer. </div>";
      }
		?>
		</div>
			<div class="formTitle">Begin Quiz</div>
			<p>Click the button below to check to see if your instructor 
				has activated a question.</p>
			<div class="centered">
				<button type="button" id="button1" onclick="displayQuestion(1)">
						 View question</button>
			</div>
			<div id="question1" class="tabcontent">
				<form action="grade.php" method="post">
				  <input id="id" name="questionId" type="hidden" value="1">
					<div class="bold">Select the Correct Answer</div>
					
					<div>From this php code, what ends up being printed?</div>
<pre>	
<code>	
	&lt;?php
		$var1 = 3;
		$var2 = 4;
		$var3 = $var1 * $var2;
		echo $var3;
		
		if($var3 === "12"){
			echo "Option 1";
		}
		else if($var3 == "12"){
			echo "Option 2";
		}
		else if($var3 == 12.0){
			echo "Option 3";
		}
		else{
			echo "Option 4";
		}
	?&gt;
</code>
</pre>
				<div>
					<input type="radio" name="answer" value="1"/>
						Option 1
					
				</div>
				<div>
					<input type="radio" name="answer" value="2"/>
						Option 2
					
				</div>
				<div>
					<input type="radio" name="answer" value="3"/>
						Option 3
				
				</div>
				<div>
					<input type="radio" name="answer" value="4"/>
						Option 4
				
				</div>
			<div class="centered">
				 <input type = "submit" value="Submit"/> 
			</div>
		</form>
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
           <img class="html5" src="./images/html5.png" alt="\'Valid\' HTML5" />
    </div>

    <div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
  </footer>
  
  <script src="./web_clicker.js"></script>
  
  </body>
</html>


 <?php
 
 
 
 
 
 
 
 
 /////////////////////////////////////////////////////////////////////////////
}






  
?>
