<!DOCTYPE html>
<html>
    <head>
        <title>Movie Details</title>
    </head>

    <body>
        <button><a href="javascript:history.go(-1)">Go back</a></button>
        <h2>Movie Details</h2>

<?php

include "include/db_connection.php";

$getId = $_GET['id'];

$records = mysqli_query($db, "SELECT * FROM movie WHERE id = $getId");


while($data = mysqli_fetch_array($records))
{
?>
    <h3>Title = <?php echo $data['title']; ?></h3>
    <h3>Director = <?php echo $data['director']; ?></h3>
    <h3>Duration = <?php echo $data['duration']; ?> minutes</h3>
    <h3>Rating = <?php echo $data['rating']; ?></h3>
    <h3>Release Date = <?php echo $data['release_date']; ?></h3>
<?php
}
?>


<?php mysqli_close($db);?>
    </body>
</html>