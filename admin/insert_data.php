<?php
require_once 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $message = $_POST['message'];

    
    $sql = "INSERT INTO chat (message) VALUES ('$message')";

    
    if ($conn->query($sql) === TRUE) {
        echo $message;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>