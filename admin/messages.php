<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'orrsphp';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


$user_id = $_POST['user_id'];
$message = $_POST['message'];


$conversation_query = "SELECT * FROM conversations WHERE user_id = '$user_id'";
$conversation_result = $conn->query($conversation_query);
if ($conversation_result->num_rows > 0) {
    $conversation_id = $conversation_result->fetch_assoc()['id'];
} else {
    $create_conversation_query = "INSERT INTO conversations (user_id, admin_id) VALUES ('$user_id', 1)";
    $conn->query($create_conversation_query);
    $conversation_id = $conn->insert_id;
}


$message_query = "INSERT INTO messages (conversation_id, sender_id, message) VALUES ('$conversation_id', '$user_id', '$message')";
$conn->query($message_query);


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Conversation Interface</title>
	<style>
				body {
			font-family: Arial, sans-serif;
			background-color: #f9f9f9;
		}
		
				.conversation-container {
			width: 80%;
			margin: 40px auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
				.message {
			margin-bottom: 20px;
			padding: 10px;
			border-bottom: 1px solid #ccc;
		}
		
		.message:last-child {
			border-bottom: none;
		}
		
		.message.sender {
			font-weight: bold;
			color: #337ab7;
		}
		
		.message.message-text {
			margin-top: 10px;
		}
		
		.message.time {
			font-size: 12px;
			color: #666;
		}
		
				form {
			margin-top: 20px;
		}
		
		form textarea {
			width: 100%;
			padding: 10px;
			font-size: 16px;
			border: 1px solid #ccc;
			border-radius: 10px;
		}
		
		form button[type="submit"] {
			background-color: #337ab7;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 10px;
			cursor: pointer;
		}
		
		form button[type="submit"]:hover {
			background-color: #23527c;
		}
	</style>
</head>
<body>
	<div class="conversation-container">
		<h2>Conversation</h2>
		<form action="send_message.php" method="post">
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
			<textarea name="message" placeholder="Type your message..."></textarea>
			<button type="submit">Send</button>
		</form>
		<?php
			
			while ($message = $message_result->fetch_assoc()) {
				echo '<div class="message">';
				echo '<p class="sender">'. ($message['sender_id'] == $_SESSION['user_id']? 'You' : 'Admin'). '</p>';
				echo '<p class="message-text">'. $message['message']. '</p>';
				echo '<p class="time">'. $message['created_at']. '</p>';
				echo '</div>';
			}
		?>
	</div>
</body>
</html>
<h2>Conversation</h2>
<?php include 'display_messages.php';?>