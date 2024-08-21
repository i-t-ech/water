<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'orrsphp';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


$conversation_id = $_GET['conversation_id'];


$message_query = "SELECT * FROM messages WHERE conversation_id = '$conversation_id' ORDER BY created_at ASC";
$message_result = $conn->query($message_query);


while ($message = $message_result->fetch_assoc()) {
    echo "<p>Sender: ". ($message['sender_id'] == $_SESSION['user_id']? 'You' : 'Admin'). "</p>";
    echo "<p>Message: ". $message['message']. "</p>";
    echo "<p>Time: ". $message['created_at']. "</p>";
    echo "<hr>";
}


$conn->close();
?>