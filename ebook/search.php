<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the AJAX request
$query = $_POST['query'];

// Perform a search query
$sql = "SELECT * FROM ebooks WHERE title LIKE '%$query%'";
$result = $conn->query($sql);

// Display the search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <!DOCTYPE html>
        <html lang=en>
        <head>
            <meta charset=UTF-8>
            <meta name=viewport content=width=device-width, initial-scale=1.0>
            <link rel=stylesheet type=text/css href=new.css>
            <title>Document</title>
            </head>
<body>
        <div class=container>
        <table border=1px class=responsive-table>
            <thead>
       <tr>
       
        <th>title of book</th>
        <th>author</th>
        <th>publication_date</th>
        <th>genre</th>
        <th>edition</th>
        <th>description</th>
        <th>download</th>
        </tr>
        </thead>
		<tbody>
        <tr>
<td>". $row['title'] ."</td>
<td> ". $row['author'] ."</td>
<td>". $row['publication_date'] ."</td>
<td>". $row['genre'] ."</td>
<td>". $row['edition'] ."</td>
<td>". $row['description'] ."</td>
<td><a  href='books/" . $row['filename'] . "'><button class=button-27>Get</button></a></td>
        </tr>
        </tbody>
         </table>
         </div>
         </body>
</html>";
    }
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();
?>
