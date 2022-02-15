<?php
$getId = $_GET['id'];

$records = mysqli_query($db, "SELECT *, subscription.name as sub FROM user JOIN membership ON user.id = membership.id_user JOIN subscription ON membership.id_subscription = subscription.id WHERE user.id = $getId");

if (mysqli_num_rows($records) == 0) {
    $records = mysqli_query($db, "SELECT * FROM user WHERE id = $getId");
}
?>