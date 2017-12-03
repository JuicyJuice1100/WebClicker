<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';

//In student: Onclick of show question// or on click go to this page?
function loadHtmlFile($questionId, $string){
  $question = getQuestionById($questionId);
  $questionStatement = $question['QuestionStatement'];
  echo $questionStatement;
  echo $string;
  /*Crude way to inject splash would be to place a strange/ unique string 
  identifier in the generate html which you could then search and replace with
  string operations. => replace the unique word with the splash msg*/
  return 0;
}


?>
