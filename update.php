<?php
$db = include 'database/start.php';

$db->update('albums', [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
], $_GET['id']);

header('Location: /index.php');