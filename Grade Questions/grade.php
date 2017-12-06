<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';
require_once 'loadHtml.php';
//require_once 'updateFileDir.php';
/*
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
*/
/*Test here: http://webdev.cs.uwosh.edu/students/seymej72/TeamProject/grade.php */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $questionId = $_POST['questionId']; //Query Active Question
  $studentId = 1; //= $_COOKIE['studentId'];Get from cookie/session?

  echo " POST - Grading Beginning ";
  
  //Redirect to same page with a GET: - Needs to be dynamic:
  header('Location: grade.php');
  $studentSubmission = getSubmission($questionId, $studentId)['StudentSubmission'];
  
  if(!isset($studentSubmission)){//Student has not answered - grade question
  echo "entered post-submission not set ";
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
    $startTime = $question['StartTime'];
    $endTime = $question['EndTime'];
    $questionStatus = $question['QuestionStatus'];
    $questionType = $question['QuestionType'];

    $studentSubmission = $_POST["answer"]; 
    echo "TEST a The student submitted: $studentSubmission. The correctAnswer was: ".
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
    echo "TEST they earned $pointsEarned point(s) out of a total of $numberOfPoints ".
    "point(s).<br />";
    
    
    insertSubmission($questionId, $studentId, 
    $studentSubmission, $pointsEarned);
  }
  
  
  
  //Delete below else after testing:///////////////////////////////////////////
  else {//Student already answered - don't grade just display answer
  $submission = getSubmission($questionId, $studentId);
  $studentSubmission = $submission['StudentSubmission'];
  $pointsEarned = $submission['PointsEarned'];
  
  $question = getQuestionById($questionId);
  $correctAnswer = $question['CorrectAnswer'];
  $numberOfPoints = $question['NumberOfPoints'];
  
  echo "(*After Answering: Display splash message with graded info)<br /> This student already ".
  "answered the question. They submitted: $studentSubmission. The correct ".
  "answer was $correctAnswer. They earned $pointsEarned point(s) out of a ".
  "total of $numberOfPoints point(s).<br />";
  }
  /////////////////////////////////////////////////////////////////////////////
  
  
  
  
  
}//End of: if ($_SERVER['REQUEST_METHOD'] === 'POST')

else{ // ($_SERVER['REQUEST_METHOD'] === 'GET') 
  echo "GET STARTS HERE";
  // 1.Include User Authentication and Check to make sure user signed in
  // 2.If(submitted solution set)
  //   {Display Splash Mssg)
  $studentId = 1; //= $_COOKIE['studentId'];Get from cookie/session?
  $question = getFirstActiveQuestion();
  $questionId = $question['QuestionId'];
  echo " TEST1 ";
  // 3.Then display question HTML  
  loadHtmlFile($questionId, $studentId);
 
}





  
?>
