<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';


function createGraderString(){
  $homepage = file_get_contents('grade.php');
  echo $homepage;
  return 0;
}

function createHtmlFile($questionId){
  $question = getQuestionById($questionId);
  $questionStatement = $question['QuestionStatement'];
  
  $fileName = "Q".$questionId.".html";
  $file = fopen($fileName, 'w') or die('Cannot open file:  '.$fileName);
  fwrite($file, $questionStatement); //(file, data)
  fclose($file);
  return 0;
}


function deleteHtmlFile($questionId){
  $question = getQuestionById($questionId);
  $questionStatement = $question['QuestionStatement'];
  
  $fileName = "Q".questionID."html";
  unlink($fileName);
}

?>
