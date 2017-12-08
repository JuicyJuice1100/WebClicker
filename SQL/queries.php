<?php
    /******************************************************************************
    *=============================== Question ====================================* 
    *******************************************************************************/
    function insertQuestion($id, $questionStatement, $correctAnswer, $numberOfPoints, 
    $topicDescription, $keyword, $sectionNumber, $phpGraderCode, $numberofCorrectAnswers,
    $averagePoints, $startTime, $endTime, $questionStatus, $questionType) {
        global $db;
        try {
            $query = "INSERT INTO Question 
                VALUES (?, ?, ?, ?, ?, ?, ? ,? ,?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$id, $questionStatement, $correctAnswer, $numberOfPoints, 
            $topicDescription, $keyword, $sectionNumber, $phpGraderCode, $numberOfCorrectAnswers,
            $averagePoints, $startTime, $endTime, $questionStatus, $questionType]);
            return true;
        } catch (PDOException $e) {
            db_disconnect();
            exit("Aborting: There was a database error when inserting " .
                "question.");
        }
    }

    function getQuestionById($id) {
        global $db; 
        try {
            $query = "SELECT * FROM Question WHERE QuestionId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return  $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "questions.");
        }
    }

    function getAllQuestions(){
        global $db;
        try {
            $query = "SELECT * FROM Question";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "questions.");
        }
    }

    function deleteQuestionById($id){
        global $db;
        try {
            $query = "DELETE FROM Question WHERE QuestionId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleting " .
                "question.");
        }
    }

    function getQuestionAverageById($id){
        global $db;
        try {
            $query = "SELECT AveragePoints 
                FROM Question 
                WHERE ID = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "average.");
        }
    }

    function editQuestionById($id, $questionStatement, $correctAnswer, $numberOfPoints, 
    $topicDescription, $keyword, $sectionNumber, $phpGraderCode, $numberOfCorrectAnswers,
    $averagePoints, $startTime, $endTime, $questionStatus, $questionType){
        global $db;
        try {
            $query = "UPDATE Question
                SET QuestionStatement = $questionStatement
                ,CorrectAnswer = $correctAnswer
                ,NumberOfPoints = $numberOfPoints
                ,TopicDescription = $topicDescription
                ,Keyword = $keyword
                ,SectionNumber = $sectionNumber
                ,PhpGraderCode = $phpGraderCode
                ,NumberOfCorrectAnswers = $numberOfCorrectAnswers
                ,AveragePoints = $averagePoints
                ,StartTime = $startTime
                ,EndTime = $endTime
                ,QuestionStatus = $questionStatus
                ,QuestionType = $questionType
                WHERE QuestionId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when editing " .
                "question.");
        }
    }

    // Please note this will only search for full words not partial words
    function getQuestionsByKeyword($keyword){
        global $db;
        try {
            $query = "SELECT * FROM Question 
                WHERE Keyword LIKE %$keyword%";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "question.");
        }
    }

    function getLastQuestionNumber(){
        global $db;
        try{
            $query = "SELECT MAX(QuestionId) AS LastQuestionId FROM Question";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving " .
                "question number.");
        }
    }

    function getFirstActiveQuestion(){
        global $db;
        try
            $query = "SELECT * FROM Question WHERE QuestionStatus = 2 LIMIT 1";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when getting ".
                "active question.");
        }
    }

    function changeQuestionStatus($id, $status){
        global $db;
        try{
            $query = "UPDATE Question
                SET QuestionStatus = $status
                WHERE QuestionId = $id";
                $stmt = $db->prepare($query);
                $stmt->execute();
                return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when changing ".
                "question status.");
        }
    }

    /******************************************************************************
    *================================ Student ====================================* 
    *******************************************************************************/
    function insertStudent($id, $username, $firstName, $lastName, $email, 
    $hashedPassword, $passwordChanges, $lastLogin, $lastLogout){
        global $db;
        try {
            $query = "INSERT INTO Student 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$id, $username, $firstName, $lastName, $email, $hashedPassword,
                $passwordChanges, $lastLogin, $lastLogout]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting " .
                "student.");
        }
    }

    function deleteStudentById($id){
        global $db;
        try {
            $query = "DELETE FROM Student WHERE StudentId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleting " .
                "student.");
        }
    }

    function editStudentById($id, $username, $firstName, $lastName, $email, 
    $hashedPassword, $passwordChanges, $lastLogin, $lastLogout){
        global $db;
        try {
            $query = "UPDATE Student
                SET Username = $username
                ,FirstName = $firstName
                ,LastName = $lastName
                ,Email = $email
                ,HashedPassword = $hashedPassword
                ,PasswordChanges = $passwordChanges
                ,LastLogin = $lastLogin
                ,LastLogout = $lastLogout
                WHERE StudentId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when editing " .
                "student.");
        }
    }

    function editStudentPassword($username, $hashedPassword){
    global $db;
        try {
        $query = "UPDATE Student
                SET hashedPassword = $hashedPassword
                PasswordChanges = PasswordChanges + 1
                WHERE Username = $username";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return true;
    } catch (PDOException $e){
        db_disconnect();
        exit("Aborting: There was a database error when changing password");
    }
    }

    function getAllStudents(){
        global $db;
        try {
            $query = "SELECT * FROM Student";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "students.");
        }
    }

    function getStudentById($id){
        global $db;
        try {
            $query = "SELECT * FROM Student WHERE StudentId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "student.");
        }
    }

    function getStudentPasswordByUsername($username){
        global $db;
        try{
            $query = "SELECT HashedPassword FROM Student WHERE Username = $username";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing ".
                "student.");
        }
    }

    /******************************************************************************
    *============================== Instructor ===================================* 
    *******************************************************************************/
    function insertInstructor($id, $username, $firstName, $lastName, $email, 
    $hashedPassword, $passwordChanges, $lastLogin, $lastLogout){
        global $db;
        try {
            $query = "INSERT INTO Instructor 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$id, $username, $firstName, $lastName, $email, $hashedPassword,
                $passwordChanges, $lastLogin, $lastLogout]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting " .
                "student.");
        }
    }

    function deleteInstructorById($id){
        global $db;
        try {
            $query = "DELETE FROM Instructor WHERE InstructorId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleting " .
                "student.");
        }
    }

    function editInstructorById($id, $username, $firstName, $lastName, $email, 
    $hashedPassword, $passwordChanges, $lastLogin, $lastLogout){
        global $db;
        try {
            $query = "UPDATE Instructor
                SET Username = $username
                ,FirstName = $firstName
                ,LastName = $lastName
                ,Email = $email
                ,HashedPassword = $hashedPassword
                ,PasswordChanges = $passwordChanges
                ,LastLogin = $lastLogin
                ,LastLogout = $lastLogout
                WHERE InstructorId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when editing " .
                "student.");
        }
    }

    function editInstructorPassword($username, $hashedPassword){
    global $db;
        try {
        $query = "UPDATE Instructor
                SET hashedPassword = $hashedPassword
                PasswordChanges = PasswordChanges + 1
                WHERE Username = $username";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return true;
    } catch (PDOException $e){
        db_disconnect();
        exit("Aborting: There was a database error when changing password");
    }

    function getAllInstructor(){
        global $db;
        try {
            $query = "SELECT * FROM Instructor";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "students.");
        }
    }

    function getInstructorById($id){
        global $db;
        try {
            $query = "SELECT * FROM Instructor WHERE InstructorId = $id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when listing " .
                "student.");
        }
    }

    function getInstructorPasswordByUsername($username){
        global $db;
        try{
            $query = "SELECT HashedPassword FROM Instructor WHERE Username = $username";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: Username does not exist");
        }
    }

    /******************************************************************************
    *============================ SubmittedSolutions ==============================* 
    *******************************************************************************/

    function getSubmission($questionId, $studentId){
        global $db;
        try {
            $query = "SELECT * FROM SubmittedSolutions 
                    INNER JOIN Question ON SubmittedSolutions.QuestionId = Question.QuestionId
                    WHERE SubmittedSolutions.QuestionId = $questionId AND StudentId = $studentId";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was an database error when listing " .
                "submission stats.");
        }
    }

    function getQuestionSubmissions($questionId){
        global $db;
        try{
            $query = "SELECT * FROM SubmittedSolutions
                    WHERE QuestionId = $quesitonId";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was an error when getting all solutions");
        }
    }

    function insertSubmission($questionId, $studentId, $studentSubmission, $pointsEarned){
        global $db;
        try {
            $query = "INSERT INTO SubmittedSolutions (QuestionId, StudentId, StudentSubmission, PointsEarned)
                VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$questionId, $studentId, $studentSubmission, $pointsEarned]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting " .
                "submission stats.");
        }
    }

    function editSubmission($questionId, $studentId, $studentSubmission, $pointsEarned){
        global $db;
        try {
            $query = "UPDATE SubmittedSolutions
                SET StudentSubmission = $studentSubmission
                PointsEarned = $pointsEarned
                WHERE QuestionId = $questionId AND StudentId = $studentId";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when editing " .
                "submission stats.");
        }
    }

    function deleteSubmission($questionId, $studentId){
        global $db;
        try {
            $query = "DELETE FROM Submittedsolutions 
                WHERE QuestionId = $questionId AND StudentId = $studentId";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleting " .
                "submission stats.");
        }
    }
?>