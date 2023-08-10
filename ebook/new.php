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

            if ($result->num_rows > 0) {
                // Output the searched row
                $row = $result->fetch_assoc();
                echo "<html>";
                echo "<head>";
                echo "<link rel=stylesheet type=text/css href=new.css>";
                echo "</head>";

                echo "<table border=1px>";
                echo "<tr>";
                echo "<th>Title of book</th>";
                echo "<th>author</th>";
                echo "<th>publication_date</th>";
                echo "<th>genre</th>";
                echo "<th>edition</th>";
                echo "<th>description</th>";
                echo "<th>download</th>";
                
                
                // Add more table headers as needed
                echo "</tr>";
                while ($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["publication_date"] . "</td>";
                echo "<td>" . $row["genre"] . "</td>";
                echo "<td>" . $row["edition"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td> <a href='books/" . $row['filename'] . "'><button class=button-27>Get</button></a></td>";
                // Add more table cells as needed
                echo "</tr>";}
                echo "</table>";
                echo "</html>";
            } else {
                echo "No rows found.";
            }

            $conn->close();
        
    
    ?>
