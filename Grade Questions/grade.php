<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';

$studentId = 1; //= $_COOKIE['studentId'];Get from cookie/session?
$questionId = $_POST['questionId'];
$studentSubmission = getSubmission($questionId, $studentId)['StudentSubmission'];
$pointsEarned;

/*Test here: http://webdev.cs.uwosh.edu/students/seymej72/TeamProject/grade.php 
  Need to delete StudentSubmissionId 1 from phpMyAdmin after a submittion to 
  retest.*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    echo "The student submitted: $studentSubmission. The correctAnswer was: ".
    "$correctAnswer. <br />";

    
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
    echo "They earned $pointsEarned point(s) out of a total of $numberOfPoints ".
    "point(s).<br />";
    
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
  
  echo "(*Display splash message with graded info)<br /> This student already ".
  "answered the question. They submitted: $studentSubmission. The correct ".
  "answer was $correctAnswer. They earned $pointsEarned point(s) out of a ".
  "total of $numberOfPoints point(s).<br />";
  }
}//End of: if ($_SERVER['REQUEST_METHOD'] === 'POST')

else{ // ($_SERVER['REQUEST_METHOD'] === 'GET') 
  // 1.Include User Authentication and Check to make sure user signed in
  // 2.If(submitted solution set)
  //   {Display Splash Mssg)
 if(!isset($studentSubmission)){
 echo "<div id = splashMssg>You earned $pointsEarned point(s) out of ".
      "$numberOfPoints <br />You selected $studentAnswer, and the ".
      "correct answer was $correctAnswer. </div>";
 }// 3.Then display question HTML  
}

function openQuestion($questionId){
  $question = getQuestionById($questionId);
  $questionStatement = $question['QuestionStatement'];
  $correctAnswer = $question['CorrectAnswer'];
  $numberOfPoints = $question['NumberOfPoints'];
  $topicDescription = $question['TopicDescription'];
  $keyword = $question['Keyword'];
  $sectionNumber = $question['SectionNumber'];
  $phpGraderCode = $question['PhpGraderCode'];
  $numberOfCorrectAnswers = $question['NumberOfCorrectAnswers'];
  $averagePoints = $question['AveragePoints'];
  $startTime = getTimestamp();
  $endTime = $question['EndTime'];
  $questionStatus = $question['QuestionStatus'];
  $questionType = $question['QuestionType'];
  
  if($questionStatus !== "active"){
    $questionStatus = "active";
    editQuestionById($questionId, $questionStatement, $correctAnswer, 
      $numberOfPoints, $topicDescription, $keyword, $sectionNumber, 
      $phpGraderCode, $numberOfCorrectAnswers, $averagePoints, $startTime,
      $endTime, $questionStatus, $questionType);
  }
}

function closeQuestion($questionId){
  $question = getQuestionById($questionId);
  $questionStatement = $question['QuestionStatement'];
  $correctAnswer = $question['CorrectAnswer'];
  $numberOfPoints = $question['NumberOfPoints'];
  $topicDescription = $question['TopicDescription'];
  $keyword = $question['Keyword'];
  $sectionNumber = $question['SectionNumber'];
  $phpGraderCode = $question['PhpGraderCode'];
  $numberOfCorrectAnswers = $question['NumberOfCorrectAnswers'];
  $averagePoints;
  $startTime = $question['StartTime'];
  $endTime = getTimestamp();
  $questionStatus = $question['QuestionStatus'];
  $questionType = $question['QuestionType'];

  if($questionStatus === "active"){
    $questionStatus = "closed";
    $query_result = getAllSubmissionsByQuestion(); 
    $averagePoints = 0;
    $count = 0;
    foreach($query_result as $submission){
      $averagePoints += $submission['PointsEarned'];
      $count++;
    }
    $averagePoints = (double)$averagePoints / (double)$count;
    editQuestionById($questionId, $questionStatement, $correctAnswer, 
      $numberOfPoints, $topicDescription, $keyword, $sectionNumber, 
      $phpGraderCode, $numberOfCorrectAnswers, $averagePoints, $startTime,
      $endTime, $questionStatus, $questionType);
  }
}




  
?>
