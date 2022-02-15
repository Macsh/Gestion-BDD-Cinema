<?php
$search_title=$_POST["search-title"];
$search_room=$_POST["search-room"];
$records_screening = mysqli_query($db,"SELECT movie.id, movie.title, movie_schedule.date_begin, room.name, room.floor FROM movie JOIN movie_schedule ON movie.id = movie_schedule.id_movie JOIN room ON movie_schedule.id_room = room.id WHERE movie.id='$getId' ORDER BY date_begin");
?>