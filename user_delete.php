<!DOCTYPE html>
<html>
    <head>
        <title>Remove User</title>
    </head>

    <body>
        <button><a href="javascript:history.go(-1)">Go back</a></button>
        <h2>User Details</h2>

<?php

include "include/db_connection.php";

include "include/remove_user.php";

$data = mysqli_fetch_array($records);
{
?>
    <h3>Last Name = <?php echo $data['lastname']; ?></h3>
    <h3>First Name = <?php echo $data['firstname']; ?></h3>
    <h3>Birthdate = <?php echo $data['birthdate']; ?></h3>
    <h3>Email = <?php echo $data['email']; ?></h3>
    <h3>City = <?php echo $data['city']; ?></h3>
    <form method="POST">
    <button type="submit" name="delete" id="delete" value="delete">Delete</button>
    </form>
<?php
}
?>


<?php mysqli_close($db); // Close connection ?>
    </body>
</html>