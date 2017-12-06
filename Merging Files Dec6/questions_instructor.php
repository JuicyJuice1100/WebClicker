<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';
?>

<!doctype html>

<html lang="en">
<head>
	<title>UWO WebCLICKER - Instructor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="all" href="dev.css" />
</head>

<body>
    <header>
		<a href="questions_instructor.html">
			<img id="logo" src="./images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type">Instructor</div>
		
		<nav>
			<ul>
				<li><a href="sign_in.html">Log out</a></li>
				<li><a href="change_password_instructor.html">Edit Account</a></li>
				<li><a href="add_new_question_instructor.html">Add New Question</a></li>
				<li><a href="results_instructor.html">Results</a></li>
				<li class="selected"><a href="questions_instructor.php">Questions</a></li>
			</ul>
		</nav>
    </header>
	
 <div id="content">
	 <div id="container">
		<?php 
		$questions = getAllQuestions();	 
		$i = 0;
		$max = count($questions);
		while ($i<$max) {	
		
		?>
		<div class="question_in_review">
		 
					<h1>Q<?php echo $questions[$i]['QuestionId'];?> - Section <?php echo $questions[$i]['SectionNumber'];?></h1>
					
					<p>Description: <pre><?php echo $questions[$i]['TopicDescription'];?></pre></p>
					
					<p>Class Average: <?php echo $questions[$i]['AveragePoints']. "/" . $questions[$i]['NumberOfPoints'];?></p>	
					
				<div class="centered">
					<form class="inlineBlock" action="view_question_instructor.php" method="post">
						<input type="hidden" name="questionId" value="<?php echo $questions[$i]['QuestionId'];?> " />
						<input type="submit" value="View" />
					</form>
					 
					<form class="inlineBlock" action="edit_question.php" method="post">
						<input type="hidden" name="questionId" value="<?php echo $questions[$i]['QuestionId'];?> " />
						<input type="submit" value="Edit" />
					</form> 
				</div>
				
				<div class="centered">
					<form class="inlineBlock" action="">
						<input type="submit" value="Activate" />
						
					</form>
					
					<button type="button" onclick="deactivateQuestion(1)">
					 Deactivate</button>
					 
					<button class="delete_question" type="button" onclick="deleteQuestion(2)">
					Delete</button>
				</div>
		</div>   
		 <?php
			$i++;
	}
	?>	
			 		
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
			   <img class="html5" src="./images/html5.png" alt="\'Valid\' HTML5" />
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>
	
	<script src="./web_clicker.js"></script>
	
	</body>
</html>

