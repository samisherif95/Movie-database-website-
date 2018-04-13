<?php

session_start();
$_SESSION['user_name'] = NULL;
$_SESSION['x'] = NULL;

header("Location: http://localhost/project/movie_page.php");
exit;

?>