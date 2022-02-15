<html>
    <form method="POST">
        <input type="hidden" name="date_time" id="date_time" value="<?php echo $data_screening['date_begin'];?>">

        <input type="hidden" name="room_name" id="room_name" value="<?php echo $data_screening['name']; ?>">

        <input type="hidden" name="movie_id" id="movie_id" value="<?php echo $data_screening['id']; ?>">
        
        <button type="submit" name="delete-screening" id="delete-screening" value="delete-screening">Delete Screening</button>
    </form>
</html>