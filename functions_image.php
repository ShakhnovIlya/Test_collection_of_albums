<?php
$conn = mysqli_connect('localhost', 'root', '', 'all_albums');
$image_id = $_GET['id'];
if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'edit')
    {
        edit($image_id);
    }
}

function edit($image_id)
{
    global $conn;
    $image = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM images WHERE id = $image_id"));

    $name_image = $_POST['name_image'];
    $description_image = $_POST['description_image'];

    if($_FILES['image']['error'] != 4)
    {
        $fileName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];

        $newImageName = uniqid() . "-" . $fileName;

        move_uploaded_file($tmpName, 'img_bd/' . $newImageName);
        $query = "UPDATE images SET image = '$newImageName', name_image = '$name_image', description_image = '$description_image'  WHERE id = $image_id";
        mysqli_query($conn, $query);
    }
        echo
        "<script>
            alert('Фотография была успешно изменена');
            document.location.href = 'view.album.php?id=".$image['albums_id']."';
        </script>";
}