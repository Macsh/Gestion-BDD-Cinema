<?php
    $page=$_GET['page'];
    if(empty($page)){
        $page=1;
    }
    if($limit_result == NULL){
        $num_of_elements=50;
    }
    else {
        $num_of_elements=$limit_result;
    }
    $num_of_article = (int) $count_result['cpt'];
    $num_of_pages=ceil($num_of_article/$num_of_elements);
    $start=($page-1)*$num_of_elements;
    if($num_of_pages == 0){
        $page=1;
    }
    elseif ($page > $num_of_pages){
        $actual_page = $_SERVER['REQUEST_URI'];
        $remove = substr($actual_page, 0, strpos($actual_page, "page="));
        $redirect = $remove. "page=1";
        header("location: $redirect");
    }
?>