<?php
$search_title=$_POST["search-title"];
$records_movie = mysqli_query($db,"SELECT movie.id, movie.title, genre.name as genre FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre WHERE title like '%$search_title%'");

if(isset($_POST['add'])) {
    $movieid = $_POST['add_history'];
    var_dump($movieid);

    $checkhisto = mysqli_query($db, "SELECT * FROM user_history WHERE user_id = $getId AND movie_id = $movieid;");

    if (mysqli_num_rows($checkhisto) == 0) {
        $addtohistory = mysqli_query($db, "INSERT INTO user_history (movie_id, user_id) VALUES ($movieid, $getId);");
        header("location:user_edit.php?id=$getId");
        exit;
    }
}

?>