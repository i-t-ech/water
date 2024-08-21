<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'orrsphp';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function update_progress($service_id, $progress) {
    global $conn;
    $sql = "UPDATE services SET progress = '$progress' WHERE id = '$service_id'";
    $conn->query($sql);

    
    $sql = "INSERT INTO progress_history (service_id, progress) VALUES ('$service_id', '$progress')";
    $conn->query($sql);
}


function get_progress($service_id) {
    global $conn;
    $sql = "SELECT progress FROM services WHERE id = '$service_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['progress'];
}


function get_progress_history($service_id) {
    global $conn;
    $sql = "SELECT * FROM progress_history WHERE service_id = '$service_id' ORDER BY updated_at DESC";
    $result = $conn->query($sql);
    $history = array();
    while($row = $result->fetch_assoc()) {
        $history[] = $row;
    }
    return $history;
}


if (isset($_POST['service_id']) && isset($_POST['progress'])) {
    $service_id = $_POST['service_id'];
    $progress = $_POST['progress'];
    update_progress($service_id, $progress);
    ?>
    <h1>Update Progress</h1>
    <p>Progress updated successfully!</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="service_id">Service ID:</label>
        <input type="text" id="service_id" name="service_id"><br><br>
        <label for="progress">Progress:</label>
        <input type="number" id="progress" name="progress"><br><br>
        <input type="submit" value="Update Progress">
    </form>
    <?php
} else {
    ?>
    <h1>Update Progress</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="service_id">Service ID:</label>
        <input type="text" id="service_id" name="service_id"><br><br>
        <label for="progress">Progress:</label>
        <input type="number" id="progress" name="progress"><br><br>
        <input type="submit" value="Update Progress">
    </form>
    <?php
}


if (isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    $progress = get_progress($service_id);
    $history = get_progress_history($service_id);
    ?>
    <h1>Service Progress</h1>
    <p>Current Progress: <?php echo $progress; ?>%</p>
    <h2>Progress History</h2>
    <ul>
        <?php foreach ($history as $entry) { ?>
            <li><?php echo $entry['updated_at']; ?> - <?php echo $entry['progress']; ?>%</li>
        <?php } ?>
    </ul>
    <?php
}

$conn->close();
?>