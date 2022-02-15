<!DOCTYPE html>
<html>
    <head>
        <title>Create a new User</title>
    </head>

    <body>

<?php

include "include/db_connection.php";
include "include/add_user.php";

?>
<button><a href="javascript:history.go(-1)">Go back</a></button>
<h2>Add New User</h2>
    <form method="POST">
        <p>
        <label for="Name">Last Name</label>
        <input type="text" name="Name" id="Name" value="">
        </p>
        <p>
        <label for="firstname">First Name</label>
        <input type="text" name="FirstName" id="FirstName" value="">
        </p>
        <p>
        <label for="birthdate">Birthdate</label>
        <input type="text" name="BirthDate" id="BirthDate" value="">
        </p>
        <p>
        <label for="email">Email</label>
        <input type="text" name="Email" id="Email" value="">
        </p>
        <p>
        <label for="city">City</label>
        <input type="text" name="City" id="City" value="">
        </p>
        <p>
        <input type="radio" name="subscription" id="Classic" value="3">
        <label for="classic">Classic</label>
        <input type="radio" name="subscription" id="Gold" value="2">
        <label for="gold">GOLD</label>
        <input type="radio" name="subscription" id="PassDay" value="4">
        <label for="passday">Pass Day</label>
        <input type="radio" name="subscription" id="Vip" value="1">
        <label for="vip">VIP</label>
        <input type="radio" name="subscription" id="NoSub" value="0">
        <label for="nosub">No Subscription</label>
        <p>&nbsp;</p>
        <p>
        <button type="submit" name="submit" id="Submit" value="Submit">Save</button>
        </p>
    </form>
    </body>
</html>