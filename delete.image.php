<?php

require_once 'connect_db_mysqli.php';
$id = $_GET['id'];
$albums_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT albums_id FROM images WHERE id = $id"))['albums_id'];
mysqli_query($conn, "DELETE FROM images WHERE id = $id");
mysqli_query($conn, "DELETE FROM comments WHERE comments.image_id = $id");

header("Location: /view.album.php?id=$albums_id");