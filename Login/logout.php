<?php

// logs user our and redirects to the home page

require_once("dbCredentials.php");

session_destroy();
session_regenerate_id(TRUE);
session_start();
redirect("sign_in.html", "Logout successful");
?>
