<?php
if(isset($_POST['delete-screening'])) {
    $date_time=$_POST["date_time"];
    $room_name = $_POST['room_name'];
    $room_id_query = mysqli_query($db, "SELECT id FROM room WHERE name LIKE '%$room_name%'");
    $room_id_fetch = mysqli_fetch_array($room_id_query);
    $room_id_delete = $room_id_fetch['id'];
    $movie_id = $_POST['movie_id'];
	
    $delete_confirm = mysqli_query($db,"DELETE FROM movie_schedule WHERE id_movie='$movie_id' AND id_room='$room_id_delete' AND date_begin='$date_time';");
    if($delete_confirm){
        mysqli_close($db);
        header("location:movie_screening.php?id=$getId");
        exit;
    }
}
?>