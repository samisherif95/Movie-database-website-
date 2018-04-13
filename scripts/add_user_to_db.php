<?php

echo "<pre>";
print_r($_GET);
$FirstName = $_GET['firstname'];
$LastName =$_GET['lastname'];
$Username = $_GET['username'];
$Email = $_GET['email'];
$Password = $_GET['password'];
$Date = $_GET['birthdate'];
$Gender = $_GET['gender'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_SESSION['user_name'] = NULL;

$sql = "INSERT INTO Users (FirstName, LastName ,Username ,Email, Password, Gender, Birthdate) 
VALUES ('" .$FirstName. "', '" .$LastName. "', '" .$Username. "', '" .$Email. "', '" .$Password. "', '" .$Gender. "', '" .$Date. "')";

if ($conn->query($sql) === TRUE)
{
    header("Location: http://localhost/project/open_page.php");
    $_SESSION['user_name'] = $user_name;
} 

else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>