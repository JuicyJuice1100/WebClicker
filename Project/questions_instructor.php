<?php
require_once 'queries.php';
require_once 'dbCredentials.php';
require_once 'initialize.php';
require_once 'open_close_question.php';

		if (isset($_POST['submitEdit']))
			{
				$section        = $_POST['section'];
				$subSection     = $_POST['sub_section'];
				$sectionNumber = doubleval($section.".".$subSection);
				$keywords  = $_POST['keywords'] . " " . $_POST['subject'] . " " . $sectionNumber;
				editQuestionByIdShort($_POST['questionId'], $_POST['question_description'], $_POST['point_value'], 
				$keywords, $sectionNumber);
			}
?>

<!doctype html>

<html lang="en">
<head>
	<title>UWO WebCLICKER - Instructor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="all" href="dev.css" />
</head>
	<script src="./web_clicker.js"></script>
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
				<li class="selected"><a href="questions_instructor.php">Questions</a></li>
			</ul>
		</nav>
    </header>
	
 <div id="content">
	 <div id="container">
		<?php 
		$questions = getAllQuestions();	 
		$i = -1;
		$max = count($questions)-1;
		while ($max>$i) {	
		
		?>
		<div class="question_in_review">
		 
					<h1>Q<?php echo $questions[$max]['QuestionId'];?> - Section <?php echo $questions[$max]['SectionNumber'];?></h1>
					
					<p>Description: <?php echo $questions[$max]['TopicDescription'];?></p>
					
					<p>Class Average: <?php echo $questions[$max]['AveragePoints']. "/" . $questions[$max]['NumberOfPoints'];?></p>	
					
				<div class="centered">
					<form class="inlineBlock" action="view_question_instructor.php" method="post">
						<input type="hidden" name="questionId" value="<?php echo $questions[$max]['QuestionId'];?> " />
						<input type="submit" value="View" />
					</form>
					 
					<form class="inlineBlock" action="edit_question.php" method="post">
						<input type="hidden" name="questionId" value="<?php echo $questions[$max]['QuestionId'];?> " />
						<input type="submit" value="Edit" />
					</form> 
				</div>
				
				<div class="centered">
					<form class="inlineBlock" method="post">
						<input type="hidden" name="questionId" value="<?php echo $questions[$max]['QuestionId'];?> " />
						<input type="submit" name="activate" value="Activate" />
					</form> 
					
					<form class="inlineBlock" method="post">
						<input type="hidden" name="questionId" value="<?php echo $questions[$max]['QuestionId'];?> " />
						<input type="submit" name="deactivate" value="Deactivate" />
					</form> 
					 
					<form class="inlineBlock" method="post">
						<input type="hidden" name="questionId" value="<?php echo $questions[$max]['QuestionId'];?>  " />
						<input id="delete_question" name="delete" type="submit" value="Delete" />
					</form>
					
				</div>
		</div>   
		 <?php
			$max = $max-1;
	}
	?>	
		<?php 
					if(isset($_POST['delete'])){
						deleteQuestionById($_POST['questionId']); 
						echo "<script> navigateToQuestions(); </script>";
					} 
					if(isset($_POST['activate'])){
						openQuestion($_POST['questionId']); 
					} 
					if(isset($_POST['deactivate'])){			
						closeQuestion($_POST['questionId']); 
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

