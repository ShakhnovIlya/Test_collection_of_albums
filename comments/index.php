<?php
include "../connect_db_mysqli.php";

$image_id = $_GET['id'];
$albums_id =  mysqli_fetch_object(mysqli_query($conn, "SELECT albums_id FROM images WHERE id = $image_id"))->albums_id;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Система комментариев</title>    
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="/css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="/css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="/css/statistics/chartist/chartist.css">
    <link rel="stylesheet" media="screen, print" href="/css/miscellaneous/lightgallery/lightgallery.bundle.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .forma_comment{
            margin: 40px;
        }
    </style>
</head>
<body>
    <div class="forma_comment">
        <h2>Оставить комментарий</h2>        
            <form action="add_comment.php" method="POST">
                <label>Имя:</label><br>
                <input type="text" name="name" class="form-control" placeholder="Введите имя" required><br><br>
                <label>Комментарий:</label><br>
                <textarea name="comment" name="title" class="form-control" placeholder="Введите комментарий" rows="8" cols="8" required></textarea><br><br>
                <input type="hidden" name="image_id" value="<?php echo $image_id?>">
                <input type="submit" class="btn btn-success mb-6" value="Отправить комментарий">
                <a href="../view.album.php?id=<?php echo $albums_id?>" class="btn btn-success mb-6">Вернуться к альбому</a>
            </form>
        <h2>Комментарии</h2>
        <?php include 'view_comments.php'; ?>
    </div>
</body>
</html>