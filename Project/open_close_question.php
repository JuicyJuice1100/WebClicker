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

    $query_result = getCalculatedAverageBy($questionId); 

    if($query_result){
    $averagePoints =  $query_result['AVG(PointsEarned)'];

    editQuestionById($questionId, $questionStatement, $correctAnswer, 
      $numberOfPoints, $topicDescription, $keyword, $sectionNumber, 
      $phpGraderCode, $numberOfCorrectAnswers, $averagePoints, $startTime,
      $endTime, $questionStatus, $questionType);
      }
      
  }
}
function closeAllQuestions(){
		$allOpenQuestions = getAllOpenQuestions();
		$max = count($allOpenQuestions);
		for($i = 0; $i<$max; $i++){
  			$question = getQuestionById($allOpenQuestions[$i]['QuestionId']);
  			$questionStatement = $allOpenQuestions[$i]['QuestionStatement'];
  			$correctAnswer = $allOpenQuestions[$i]['CorrectAnswer'];
  			$numberOfPoints = $allOpenQuestions[$i]['NumberOfPoints'];
  			$topicDescription = $allOpenQuestions[$i]['TopicDescription'];
  			$keyword = $allOpenQuestions[$i]['Keyword'];
  			$sectionNumber = $allOpenQuestions[$i]['SectionNumber'];
  			$phpGraderCode = $allOpenQuestions[$i]['PhpGraderCode'];
 			$numberOfCorrectAnswers = $allOpenQuestions[$i]['NumberOfCorrectAnswers'];
 			$averagePoints =$allOpenQuestions[$i]['AveragePoints'];
  			$startTime = $allOpenQuestions[$i]['StartTime'];
  			$date = date_create();
  			$endTime = date_timestamp_get($date);
  			$questionStatus = $allOpenQuestions[$i]['QuestionStatus'];
  			$questionType = $allOpenQuestions[$i]['QuestionType']; 
			
	if($questionStatus == 2){
    	$questionStatus = 0;

    	$query_result = getCalculatedAverageBy($questionId); 

   	 if($query_result){
    		$averagePoints =  $query_result['AVG(PointsEarned)'];

    editQuestionById($questionId, $questionStatement, $correctAnswer, 
      $numberOfPoints, $topicDescription, $keyword, $sectionNumber, 
      $phpGraderCode, $numberOfCorrectAnswers, $averagePoints, $startTime,
      $endTime, $questionStatus, $questionType);
      }    
  }			
}
}
?>