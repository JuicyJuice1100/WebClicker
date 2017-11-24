<?php
/* Take student submittion (Need StudentID - in a cookie?)
     1.Store locally
   Query database  (Need QuestionID or look for active question?)
     1.CorrectAnswer
     2.NumberOfCorrectAnswer
     3.NumberOfPoints
   Evalutate points earned based on question type
   Upload to database
     1.StudentSubmission
     2.PointsEarned
   Query database to get each students number of points
   Calculate Average
     1.Upload AveragePoints
   Redirect page back to: 
   http://webdev.cs.uwosh.edu/students/dunkod78/pindiv3/quiz_student.html
   
   Include this file above the above: This loads as POST that is a GET. Add to the top of
   the get section: If student submission set display result(submission against
   correct answer and points earned) 
   
   -(Do I need to check if they have submitted a solution already)
   -(Should be a page after submittion which shows points earned and the correct answer)
   -How to close question? On instructors side
   -StartTime/EndTime On Instructor side
*/
include 'queries.php';
include 'dbCredentials.php';
include 'initalize.php';
include 'queries.php';

$studentId; //= $_COOKIE['studentId'];Get from cookie/session?
$questionId; //= $_POST['questionId'];Assumption that its a hidden name value from form
$studentSubmission = getSubmission($questionId, $studentId)['StudentSubmission'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(!isset($studentSubmission){
    $question = getQuestionById($questionId);
    $correctAnswer = question['CorrectAnswer'];
    $numberOfCorrectAnswer = question['NumberOfCorrectAnswers'];
    $numberOfPoints = question['NumberOfPoints'];
    $questionType = question['questionType']; //NEED TO ADD THIS TO DATABASE!!
    $pointsEarned; //Should default to 0 in database;

    $studentSubmission = $_POST["answer"]; 
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
  }
  insertSubmission($questionId, $studentId, $studentSubmission, $pointsEarned);
  //Redirect to same page with a GET: - Needs to be dynamic:
  header("$_SERVER['PHP_SELF']");
}
else{ // ($_SERVER['REQUEST_METHOD'] === 'GET') 
// 1.Include User Authentication and Check to make sure user signed in
// 2.If(submitted solution set)
//   {Display Splash Mssg)
 if(!isset($studentSubmission){
 echo "<div id = splashMssg>You earned $pointsEarned point(s) out of ".
      "$numberOfPoints <br />You selected $studentAnswer, and the ".
      "correct answer was $correctAnswer. </div>";
 }
// 3.Then display question HTML
}

function openQuestion($questionId){
  $startTime = getTimestamp();
   editQuestionById($questionId, $status, , , , , , , , , $startTime, );
   //Does the above work??? Will need to recount ,'s after adding status 
}

function closeQuestion($questionId){
  $question = getQuestionById($questionId);
  $status = question['questionStatus'];
  if($status === "active"){
    $query_result = getAllSubmissionsByQuestion(); //FCN Doesn't exist yet!!
    $avgPointsEarned = 0;
    $count = 0;
    foreach($query_result as $submission){
      $avgPointsEarned += $submission['PointsEarned'];
      $count++;
    }
    $avgPointsEarned = (double)$avgPointsEarned / (double)$count;
    $endTime = getTimestamp();
    editQuestionById($questionId, $status, , , , , , , , $averagePoints, , $endTime); 
    //Does the above work??? Will need to recount ,'s after adding status
  }
}





  
?>
