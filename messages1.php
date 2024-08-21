<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'orrsphp';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function update_input($input_text) {
    global $conn;
    $sql = "UPDATE user_input SET input_text = ? WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $input_text);

    if ($stmt->execute() === TRUE) {
        echo "User input updated successfully!";
    } else {
        echo "Error updating user input: " . $stmt->error;
    }
    $stmt->close();
}


function get_input() {
    global $conn;
    $sql = "SELECT input_text FROM user_input WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["input_text"];
    } else {
        return "No user input found!";
    }
}


if (isset($_POST['update'])) {
    $input_text = $_POST['input_text'];
    update_input($input_text);
}


$input_text = get_input();


$conn->close();
?>


<form action="" method="post">
    <label for="input_text">Enter your input:</label>
    <input type="text" id="input_text" name="input_text" value="<?php echo htmlspecialchars($input_text); ?>">
    <input type="submit" name="update" value="Update">
</form>
