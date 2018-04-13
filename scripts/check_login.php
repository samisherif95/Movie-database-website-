<?php
session_start();
echo "<pre>";
print_r($_GET);
$user_name = $_POST['username'];
$password = $_POST['passwordlog'];
/*
* DB 
*/
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "doos";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE UserName = '" .$user_name. "' AND Password = '" .$password. "'";
$result = $conn->query($sql);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

$_SESSION['user_name'] = NULL;
$_SESSION['x'] = NULL;

if ($user)
{
    header("Location: http://localhost/project/movie_page.php");
    $_SESSION['user_name'] = $user_name;
}

else
{
    header("Location: http://localhost/project/movie_page.php");
    $_SESSION['x'] = "Invalid username or password";
}

$conn->close();

?>