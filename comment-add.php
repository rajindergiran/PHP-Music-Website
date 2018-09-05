<?php
require_once ("db.php");
$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentSenderName = isset($_POST['name']) ? $_POST['name'] : "";
$date = date('Y-m-d H:i:s');
$video_id = isset($_POST['video_id']) ? $_POST['video_id'] : "";

$sql = "INSERT INTO tbl_comment(parent_comment_id,comment,comment_sender_name,date,video_id) 
VALUES ('" . $commentId . "','" . $comment . "','" . $commentSenderName . "','" . $date . "','" . $video_id . "')";

$result = mysqli_query($conn, $sql);

if (! $result) {
    $result = mysqli_error($conn);
}
echo $result;
?>
  




