<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "dbtest";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} 
$video_id = $_POST['video_id'];
$video_id = mysqli_real_escape_string($conn,$video_id);
$query = "SELECT videos.video_id, tbl_comment.comment
FROM videos
INNER JOIN tbl_comment ON videos.video_id=tbl_comment.video_id where videos.video_id=". $video_id ." ";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)) {
    $video_id = $row['video_id'];
echo "<br><br>";
echo $row['comment'];

}
?>






<?php
                                     $video_id = $_POST['video_id'];
								$query = $conn->query("SELECT videos.video_id, tbl_comment.comment
FROM videos
INNER JOIN tbl_comment ON videos.video_id=tbl_comment.video_id where videos.video_id=". $video_id ." ");
								while($row = $query->fetch()){
								$video_id = $row['video_id'];
                                    echo "<br><br>";
echo $row['comment'];
							    ?>
                           
							<?php
							} 
							?>