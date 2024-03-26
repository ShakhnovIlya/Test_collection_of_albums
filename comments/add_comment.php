<?php
include "../connect_db_mysqli.php";

// Получение данных из формы
$name = $_POST['name'];
$comment = $_POST['comment'];
$image_id = $_POST['image_id'];

// Вставка комментария в базу данных
$sql = "INSERT INTO comments (name, comment, image_id) VALUES ('$name', '$comment', '$image_id')";
if ($conn->query($sql) === TRUE) 
{
    echo "Комментарий успешно добавлен!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: /comments/index.php?id=' . $image_id);