<?php
require_once 'connect_db_mysqli.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM albums WHERE id = $id");
mysqli_query($conn, "DELETE FROM comments WHERE image_id IN (SELECT id FROM images WHERE albums_id = $id)");
mysqli_query($conn, "DELETE FROM images WHERE albums_id = $id");

header('Location: /index.php');