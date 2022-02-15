<?php
$getId = $_GET['id'];

$records = mysqli_query($db, "SELECT * FROM user WHERE id = $getId");

$id = $_GET['id']; // get id through query string

if(isset($_POST['delete'])) {

    $checksub = mysqli_query($db, "SELECT subscription.name as sub FROM user JOIN membership ON user.id = membership.id_user JOIN subscription ON membership.id_subscription = subscription.id WHERE membership.id_user = $getId");

    if (mysqli_num_rows($checksub) != 0) {
        $edit_sub = mysqli_query($db, "DELETE FROM membership WHERE id_user=$getId");
    }

    $del = mysqli_query($db,"DELETE FROM user WHERE id = '$getId'"); // delete query

    if($del){
        mysqli_close($db);
        header("location:users.php"); 
        exit;	
    }
    else{
        echo "Error deleting record";
    }
}
?>