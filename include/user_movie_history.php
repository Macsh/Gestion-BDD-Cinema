<html>
<h2>Movie History</h2>

<table border="2">
<tr>
    <td>Title</td>
    <td>Genre</td>
    <td>Details</td>
</tr>

<?php

include "include/fetch_history.php";

    while($data_history = mysqli_fetch_array($records_history))
    {
    ?>
        <tr>
            <td><?php echo $data_history['title']; ?></td>
            <td><?php echo $data_history['genre']; ?></td>
            <td><button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/film_details.php?id=<?php echo $data_history['id'];?>'">See Details</button></td>
        </tr>	
    <?php
    }
?>
</table>
</html>