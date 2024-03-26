<?php
// Параметры выгрузки фото из БД
require_once 'connect_db_mysqli.php';
require_once 'functions_image.php';

$i = 1;
$albums_id = $_GET['id'];
$images =  mysqli_query($conn, "SELECT * FROM images WHERE albums_id = $albums_id ORDER BY id ASC");
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
        <div class="col-md-3">
            <div id="panel-1" class="panel">
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
                            <form action="/upload.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-control">Название фото*</label>
                                    <input type="text" name="name_image" id="name_image" placeholder="Укажите название фото" required value="">
                                    <label class="form-control">Описание фото*</label>
                                    <input type="text" name="description_image" id="description_image" placeholder="Укажите описание фото" required value="">
                                    <label class="form-control">Фото*</label>
                                    <input type="file" name="image" id="image" accept=".jpeg, .jpg, .png" placeholder="Выберите фото">
                                    <input type="hidden" name="albums_id" value="<?=$albums_id?>">
                                </div>
                                <button class="btn btn-success mt-3" type="submit" name="submit" value="add">Загрузить</button>
                                <a href="index.php" class="btn btn-success mt-3">Вернуться ко всем альбомам</a><br>
                                <label class="form mt-3">*Максимальный размер фото - 3,5 Мб.<br>*Допустимый формат файла - jpeg, jpg, png.</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Загруженные фото
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
                        <div class="container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Загруженное фото</th>
                                        <th>Название фото</th>
                                        <th>Описание фото</th>
                                        <th>Возможные действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($images as $image):
                                        if (isset($_COOKIE['vote_'.$image['id']])) {
                                            $vote = $_COOKIE['vote_' . $image['id']];
                                        } else {
                                            $vote = null;
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><a href="img_bd/<?php echo $image['image'];?>" data-lightbox="img_lightbox" data-title="<?php echo $image['name_image'];?>">
                                            <img src="img_bd/<?php echo $image['image'];?>" width = 150 title="<?php echo $image['image'];?>"></td>
                                        <td><?php echo $image['name_image'];?></td>
                                        <td><?php echo $image['description_image'];?>
                                        <td>
                                            <a href="edit.photo.php?id=<?php echo $image['id'];?>" class="btn btn-warning mb-3" onclick="return confirm('Вы уверены, что хотите изменить фото?')">Изменить фото</a>
                                            <a href="delete.image.php?id=<?php echo $image['id'];?>" class="btn btn-danger mb-3" onclick="return confirm('Вы уверены, что хотите удалить фото?')">Удалить фото</a><br>
                                            <a href="comments/index.php?id=<?php echo $image['id'];?>" class="btn btn-info">Посмотреть комментарии</a>
                                            <div class="vote_block" data-voted="<?php echo $vote != null ? '1' : '0'?>">
                                                <div><button data-voted="<?php echo $vote==1 ? '1' : '0'?>" data-image-id="<?php echo $image['id'];?>" class="like_button"><img src='/img/like.png' /></button><div class="like_count votes_count"><?php echo $image['likes']?></div></div>
                                                <div><button data-voted="<?php echo $vote==-1 ? '1' : '0'?>" data-image-id="<?php echo $image['id'];?>" class="dislike_button"><img src='/img/dislike.png' /></button><div class="dislike_count votes_count"><?php echo $image['dislikes']?></div></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<script src="lightbox/js/lightbox-plus-jquery.js"></script>
<script>
    lightbox.option({
        'showImageNumberLabel': false,
        'wrapAround': true
    })



    $('.like_button').on('click', function(){
        like_voted = parseInt($(this).data('voted'))
        console.log(like_voted)
        if (like_voted === 0) {
            var image_id = $(this).data('image-id');
            voted = parseInt($(this).parent().parent().data('voted'));
            curr_likes = parseInt($(this).next().text())
            $(this).next().text(curr_likes + 1);
            cancel_vote = ""
            if (voted === 1) {
                count_obj = $(this).parent().parent().find(".dislike_count.votes_count")
                count_obj.text(parseInt(count_obj.text()) - 1);
                cancel_vote = true
            }
            $(this).parent().parent().data('voted', 1)
            $(this).data('voted', 1)
            $(this).parent().parent().find(".dislike_button").data("voted", 0)
            send_vote(1, image_id, cancel_vote)
        }
    })

    $('.dislike_button').on('click', function(){
        dislike_voted = parseInt($(this).data('voted'))
        console.log(dislike_voted)
        if (dislike_voted === 0) {
            var image_id = $(this).data('image-id');
            voted = parseInt($(this).parent().parent().data('voted'));
            curr_likes = parseInt($(this).next().text())
            $(this).next().text(curr_likes + 1);
            cancel_vote = ""
            if (voted === 1) {
                count_obj = $(this).parent().parent().find(".like_count.votes_count")
                count_obj.text(parseInt(count_obj.text()) - 1);
                cancel_vote = true
            }
            $(this).parent().parent().data('voted', 1)
            $(this).data('voted', 1)
            $(this).parent().parent().find(".like_button").data("voted", 0)
            send_vote(-1, image_id, cancel_vote)
        }
    })

    function send_vote(vote, image_id, cancel) {
        $.post( "/vote.php", { vote: vote, image_id: image_id, cancel_vote:cancel}, function( data ) {

        });
    }
</script>
</body>
</html>