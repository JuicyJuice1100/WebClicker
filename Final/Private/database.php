<?php
  require_once('dbCredentials.php');
  /* Connect to the database with the credentials given in the file above
     Return a handle to the PDO instance or output an error message and exit
   */
  function db_connect() {
    try {
      $dbh = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_SERVER,
                     DB_USER,
                     DB_PWD,
                     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
      echo "This application exited with failure<br />" .
            "because there was an error when trying to<br />" .
            "connect to its database.<br />";
      exit();
    }
    return $dbh;
  }
  /* disconnect from the database, if needed
   */
  function db_disconnect() {
    global $db;
    if (isset($db)) {
      $db = null;
    }
  }
 ?>
