<?php

$db = include 'database/start.php';

$all_albums = $db->getall('albums');

include 'index.view.php';