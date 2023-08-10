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

// Get the form data
$title = $_POST['title'];
$author = $_POST['author'];
$publication_date = $_POST['publication_date'];
$genre = $_POST['genre'];
$edition = $_POST['edition'];
$description = $_POST['description'];
$fileTmpPath = $_FILES['pdfFile']['tmp_name'];
$fileName = $_FILES['pdfFile']['name'];

// Move the uploaded file to the desired directory
$uploadDir = 'books/';
$uploadPath = $uploadDir . $fileName;
if (move_uploaded_file($fileTmpPath, $uploadPath)) {
    // Insert eBook details into the database
    $stmt = $conn->prepare("INSERT INTO ebooks (title, author, publication_date, genre, edition, description,  filename) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $title, $author, $publication_date, $genre, $edition, $description , $fileName);

    if ($stmt->execute()) {
        echo "eBook uploaded successfully.";
    } else {
        echo "Error inserting eBook details: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error moving the PDF file.";
}

// Close the database connection
$conn->close();
?>
