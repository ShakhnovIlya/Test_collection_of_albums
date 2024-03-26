<?php

require_once 'functions_image.php';
require_once 'connect_db_mysqli.php';
$image_id = $_GET['id'];
$image = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM images WHERE id = $image_id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Альбом
    </title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="/css/app.bundle.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/lightbox/css/lightbox.css">
</head>
<body class="mod-bg-1 mod-nav-link">
        <main id="js-page-content" role="main" class="page-content">
            <div class="row">
        <div class="col-md-4">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Загрузка фотографии
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="form-group">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-control">Название фото</label>
                                    <input type="text" name="name_image" id="name_image" value="<?php echo $image['name_image'];?>">
                                    <label class="form-control">Описание фото</label>
                                    <input type="text" name="description_image" id="description_image" value="<?php echo $image['description_image'];?>">
                                    <label class="form-control">Фото</label>
                                    <input type="file" name="image" id="image" accept=".jpeg, .jpg, .png" placeholder="Выберите фото">
                                </div>
                                <button class="btn btn-success mt-3" type="submit" name="submit" value="edit">Загрузить</button>
                                <a href="index.php" class="btn btn-success mt-3">На главную</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
