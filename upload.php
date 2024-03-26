<?php
require_once "connect_db_mysqli.php";

// Параметры загрузки фото в БД
if(isset($_POST['submit']))
{
    $name_image = $_POST['name_image'];
    $description_image = $_POST['description_image'];
    $albums_id = $_POST['albums_id'];

    if($_FILES['image']['error'] === 4)
    {
        echo "<script> alert('Файл не был выбран');
                       document.location.href = 'view.album.php?id=$albums_id';
              </script>";
    }

    else {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension))
        {
            echo "<script> alert('Недопустимое расширение изображения! Выберите файл с расширением jpg, jpeg, png');
                           document.location.href = 'view.album.php';
                 </script>";

        } else {
            if ($fileSize > 3500000)
            {
                echo "<script> alert('Размер изображения слишком большой');
                               document.location.href = 'view.album.php';
                      </script>";

            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, 'img_bd/' . $newImageName);
                $query = "INSERT INTO images (name_image, description_image, image, albums_id) VALUES ('$name_image', '$description_image', '$newImageName', '$albums_id')";
                mysqli_query($conn, $query);
                echo
                "<script>
                    alert('Фотография успешно добавлена!');
                    document.location.href = 'view.album.php?id=$albums_id';
                </script>";
            }
        }
    }
}