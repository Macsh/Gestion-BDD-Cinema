<?php
    for($i=1;$i<=$num_of_pages;$i++){
        if($page!=$i){
            echo "<a href='?page=$i'>$i</a>&nbsp";
        }
        else {
            echo "<a>$i</a>&nbsp";
        }
    }
?>