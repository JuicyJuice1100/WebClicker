<?php
require_once '../../Private/queries.php';
require_once '../../Private/dbCredentials.php';
require_once '../../Private/initialize.php';
require_once '../../Private/session.php';
?>
<!doctype html>

<html lang="en">
	<head>
		<title>UWO WebCLICKER</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" media="all" href="../dev.css" />
	</head>

<body>
     <header>
		<a href="quiz.php">
			<img id="logo" src="../images/logo.png"
				   width="250" alt="UWO WebCLICKER logo" />
		</a>
		
		<div class="header_user_type"><?php echo $access_type;?></div>
		
		<nav>
			<ul>
				<li><a href="../../Private/logout.php">Log out</a></li>
				<li><a href="change_password.php">Edit Account</a></li>				
				<li class="selected"><a href="review.php">Review</a></li>
				<li><a href="quiz.php">Quiz</a></li>
			</ul>
		</nav>
    </header>

    <div id="user_messages">
    	user: <?php echo $login_session; ?>
	</div>
	
  <div id="content">
	  <div id="container">
			<div class="pageTitle">Begin by searching or reviewing below</div>
			
			<form class="searchBar" action="search_results.php" method="post">
					
					<div>Search and select as many tags as you'd like to specify your search!</div>
					
					<input type="search" name="searchString" />
					<input type="submit" name="submit" value="Search"/>
					
					<div class="tags">
					
						<label for="section">Section:</label>
						<select id="section" name="section">
						  <option disabled selected value> --</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						</select>
						
						<label for="sub_section">Sub-section:</label>
						<select id="sub_section" name="sub_section">
						  <option disabled selected value> --</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						</select>
						
						<label for="subject">Subject</label>
						<select id="subject" name="subject">
						  <option disabled selected value>--</option>
						  <option value="HTML">HTML</option>
						  <option value="CSS">CSS</option>
						  <option value="PHP">PHP</option>
						  <option value="Javascript">Javascript</option>
						  <option value="Databases">Databases</option>
						</select>
						
						<label for="point_value">Worth</label>
						<select id="point_value" name="point_value">
						  <option disabled selected value> --</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6+</option>
						</select>
						
						<span> points</span>
						<div>
							<input type="checkbox" id="incorrect_questions" name="incorrect_questions" value="true">
							<label for="incorrect_questions">Only display incorrectly answered questions</label>
						</div>
					</div>
			</form>
				
			<div class="pageTitle">Your total score so far: 0/0. </div>
			
			<?php 
			$questions = getAllQuestions();	 
			$i = -1;
			$max = count($questions)-1;
			while ($max>$i) {		
		?>
				<div class="question_in_review">
					<h1>Q<?php echo $questions[$max]['QuestionId'];?> - Section <?php echo $questions[$max]['SectionNumber'];?></h1>
					<p>Description: <?php echo $questions[$max]['TopicDescription'];?></p>
					<p>Your score: 0/0</p>		
					<div class="centered">
						<form class="inlineBlock" action="view_question.php" method="post">
							<input type="hidden" name="questionId" value="<?php echo $questions[$max]['QuestionId'];?> " />
							<input type="submit" value="View" />
						</form>
					</div>					 
				</div>	
				 <?php
			$max = $max-1;
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


