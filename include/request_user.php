<?php
if(isset($_POST['submit'])) {
    $_SESSION['search-firstname-session'] = $_POST["search-firstname"];
    $_SESSION['search-lastname-session'] = $_POST["search-lastname"];
    $_SESSION['limit-result'] = $_POST["limit-result"];
}

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

$search_firstname=$_SESSION['search-firstname-session'];
$search_lastname=$_SESSION['search-lastname-session'];

if($_SESSION['limit-result'] == NULL){
    $_SESSION['limit-result'] = 50;
}
$limit_result = $_SESSION['limit-result'];

$count_records = mysqli_query($db,"SELECT count(*) as cpt FROM user WHERE firstname LIKE '%$search_firstname%' AND lastname like'%$search_lastname%'");
$count_result = mysqli_fetch_array($count_records);

include "include/page_display.php";

$records = mysqli_query($db,"SELECT * FROM user WHERE firstname LIKE '%$search_firstname%' AND lastname LIKE '%$search_lastname%' LIMIT $start, $num_of_elements");
?>