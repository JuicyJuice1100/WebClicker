<?php

  
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


function delete($questionId){
  deleteQuestionById($questionId);
}


?>


