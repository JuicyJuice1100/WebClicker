<?php
 
  require_once 'queries.php';
  function openQuestion($questionId){
	  $question = getQuestionById($questionId);
	  $questionId = $question['QuestionId'];
	  $questionStatement = $question['QuestionStatement'];
	  $correctAnswer = $question['CorrectAnswer'];
	  $numberOfPoints = $question['NumberOfPoints'];
	  $topicDescription = $question['TopicDescription'];
	  $keyword = $question['Keyword'];
	  $sectionNumber = $question['SectionNumber'];
	  $phpGraderCode = $question['PhpGraderCode'];
	  $numberOfCorrectAnswers = $question['NumberOfCorrectAnswers'];
	  $averagePoints = $question['AveragePoints'];
	  $date = date_create();
	  $startTime = date_timestamp_get($date);
	  $endTime = $question['EndTime'];
	  $questionStatus = $question['QuestionStatus'];
	  $questionType = $question['QuestionType'];
	  
  if($questionStatus != 2){
    $questionStatus = 2;
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
  $averagePoints =$question['AveragePoints'];
  $startTime = $question['StartTime'];
  $date = date_create();
  $endTime = date_timestamp_get($date);
  $questionStatus = $question['QuestionStatus'];
  $questionType = $question['QuestionType']; 

  if($questionStatus == 2){
    $questionStatus = 0;
    /*$query_result = getAllSubmissionsByQuestion(); 
    $averagePoints = 0;
    $count = 0;
    foreach($query_result as $submission){
      $averagePoints += $submission['PointsEarned'];
      $count++;
    }
    $averagePoints = (double)$averagePoints / (double)$count;*/
    editQuestionById($questionId, $questionStatement, $correctAnswer, 
      $numberOfPoints, $topicDescription, $keyword, $sectionNumber, 
      $phpGraderCode, $numberOfCorrectAnswers, $averagePoints, $startTime,
      $endTime, $questionStatus, $questionType);
  }
}
?>