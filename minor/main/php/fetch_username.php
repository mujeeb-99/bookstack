<?php
$servername="localhost";
$username="root";
$password="";
$dbname="test";

$conn=mysqli_connect($servername,$username,$password,$dbname);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}
session_start();

if (isset($_SESSION['username'])) {
  // Assuming you have a database connection established, you can query the username
  // based on the session variable or any other identifier you have.
  $username = $_SESSION['username'];

  // Example using mysqli extension
  $conn = mysqli_connect("localhost", "root", "", "test");
  $query = "SELECT username FROM detai WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $fetchedUsername = $row['username'];
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <script>
    // When the page is loaded
    window.addEventListener('DOMContentLoaded', (event) => {
      // Display the welcome message and fetched username
      document.getElementById("welcome").textContent = "Welcome, <?php echo $fetchedUsername; ?>!";
    });
  </script>
</head>
<body>
  <h1 id="welcome">Welcome!</h1>
</body>
</html>
