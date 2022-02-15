<?php
if(isset($_POST['save-screening'])) {
    $date=date('Y-m-d', strtotime($_POST["date"]));
    $time=date('H:i:s', strtotime($_POST["date"]));
    $record_date = $date. ' ' . $time;
    $room = $_POST['room'];
	
    $edit = mysqli_query($db,"INSERT INTO movie_schedule (date_begin, id_movie, id_room) VALUES ('$record_date', '$getId', '$room')");
    if($edit){
        mysqli_close($db);
        header("location:screening_details.php?id=$getId");
        exit;
    }
}
?>