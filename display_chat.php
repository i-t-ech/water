<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'orrsphp';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM chat ORDER BY id DESC";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row["message"] . "</p>";
    }
} else {
    echo "";
}


$conn->close();
?>