<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = rand(1000, 9999); 
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orrsphp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
    $message = $conn->real_escape_string($_POST['message']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO chat_messages (user_id, message) VALUES ('$user_id', '$message')";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT id, user_id, message FROM chat_messages ORDER BY created_at ASC";
$result = $conn->query($sql);
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat Here</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; }
        .chat-container { max-width: 600px; margin: 50px auto; padding: 20px; background: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .chat-box { border: 1px solid #ddd; padding: 10px; height: 400px; overflow-y: scroll; display: flex; flex-direction: column; }
        .message { padding: 10px; margin: 10px 0; border-radius: 10px; max-width: 75%; }
        .message.even { background-color: #d1f4d3; align-self: flex-start; }
        .message.odd { background-color: #f4d1d1; align-self: flex-end; }
        .message p { margin: 0; }
        form { display: flex; flex-direction: column; }
        textarea { resize: none; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 10px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; cursor: pointer; margin-bottom: 10px; }
        button:hover { background-color: #45a049; }
        .back-button { background-color: #f44336; }
        .back-button:hover { background-color: #e53935; }
    </style>
</head>
<body>
    <div class="chat-container">
        <h1>Chat Here</h1>
        <div class="chat-box">
            <?php foreach ($messages as $message): ?>
                <div class="message <?php echo ($message['id'] % 2 == 0) ? 'even' : 'odd'; ?>">
                    <p><?php echo htmlspecialchars($message['message']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <form method="POST" action="">
            <textarea name="message" placeholder="Type your message here..." required></textarea><br>
            <button type="submit">Send</button>
        </form>
        <button class="back-button" onclick="goBack()">Back</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
