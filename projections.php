<!DOCTYPE html>
<html>
    <head>
        <title>Projections</title>
    </head>

    <body>
    <?php 
    session_start(); 
    ?>
        <h3><a href="index.html">Go back home</a></h3>
        <h2>Projections</h2>

        <form action="" method="post">
            <input type="text" name="search-title" placeholder="Search by movie title">
            <input type="datetime-local" name="search-date" min="2018-01-01T00:00" max="2018-12-31T00:00">
            <input type="text" name="search-room" placeholder="Search by room">
            <label for="limit-result">Number of Results : </label>
            <select id="limit-result" name="limit-result">
                <option value="50"
                <?php if($_POST['limit-result'] == 50 || $_SESSION['limit-result'] == 50 || basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) : ?>
                    selected
                <?php endif; ?>
                >50</option>
                <option value="75"
                <?php if($_POST['limit-result'] == 75 || $_SESSION['limit-result'] == 75) : ?>
                    selected
                <?php endif; ?>
                >75</option>
                <option value="100"
                <?php if($_POST['limit-result'] == 100 ||$_SESSION['limit-result'] == 100) : ?>
                    selected
                <?php endif; ?>
                >100</option>
            </select>
            <input type="submit" name="submit" value="Search">
        </form>

        <!-- <form method="post">
            <button type="submit" name="add" id="add" value="add">Add new Entry</button>
        </form> -->

        <table border="2">
        <tr>
            <td>Title</td>
            <td>Date Begin</td>
            <td>Room / Floor</td>
            <td>Details</td>
        </tr>
<?php

include "include/db_connection.php";
include "include/check_session.php";
include "include/movie_screening.php";

while($data = mysqli_fetch_array($records))
{
?>
    <tr>
        <td><?php echo $data['title']; ?></td>
        <td><?php echo $data['date_begin']; ?></td>
        <td>
            <?php echo $data['name']; ?> /
            <?php echo $data['floor']; ?>
        </td>
        <td>
            <button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/film_details.php?id=<?php echo $data['id'];?>'">See Details</button>
            <button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/screening_details.php?id=<?php echo $data['id'];?>'">Add a screening</button>
            <?php
                include "include/delete_screening_button.php";
            ?>
        </td>
    </tr>	
<?php
}
// if(isset($_POST['add'])) {
//     header("location:user_add.php");
// }
include "include/delete_screening.php";
include "include/page_display_links.php";
?>
</table>

<?php mysqli_close($db); // Close connection ?>

</body>
</html>