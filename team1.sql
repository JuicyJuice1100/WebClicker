-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 01:10 AM
-- Server version: 5.5.50-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Instructor`
--

CREATE TABLE IF NOT EXISTS `Instructor` (
  `InstructorId` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `HashedPassword` varchar(255) NOT NULL,
  `PasswordChanges` int(11) NOT NULL,
  `LastLogin` timestamp NULL DEFAULT NULL,
  `LastLogout` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructor`
--

INSERT INTO `Instructor` (`InstructorId`, `Username`, `FirstName`, `LastName`, `Email`, `HashedPassword`, `PasswordChanges`, `LastLogin`, `LastLogout`) VALUES
(7, 'dfurcy', 'David', 'Furcy', 'test@test.com', 'testpass', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE IF NOT EXISTS `Question` (
  `QuestionId` int(11) NOT NULL COMMENT 'Question Number',
  `QuestionStatement` text NOT NULL COMMENT 'HTML Form',
  `CorrectAnswer` varchar(255) NOT NULL,
  `NumberOfPoints` int(11) NOT NULL,
  `TopicDescription` varchar(255) NOT NULL,
  `Keyword` varchar(255) DEFAULT NULL,
  `SectionNumber` double NOT NULL,
  `PhpGraderCode` text,
  `NumberOfCorrectAnswers` int(11) DEFAULT NULL,
  `AveragePoints` double DEFAULT NULL,
  `StartTime` timestamp NULL DEFAULT NULL,
  `EndTime` timestamp NULL DEFAULT NULL,
  `QuestionStatus` int(11) NOT NULL COMMENT '0 = deactive, 1 = draft, 2 = active',
  `QuestionType` int(11) NOT NULL COMMENT '0 = TrueFalse, 1 = Radio, 2 = MultipleChoice, 3 = ShortAnswer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`QuestionId`, `QuestionStatement`, `CorrectAnswer`, `NumberOfPoints`, `TopicDescription`, `Keyword`, `SectionNumber`, `PhpGraderCode`, `NumberOfCorrectAnswers`, `AveragePoints`, `StartTime`, `EndTime`, `QuestionStatus`, `QuestionType`) VALUES
(1, '     <div>\n            <h1>\n				Q0 - Section \n				1.1  			\n			</h1>           \n            <form action="grade.php" method="post">                    \n                    <div class="bold">Checkbox(Select answers)</div>\n                    <div>\n						Which of the following will open the file, text.html, when connecting to a PC to itself as a server. (Assume text.html is the directory of the server)					</div>        \n			<div>\n                \n<span>(a)</span><input type="checkbox" name="1" value="1" id="Option1"/>./text.html<br /><span>(b)</span><input type="checkbox" name="2" value="2" id="Option2"/>localhost/text.html<br /><span>(c)</span><input type="checkbox" name="3" value="3" id="Option3"/>127.0.0.1/text.html<br /><span>(d)</span><input type="checkbox" name="4" value="4" id="Option4"/>file:///C:/text.html<br />                \n                    \n				</div>\n				<input type="hidden" name="questionId" value="0"/>					<div class="centered">\n            <input id ="submitButton" type = "submit" value="Submit"/>\n          </div> \n				</form>\n			<div id="yourResults"></div>\n			<div id="correctAnswer"></div> \n            <div id="classResults"></div>\n     </div>       \n', '23', 3, 'Which of the following will open the file, text.html, when connecting to a PC to itself as a server. (Assume text.html is the directory of the server)', 'File Server Localhost PHP 1.1', 1.1, NULL, 2, NULL, NULL, NULL, 2, 2),
(2, '		 <div>\r\n			<h1>\r\n				Q2 - Section \r\n				2.3			</h1>\r\n				\r\n			<form action="grade.php" method="post">                    \r\n				<div class="bold">True or False</div>\r\n				<div>\r\n					Is the following html below valid?\r\n<pre>\r\n&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n  &lt;head&gt;\r\n    &lt;meta charset="utf-8"&gt;\r\n    &lt;meta name = "author" content = "Some Author"&gt;\r\n    &lt;meta name = "keywords" content = "Lab5"&gt;\r\n    &lt;meta name = "description" content = "CS 346 Lab5"&gt;\r\n    &lt;meta name = "date" content = "10/11/2017"&gt;\r\n    &lt;link rel="stylesheet" type= "text/css" href="Lab5.css"&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n\r\n  &lt;/body&gt;\r\n&lt;/html&gt;\r\n</pre>\r\n		</div>        \r\n				<div>\r\n					<input type="radio" name="truefalse" value="true"> True<br>\r\n					<input type="radio" name="truefalse" value="false"> False\r\n				</div>\r\n				<input type="hidden" name="questionId" value="2"/>					<div class="centered">\r\n            <input id = "submitButton" type = "submit" value="Submit"/>\r\n          </div> \r\n				</form>\r\n            \r\n			\r\n			<div id="yourResults"></div>\r\n			<div id="correctAnswer"></div> \r\n            <div id="classResults"></div>\r\n</div>\r\n', 'false', 2, 'Is the following html below valid?', 'valid validate code HTML 2.3', 2.3, NULL, 1, NULL, NULL, NULL, 0, 0),
(3, '     <div>\r\n            <h1>\r\n				Q3 - Section \r\n				3.2  			\r\n			</h1>           \r\n            <form action="grade.php" method="post">                    \r\n                    <div class="bold">Checkbox(Select answers)</div>\r\n                    <div>\r\n						Which of the following selectors will style the following code below:<br />\r\n&ltp id = "sexiestManAlive" class = "Classy"&gtRyan Reynolds&lt/p&gt					</div>        \r\n			<div>\r\n                \r\n<span>(a)</span><input type="checkbox" name="1" value="1" id="Option1"/>response<br /><span>(b)</span><input type="checkbox" name="2" value="2" id="Option2"/>#sexiestManAlive<br /><span>(c)</span><input type="checkbox" name="3" value="3" id="Option3"/>#classy<br /><span>(d)</span><input type="checkbox" name="4" value="4" id="Option4"/>Ryan Reynolds<br />                \r\n                    \r\n				</div>\r\n				<input type="hidden" name="questionId" value="3"/>					<div class="centered">\r\n            <input id ="submitButton" type = "submit" value="Submit"/>\r\n          </div> \r\n				</form>\r\n			<div id="yourResults"></div>\r\n			<div id="correctAnswer"></div> \r\n            <div id="classResults"></div>\r\n     </div>       \r\n', '12', 3, 'Which of the following selectors will style the following code below:\r\n&ltp id = "sexiestManAlive" class = "Classy"&gtRyan Reynolds&lt/p&gt', 'Id selectors Idselectors class selectors CSS 3.2', 3.2, NULL, 2, NULL, NULL, NULL, 0, 2),
(4, '			 <div>\n				<h1>\n					4 - Section \n					4.4			\n				</h1>               \n				<form action="grade.php" method="post">                    \n					<div class="bold">Short Answer.</div>\n					<div>What single property and value, in CSS, will make an element invisible and go outside normal flow?  (Please just type in the name of the property)</div>\n					<div>\n						<input type="text" name="answer"/>\n					</div>\n					<input type="hidden" name="questionId" value="4"/>					<div class="centered">\n            <input id = "submitButton" type = "submit" value="Submit"/> \n          </div> \n				</form>\n			<div id="yourResults"></div>\n			<div id="correctAnswer"></div> \n            <div id="classResults"></div>\n</div> \n', 'visibility', 2, 'What single property and value, in CSS, will make an element invisible and go outside normal flow?  (Please just type in the name of the property)', 'visibility property invisible flow CSS 4.4', 4.4, NULL, 1, NULL, NULL, NULL, 0, 3),
(5, '     <div>\r\n            <h1>\r\n				Q5 - Section \r\n				4.1  			\r\n			</h1>\r\n            \r\n            <form action="grade.php" method="post">                    \r\n                <div class="bold">Radio(Select one answer)</div>\r\n				<div>\r\n				Given the following code below, what  will echo print out?\r\n<pre>\r\n&lt;?php\r\n  $number = 10;\r\n    function ternary($num = 3){\r\n      $number = 25;\r\n      $value = (($num % 2 ) === 0) ? 0 : $number;\r\n      if($value){\r\n        return $number;\r\n      }\r\n      return $value;\r\n\r\n    }\r\n  echo ternary();\r\n?&gt;\r\n</pre>				</div>        \r\n                <div>\r\n                \r\n<span>(a)</span><input type="radio" name="answer" value="1"/>10<br /><span>(b)</span><input type="radio" name="answer" value="2"/>0<br /><span>(c)</span><input type="radio" name="answer" value="3"/>25<br /><span>(d)</span><input type="radio" name="answer" value="4"/>3<br />                \r\n                    \r\n                </div>\r\n            <input type="hidden" name="questionId" value="5"/>					<div class="centered">\r\n            <input id = "submitButton" type = "submit" value="Submit"/>\r\n          </div> \r\n				</form>\r\n			<div id="yourResults"></div>\r\n			<div id="correctAnswer"></div> \r\n            <div id="classResults"></div>\r\n            	</div>  \r\n', '4', 2, 'Given the following code below, what  will echo print out?', 'global variables local variables echo php PHP 4.1', 5.2, NULL, 1, NULL, NULL, NULL, 0, 1),
(6, '			 <div>\r\n				<h1>\r\n					6 - Section \r\n					1.1			\r\n				</h1>               \r\n				<form action="grade.php" method="post">                    \r\n					<div class="bold">Short Answer.</div>\r\n					<div>Given the following code snippet below.  What would $_POST[("questionType")] be equal to, when the selected option is short answer?\r\n\r\n<pre>\r\n&lt;form action= "QuestionCreator.php" method = "post"&gt;\r\n  &lt;select id= "questionType" onchange= "addForm()" name= "questionType" size = "1"&gt;\r\n    &lt;option value= "0"&gt;true/false&lt;/option&gt;\r\n    &lt;option value= "1"&gt;multiple choice/ one correct answer&lt;/option&gt;\r\n    &lt;option value= "2"&gt;multiple choice/ multiple selection &lt;/option&gt;\r\n    &lt;option value= "3"&gt;short answer&lt;/option&gt;\r\n  &lt;/select&gt;\r\n&lt;/form&gt;\r\n  \r\n</pre></div>\r\n					<div>\r\n						<input type="text" name="answer"/>\r\n					</div>\r\n					<input type="hidden" name="questionId" value="6"/>					<div class="centered">\r\n            <input id = "submitButton" type = "submit" value="Submit"/> \r\n          </div> \r\n				</form>\r\n			<div id="yourResults"></div>\r\n			<div id="correctAnswer"></div> \r\n            <div id="classResults"></div>\r\n</div> \r\n', '3', 2, 'Given the following code snippet below.  What would $_POST[("questionType")] be equal to, when the selected option is short answer?', 'Ignorewhitespace comma quote select dropdown value PHP 1.1', 6.2, NULL, 1, NULL, NULL, NULL, 0, 3),
(7, '		 <div>\n			<h1>\n				Q7 - Section \n				1.1			</h1>\n				\n			<form action="grade.php" method="post">                    \n				<div class="bold">True or False</div>\n				<div>\n					A good rule of thumb when designing web pages is that adding more styles/content will always improve the page?				</div>        \n				<div>\n					<input type="radio" name="truefalse" value="true"> True<br>\n					<input type="radio" name="truefalse" value="false"> False\n				</div>\n				<input type="hidden" name="questionId" value="7"/>					<div class="centered">\n            <input id = "submitButton" type = "submit" value="Submit"/>\n          </div> \n				</form>\n            \n			\n			<div id="yourResults"></div>\n			<div id="correctAnswer"></div> \n            <div id="classResults"></div>\n</div>\n', 'false', 2, 'A good rule of thumb when designing web pages is that adding more styles/content will always improve the page?', 'webdesign design content  HTML 1.1', 7.2, NULL, 1, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `StudentId` int(11) NOT NULL COMMENT 'StudentId',
  `Username` varchar(8) NOT NULL COMMENT 'NetId',
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `HashedPassword` varchar(255) NOT NULL,
  `PasswordChanges` int(11) NOT NULL,
  `LastLogin` timestamp NULL DEFAULT NULL,
  `LastLogout` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentId`, `Username`, `FirstName`, `LastName`, `Email`, `HashedPassword`, `PasswordChanges`, `LastLogin`, `LastLogout`) VALUES
(2, 'jsnow', 'jon', 'snow', 'jsnow@uwosh.edu', 'gameofthrones', 0, NULL, NULL),
(3, 'mSmith', 'Matt', 'Smith', 'mSmith@gmail.com', 'password', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SubmittedSolutions`
--

CREATE TABLE IF NOT EXISTS `SubmittedSolutions` (
  `SubmittedId` int(11) NOT NULL COMMENT 'This is needed as Primary Keys must be Unique',
  `QuestionId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `StudentSubmission` varchar(255) DEFAULT NULL,
  `PointsEarned` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SubmittedSolutions`
--

INSERT INTO `SubmittedSolutions` (`SubmittedId`, `QuestionId`, `StudentId`, `StudentSubmission`, `PointsEarned`) VALUES
(77, 1, 2, '23', 3),
(78, 2, 2, 'false', 2),
(79, 3, 2, '12', 3),
(80, 4, 2, 'visibility', 2),
(81, 5, 2, '4', 2),
(82, 6, 2, '3', 2),
(83, 7, 2, 'false', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Instructor`
--
ALTER TABLE `Instructor`
  ADD PRIMARY KEY (`InstructorId`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`QuestionId`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `SubmittedSolutions`
--
ALTER TABLE `SubmittedSolutions`
  ADD PRIMARY KEY (`SubmittedId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SubmittedSolutions`
--
ALTER TABLE `SubmittedSolutions`
  MODIFY `SubmittedId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This is needed as Primary Keys must be Unique',AUTO_INCREMENT=112;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
