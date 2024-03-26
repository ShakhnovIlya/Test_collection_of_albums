<?php
include "../connect_db_mysqli.php";

// Извлечение комментариев из базы данных
$sql = "SELECT * FROM comments where image_id = '$image_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        echo "<p><strong>" . $row['name'] . "</strong>: " . $row['comment'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "Пока нет комментариев.";
}

$conn->close();