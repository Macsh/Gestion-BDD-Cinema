<!DOCTYPE html>
<html>
    <head>
        <title>Add a screening</title>
    </head>

    <body>

    

        <?php

        $getId = $_GET['id'];
        include "include/db_connection.php";
        include "include/add_screening.php";
        
        

        $records = mysqli_query($db, "SELECT * FROM movie WHERE id = $getId");


        while($data = mysqli_fetch_array($records))
        {
        ?>
            <h3>Title = <?php echo $data['title']; ?></h3>
            <h3>Director = <?php echo $data['director']; ?></h3>
            <h3>Duration = <?php echo $data['duration']; ?> minutes</h3>
            <h3>Rating = <?php echo $data['rating']; ?></h3>
        <?php
        }
        ?>

        <p>&nbsp;</p>

        <h2>Add a screening for this movie</h2>

        <form method="POST">
        <p>
        <label for="date">Date de commencement</label>
        <input type="datetime-local" name="date" min="2018-01-01T00:00" max="2018-12-31T00:00">
        </p>
        <p>
        <label for="room">Room</label>
        <select id="room" name="room">
            <option value="">--Please choose an option--</option>
            <option value="1">Montana / Floor 0 / 135 Seats</option>
            <option value="2">Highscore / Floor 0 / 300 Seats</option>
            <option value="3">Salle 3 / Floor 0 / 85 Seats</option>
            <option value="4">Astek / Floor 1 / 85 Seats</option>
            <option value="5">Gecko / Floor 1 / 125 Seats</option>
            <option value="6">Azure / Floor 1 / 85 Seats</option>
            <option value="7">Toshiba / Floor 1 / 300 Seats</option>
            <option value="8">Salle 14 / Floor 1 / 85 Seats</option>
            <option value="9">Asus / Floor 1 / 280 Seats</option>
            <option value="10">Salle 16 / Floor 1 / 125 Seats</option>
            <option value="11">Microsoft / Floor 2 / 200 Seats</option>
            <option value="12">VIP / Floor 2 / 35 Seats</option>
            <option value="13">Golden / Floor 2 / 89 Seats</option>
            <option value="14">Salle 23 / Floor 2 / 225 Seats</option>
            <option value="15">Lenovo / Floor 3 / 225 Seats</option>
            <option value="16">Salle 31 / Floor 3 / 38 Seats</option>
            <option value="17">Huawei / Floor 3 / 130 Seats</option>
        </select>
        </p>
        <p>
        <button type="submit" name="save-screening" id="save-screening" value="save-screening">Save</button>
        </p>
        <p>&nbsp;</p>
        </form>

        <h2>Planned Screenings</h2>

        <table border="2">
        <tr>
            <td>Title</td>
            <td>Date Begin</td>
            <td>Room / Floor</td>
            <td>Details</td>
        </tr>

        <?php

        include "include/planned_screening.php";

        while($data_screening = mysqli_fetch_array($records_screening))
        {
        ?>
            <tr>
            <td><?php echo $data_screening['title']; ?></td>
            <td><?php echo $data_screening['date_begin']; ?></td>
            <td>
                <?php echo $data_screening['name']; ?> /
                <?php echo $data_screening['floor']; ?>
            </td>
            <td>
                <button type="submit" onclick="window.location.href = '../W-PHP-501-LIL-1-1-mycinema-alexandre.menskoi/film_details.php?id=<?php echo $data['id'];?>'">See Details</button>
                <?php
                include "include/delete_screening_button.php";
                ?>
            </td>
            </tr>	
        <?php
        }
        include "include/delete_screening.php";
        ?>
        </table>
    </body>
</html>