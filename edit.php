<?php
$db = include 'database/start.php';

$id = $_GET['id'];
$all_album = $db->getOne('albums', $id);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Создать новый альбом</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offet-md-2">
                <form action="/update.php?id=<?php echo $all_album['id'];?>" method="POST">
                    <div class="form-group">
                        <label for="">Придумайте новое название для альбома</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $all_album['title'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Придумайте новое описание для альбома</label>
                        <input type="text" name="description" class="form-control" value="<?php echo $all_album['description'];?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" onclick="return confirm('Вы уверены, что хотите изменить название или описание альбома?')">Изменить альбом</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>