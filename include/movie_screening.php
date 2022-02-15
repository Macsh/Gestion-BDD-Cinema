<?php

if(isset($_POST['submit'])) {
    $_SESSION['search-title-screening-session'] = $_POST["search-title"];
    $_SESSION['search-date-session'] = $_POST["search-date"];
    $_SESSION['search-room-session'] = $_POST["search-room"];
    $_SESSION['limit-result'] = $_POST["limit-result"];
    }

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

$search_title=$_SESSION['search-title-screening-session'];
$search_date=date('Y-m-d', strtotime($_SESSION['search-date-session']));
$search_time=date('H:i:s', strtotime($_SESSION['search-date-session']));
if($search_date == '1970-01-01') {
    $search_date = ('2018-01-01');
    $search_time = ('00:00:00');
    $search_date_plus = ('2018-12-31');
}
else {
    $date = new DateTimeImmutable($search_date);
    $date_plus= $date->modify('+1 day');
    $search_date_plus = $date_plus->format('Y-m-d');
}
$search_room=$_SESSION['search-room-session'];

if($_SESSION['limit-result'] == NULL){
    $_SESSION['limit-result'] = 50;
}
$limit_result = $_SESSION['limit-result'];

$count_records = mysqli_query($db,"SELECT count(*) as cpt FROM movie JOIN movie_schedule ON movie.id = movie_schedule.id_movie JOIN room ON movie_schedule.id_room = room.id WHERE movie.title like '%$search_title%' AND (movie_schedule.date_begin >= '$search_date $search_time' AND movie_schedule.date_begin <= '$search_date_plus 00:00:00') AND room.name like '%$search_room%'");
$count_result = mysqli_fetch_array($count_records);

include "include/page_display.php";

$records = mysqli_query($db,"SELECT movie.id, movie.title, movie_schedule.date_begin, room.name, room.floor FROM movie JOIN movie_schedule ON movie.id = movie_schedule.id_movie JOIN room ON movie_schedule.id_room = room.id WHERE movie.title like '%$search_title%' AND (movie_schedule.date_begin >= '$search_date $search_time' AND movie_schedule.date_begin <= '$search_date_plus 00:00:00') AND room.name like '%$search_room%' ORDER BY movie_schedule.date_begin LIMIT $start, $num_of_elements");
?>