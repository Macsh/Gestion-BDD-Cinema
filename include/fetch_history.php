<?php
$search_title_histo=$_POST["search-title-histo"];
$records_history = mysqli_query($db,"SELECT movie.id, movie.title, genre.name as genre FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre JOIN user_history ON movie.id = user_history.movie_id WHERE title like '%$search_title_histo%' AND user_history.user_id = $getId");
?>