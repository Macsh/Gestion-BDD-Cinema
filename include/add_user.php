<?php
// $getId = $_GET['id'];
// $records = mysqli_query($db, "SELECT * FROM user WHERE id = '$getId'");
// $data = mysqli_fetch_array($records);

if(isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $firstName = $_POST['FirstName'];
    $birthdate = $_POST['BirthDate'];
    $email = $_POST['Email'];
    $city = $_POST['City'];
    $subscription = $_POST['subscription'];
	
    $edit = mysqli_query($db,"INSERT INTO user (lastname, firstname, birthdate, email, city) VALUES ('$name', '$firstName', '$birthdate', '$email', '$city')");

    if($edit){
        if ($subscription != '0') {
            $search_id = mysqli_query($db, "SELECT MAX(id) as id FROM user");
            $row_search_id = mysqli_fetch_array($search_id);
            $maxid = $row_search_id['id'];
            $edit_sub = mysqli_query($db, "INSERT INTO membership (id_user, id_subscription) VALUES ($maxid, $subscription)");
            if($edit_sub){
                mysqli_close($db);
                header("location:users.php");
                exit;
            }
        }
        else {
            mysqli_close($db);
            header("location:users.php");
            exit;
        }
    }
}
?>