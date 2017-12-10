<?php
require_once '../../Private/queries.php';
require_once '../../Private/dbCredentials.php';
require_once '../../Private/initialize.php';
require_once '../../Private/session.php';

$question = getQuestionById($_POST['questionId']);

?>

<!doctype html>

<html lang="en">
	<head>
		<title>UWO WebCLICKER - Instructor</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" media="all" href="../dev.css" />
		<script src="../../Private/web_clicker.js"></script>
	</head>

<body>
    <header>
		<a href="questions.php">
			<img id="logo" src="../images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type"><?php echo $access_type; ?></div>
		
		<nav>
			<ul>
				 <li><a href="../../Private/logout.php">Log out</a></li>
				<li><a href="change_password.html">Edit Account</a></li>
				<li><a href="add_new_question.html">Add New Question</a></li>
				<li><a href="questions.php">Questions</a></li>
			</ul>
		</nav>
    </header>
	
<div id="content">
	 <div id="container">
	 <div class="question_in_review">
			<?php echo $question['QuestionStatement']; ?>
			<div class="centered">
				<form class="inlineBlock" action="edit_question.php" method="post">
						<input type="hidden" name="questionId" value="<?php echo $question['QuestionId'];?>  " />
						<input type="submit" value="Edit" />
					</form> 	
				<form class="inlineBlock" method="post">
						<input type="hidden" name="questionId" value="<?php echo $question['QuestionId'];?>  " />
						<input id="delete_question" name="delete" type="submit" value="Delete" />
				</form>
<?php
				if(isset($_POST['delete'])){
					deleteQuestionById($question['QuestionId']); 
					echo "<script> navigateToQuestions(); </script>";
				} 
?>
			</div>	
			<p class="centered bold">Class Average: <?php echo $question['AveragePoints'] . "/" . $question['NumberOfPoints']; ?></p>
			<p class="centered bold">Correct Answer: <?php echo $question['CorrectAnswer']; ?></p>
			<p class="bold">Submitted Answers:</p>
			<div id="graphDiv1"></div>		
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
			<a href="https://validator.w3.org/check?uri=referer">
			   <img class="html5" src="../images/html5.png" alt="\'Valid\' HTML5" />
			  </a>
		</div>

    <div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
  </footer>
  
  <script src="../../Private/web_clicker.js"></script>
  <script src="../../Private/BarGraph.js"></script>
  </body>
</html>

