<?php
require_once 'connect_db_mysqli.php';


$image_id = $_POST['image_id'];
$vote = intval($_POST['vote']);
$cancel_vote = boolval($_POST['cancel_vote']);
$cancel_sql = "";

setcookie("vote_$image_id", $vote, time() + 1 * 24 * 60 * 60);

if ($vote == 1) {
    if ($cancel_vote) {
        $cancel_sql = ", dislikes = dislikes - 1";
    }
    mysqli_query($conn, "UPDATE images SET likes = likes + 1 $cancel_sql WHERE id = $image_id;");
} else {
    if ($cancel_vote) {
        $cancel_sql = ", likes = likes - 1";
    }
    mysqli_query($conn, "UPDATE images SET dislikes = dislikes + 1 $cancel_sql WHERE id = $image_id;");
}