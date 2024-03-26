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
                <form action="/store.php" method="POST">
                    <div class="form-group">
                        <label for="">Название нового альбома</label>
                        <input type="text" name="title" class="form-control" placeholder="Например, Лето-2024" required>
                    </div>
                    <div class="form-group">
                        <label for="">Описание нового альбома</label>
                        <input type="text" name="description" class="form-control" placeholder="Например, Как я провел и где я был летом в 2024 году..." required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" formtarget="_self">Создать новый альбом</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
