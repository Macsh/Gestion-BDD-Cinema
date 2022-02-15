<!DOCTYPE html>
<html>
    <head>
        <title>Edit User Details</title>
    </head>

    <body>

<?php

include "include/db_connection.php";

include "include/user_details.php";

$data = mysqli_fetch_array($records);

include "include/edit_user.php";

?>
<button><a href="javascript:history.go(-1)">Go back</a></button>
<h2>Edit User Details</h2>
    <form method="POST">
        <p>
        <label for="Name">Last Name</label>
        <input type="text" name="Name" id="Name" value="<?php echo $data['lastname']; ?>">
        </p>
        <p>
        <label for="firstname">First Name</label>
        <input type="text" name="FirstName" id="FirstName" value="<?php echo $data['firstname']; ?>">
        </p>
        <p>
        <label for="birthdate">Birthdate</label>
        <input type="text" name="BirthDate" id="BirthDate" value="<?php echo $data['birthdate']; ?>">
        </p>
        <p>
        <label for="email">Email</label>
        <input type="text" name="Email" id="Email" value="<?php echo $data['email']; ?>">
        </p>
        <p>
        <label for="city">City</label>
        <input type="text" name="City" id="City" value="<?php echo $data['city']; ?>">
        </p>
        <p>
        <input type="radio" name="subscription" id="Classic" value="3"
        <?php if($data['sub'] == 'Classic') : ?>
            checked
        <?php endif; ?>
        >
        <label for="classic">Classic</label>
        <input type="radio" name="subscription" id="Gold" value="2"
        <?php if($data['sub'] == 'GOLD') : ?>
            checked
        <?php endif; ?>
        >
        <label for="gold">GOLD</label>
        <input type="radio" name="subscription" id="PassDay" value="4"
        <?php if($data['sub'] == 'Pass Day') : ?>
            checked
        <?php endif; ?>
        >
        <label for="passday">Pass Day</label>
        <input type="radio" name="subscription" id="Vip" value="1"
        <?php if($data['sub'] == 'VIP') : ?>
            checked
        <?php endif; ?>
        >
        <label for="vip">VIP</label>

        <input type="radio" name="subscription" id="NoSub" value="0"
        <?php if($data['sub'] == '') : ?>
            checked
        <?php endif; ?>
        >
        <label for="nosub">No Subscription</label>

        </p>
        <p>&nbsp;</p>
        <p>
        <button type="submit" name="submit" id="Submit" value="Submit">Save</button>
        </p>
    </form>

    <?php include "include/user_movie_history.php";?>

    <h2>Add to Movie History</h2>

    <form action="" method="post">
        <input type="text" name="search-title" required="required" placeholder="Search by movie title">
        <input type="submit" name="submit" value="Search">
    </form>

    <table border="2">
    <tr>
        <td>Title</td>
        <td>Genre</td>
        <td>Details</td>
    </tr>

    <?php

    include "include/edit_user_history.php";

    if($search_title != ''){
        while($data_movie = mysqli_fetch_array($records_movie))
        {
        ?>
            <tr>
                <td><?php echo $data_movie['title']; ?></td>
                <td><?php echo $data_movie['genre']; ?></td>
                <td>
                    <button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/film_details.php?id=<?php echo $data_movie['id'];?>'">See Details</button>
                    <form method="post">
                        <input type="hidden" name="add_history" id="add_history" value="<?php echo $data_movie['id'];?>">
                        <button type="submit" name="add" id="add">Add to History</button>
                    </form>
                </td>
            </tr>	
        <?php
        }
    }
    ?>
    </table>
    <?php mysqli_close($db); ?>
    </body>
</html>