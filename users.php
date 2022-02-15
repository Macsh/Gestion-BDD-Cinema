<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
    </head>

    <body>

    <?php 
    session_start(); 
    ?>
        <h3><a href="index.html">Go back home</a></h3>
        <h2>Users</h2>

        <form action="" method="post">
            <input type="text" name="search-lastname" placeholder="Search lastname">
            <input type="text" name="search-firstname" placeholder="Search firstname">
            <label for="limit-result">Number of Results : </label>
            <select id="limit-result" name="limit-result">
                <option value="10"
                <?php if($_POST['limit-result'] == 10 || $SESSION['limit-result'] == 10) : ?>
                    selected
                <?php endif; ?>
                >10</option>
                <option value="25"
                <?php if($_POST['limit-result'] == 25 || $_SESSION['limit-result'] == 25) : ?>
                    selected
                <?php endif; ?>
                >25</option>
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

        <form method="post">
            <button type="submit" name="add" id="add" value="add">Add new Entry</button>
        </form>

        <table border="2">
        <tr>
            <td>Last Name</td>
            <td>First name</td>
            <td>Mail</td>
            <td>Details</td>
        </tr>
<?php

if(isset($_POST['add'])) {
    header("location:user_add.php");
}

include "include/db_connection.php";
include "include/check_session.php";
include "include/request_user.php";

while($data = mysqli_fetch_array($records))
{
?>
    <tr>
        <td><?php echo $data['lastname']; ?></td>
        <td><?php echo $data['firstname']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td>
            <button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/user_details.php?id=<?php echo $data['id'];?>'">See Details</button>
            <button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/user_edit.php?id=<?php echo $data['id'];?>'">Edit User</button>
            <button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/user_delete.php?id=<?php echo $data['id'];?>'">Delete User</button>
        </td>
    </tr>	
<?php
}
include "include/page_display_links.php";
?>
</table>

<?php mysqli_close($db); // Close connection ?>

</body>
</html>