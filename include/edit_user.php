<?php
if(isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $firstName = $_POST['FirstName'];
    $birthdate = $_POST['BirthDate'];
    $email = $_POST['Email'];
    $city = $_POST['City'];
    $subscription = $_POST['subscription'];
	
    $edit = mysqli_query($db,"UPDATE user SET lastname='$name', firstname='$firstName', birthdate='$birthdate', email='$email', city='$city' WHERE id='$getId'");

    $checksub = mysqli_query($db, "SELECT subscription.name as sub FROM user JOIN membership ON user.id = membership.id_user JOIN subscription ON membership.id_subscription = subscription.id WHERE user.id = $getId");

    if (mysqli_num_rows($checksub) == 0 && $subscription != '0') {
        $edit_sub = mysqli_query($db, "INSERT INTO membership (id_user, id_subscription) VALUES ($getId, $subscription)");
    }
    elseif (mysqli_num_rows($checksub) == 0 && $subscription == '0') {
        $edit_sub = true;
    }
    elseif (mysqli_num_rows($checksub) != 0 && $subscription == '0') {
        $edit_sub = mysqli_query($db, "DELETE FROM membership WHERE id_user=$getId");
    }
    else {
        $edit_sub = mysqli_query($db, "UPDATE membership SET id_subscription=$subscription WHERE id_user=$getId");
    }
	
    if($edit && $edit_sub){
        mysqli_close($db);
        header("location:users.php");
        exit;
    }
}
?>