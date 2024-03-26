<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Главная страница
    </title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">НАЗВАНИЕ ПРОЕКТА: КОЛЛЕКЦИЯ АЛЬБОМОВ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Все альбомы</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="create.php" class="btn btn-success">Cоздать новый альбом</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название<br>альбома</th>
                                <th scope="col">Описание<br>альбома</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($all_albums as $all_album):?>
                            <tr>
                                <th scope="row"><?php echo $all_album['id'];?></th>
                                <td><a class="text-decoration-none text-reset" href="view.album.php?id=<?php echo $all_album['id'];?> "><?php echo $all_album['title']?></td>
                                <td><?php echo $all_album['description']?></td>
                                <td>
                                    <a href="/edit.php?id=<?php echo $all_album['id'];?>" class="btn btn-warning" onclick="return confirm('Вы уверены, что хотите изменить альбом?')">Изменить</a>
                                    <a href="/delete.php?id=<?php echo $all_album['id'];?>" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить альбом?')">Удалить</a>
                                    <a href="/view.album.php?id=<?php echo $all_album['id'];?>" class="btn btn-success">Просмотреть альбом</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>