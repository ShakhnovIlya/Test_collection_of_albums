<?php

$db = include 'database/start.php';

$db->create('albums', [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
]);

header('Location: /index.php');