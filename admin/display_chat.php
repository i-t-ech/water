<?php
require_once 'config.php';


$sql = "SELECT * FROM chat ";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $i = 0;
    
    while($row = $result->fetch_assoc()) {
        if ($i % 2 == 0) {
            echo "<div class='left'><strong>"  . $row["message"] . "</div><div class='clear'></div>";
        } else {
            echo "<div class='right'><strong>"  . $row["message"] . "</div><div class='clear'></div>";
        }
        $i++;
    }
} else {
    echo "<p></p>";
}


$conn->close();
?>