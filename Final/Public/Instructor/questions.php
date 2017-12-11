<?php
require_once '../../Private/queries.php';
require_once '../../Private/dbCredentials.php';
require_once '../../Private/initialize.php';
require_once '../../Private/open_close_question.php';
require_once '../../Private/session.php';


		if (isset($_POST['submitEdit']))
			{
				$section        = $_POST['section'];
				$subSection     = $_POST['sub_section'];
				$sectionNumber = doubleval($section.".".$subSection);
				$keywords  = $_POST['keywords'] . " " . $_POST['subject'] . " " . $sectionNumber;
				editQuestionByIdShort($_POST['questionId'], $_POST['question_description'], $_POST['point_value'], 
				$keywords, $sectionNumber);
			}
		if (isset($_POST['deactivateAll']))
			{
				closeAllQuestions();
			}
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
				<li><a href="logout.php">Log out</a></li>
				<li><a href="change_password.php">Edit Account</a></li>
				<li><a href="add_new_question.php">Add New Question</a></li>
				<li class="selected"><a href="questions.php">Questions</a></li>
			</ul>
		</nav>
    </header>

    <div id="user_messages">
    	user: <?php echo $login_session; ?>
	</div>
	<div id="content">
	 <div id="container">
	 <div class="centered">
		 <?php
	 	if (isset($_POST['averageToday']))
			{
	  ?>		
			<table>	
			 <tr>
   			 <th>Question Number</th>
   			 <th>Average Score</th>
   		 	<th>Total Score</th>
 		 	</tr>
			<?php
				$todaysQuestions = getTodaysQuestions();
				for($i=0; $i<count($todaysQuestions); $i++){				
					echo "<tr>";
					echo "<td>" . $todaysQuestions[$i]['QuestionId'] . "</td>";
					echo "<td>" . $todaysQuestions[$i]['AveragePoints'] . "</td>";
					echo "<td>" . $todaysQuestions[$i]['NumberOfPoints'] . "</td>";
					echo "</tr>";			
				}
				?>
			</table>	
			
			<?php
			}
			else{
			?>
			
			<form class="inlineBlock" method="post">
						<input type="submit" name="averageToday" value="Display Today's Averages" />
			</form>
				
	<?php			
			}
	 ?>	
	 	<form class="inlineBlock" method="post">
						<input type="submit" name="deactivateAll" value="Deactivate All Questions" />
		</form>
	</div>
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
					<form class="inlineBlock" action="view_question.php" method="post">
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
			<a href="https://validator.w3.org/check?uri=referer">
			   <img class="html5" src="../images/html5.png" alt="\'Valid\' HTML5" />
			  </a>
		</div>

		<div id="copyright">&copy; 2017 - Univ. of Wisconsin Oshkosh </div>
	</footer>
	
	<script src="../../Private/web_clicker.js"></script>
	
	</body>
</html>



