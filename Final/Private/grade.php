<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';
require_once '../Public/Student/displayGradeResults.php';
require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = getFirstActiveQuestion();
    $questionId = $question['QuestionId'];
  
  //Redirect to same page with a GET:
  header('Location: grade.php');
  $studentSubmission = getSubmission($questionId, $studentId)['StudentSubmission'];
  
  if(!isset($studentSubmission)){//Student has not answered - grade question
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
    
    switch ($questionType) {
      case 0: //True or False
          $studentSubmission = $_POST["truefalse"]; 
          if($studentSubmission === $correctAnswer){
           $pointsEarned = $numberOfPoints;
          }
          else{
            $pointsEarned = 1;
          }
          break;
      case 1: //Radio Button
          $studentSubmission = $_POST["answer"]; 
          if($studentSubmission === $correctAnswer){
            $pointsEarned = $numberOfPoints;
          }
          else{
           $pointsEarned = 1;
          }
          break;
      case 2: //Multiple Choice
          $studentSubmission = "";
          for($i = 1; $i < 10; $i++){
            if(isset($_POST[$i])){
              $studentSubmission .= $_POST[$i];
            }
          }
          $pointsEarned = $numberOfPoints;
          $strlen = strlen($correctAnswer);
          for($i = 0; $i < $strlen; $i++ ) {
            $char = substr($correctAnswer, $i, 1);
            if(!isset($_POST[$char])){
              $pointsEarned--;
            }
          }
          if($pointsEarned < 1){
            $pointsEarned = 1;
          }
          
          break;
      case 3: //Short Answer 
      print_r($_POST);
          $studentSubmission = $_POST["answer"]; 
          $tempString = strtolower($studentSubmission);
          $tempString = trim($tempString);
          
          $correctAnswer = strtolower($correctAnswer);
          $correctAnswer = trim($correctAnswer);
          
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
    insertSubmission($questionId, $studentId, $studentSubmission, $pointsEarned);
  }
  
}//End of: if ($_SERVER['REQUEST_METHOD'] === 'POST')
else{ // ($_SERVER['REQUEST_METHOD'] === 'GET') 
  // echo "studentID is :".$studentId;
  $question = getFirstActiveQuestion();
  $questionId = $question['QuestionId'];
  // Display question HTML  
  loadHtmlFile($questionId, $studentId);
}
  
?>
