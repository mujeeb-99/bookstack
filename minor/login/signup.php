<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST["username"];
$email = $_POST["email"];
$phone = $_POST["number"];
$password = $_POST["password"];

// Check if username already exists
$sql = "SELECT * FROM detail WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Username already exists";
} else {
  // Insert data into database
  $sql = "INSERT INTO detail (username, email, number, password) VALUES ('$username', '$email', '$phone', '$password')";

  if ($conn->query($sql) === TRUE) {
    // your PHP code before redirect 
header('Location: login.html'); // redirect to HTML page

exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
