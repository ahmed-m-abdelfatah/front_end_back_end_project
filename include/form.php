<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

if (isset($_POST['submit'])) {

    // stop add scripts to database
    // <script>alert("hi");</script>
    // script enter database as a string
    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $sql = "INSERT INTO users(firstName,lastName,email) 
            VALUES ('$firstName','$lastName','$email')";

    if (empty($firstName)) {
        echo 'First name is empty';
    } else  if (empty($lastName)) {
        echo 'Last name is empty';
    } else  if (empty($email)) {
        echo 'Email is empty';
    } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Email is not valid';
    } else {
        if (mysqli_query($connection, $sql)) {
            header('Location: index.php'); // go to index.php page & erase any stored data & prevent duplication
        } else {
            echo 'Error: ' . mysqli_error($connection);
        }
    }
}
