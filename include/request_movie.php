<?php
if(isset($_POST['submit'])) {
$_SESSION['search-title-session'] = $_POST["search-title"];
$_SESSION['search-genre-session'] = $_POST["search-genre"];
$_SESSION['search-distributor-session'] = $_POST["search-distributor"];
$_SESSION['limit-result'] = $_POST["limit-result"];
}

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

$search_title=$_SESSION['search-title-session'];
$search_genre=$_SESSION["search-genre-session"];
$search_distributor=$_SESSION["search-distributor-session"];

if($_SESSION['limit-result'] == NULL){
    $_SESSION['limit-result'] = 50;
}
$limit_result = $_SESSION['limit-result'];

$count_records = mysqli_query($db,"SELECT count(*) as cpt FROM movie JOIN distributor ON movie.id_distributor = distributor.id JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre WHERE title like '%$search_title%' AND genre.name like '%$search_genre%' AND distributor.name like '%$search_distributor%'");
$count_result = mysqli_fetch_array($count_records);

include "include/page_display.php";

$records = mysqli_query($db,"SELECT movie.id, movie.title, genre.name as genre, distributor.name FROM movie JOIN distributor ON movie.id_distributor = distributor.id JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre WHERE title like '%$search_title%' AND genre.name like '%$search_genre%' AND distributor.name like '%$search_distributor%' LIMIT $start, $num_of_elements");
?>