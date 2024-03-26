<?php
$db = include 'database/start.php';

$id = $_GET['id'];
$all_albums = $db->getOne('albums', $id);