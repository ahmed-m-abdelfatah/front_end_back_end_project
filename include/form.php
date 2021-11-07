<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

if (isset($_POST['submit'])) {

    if (empty($firstName)) {
        $errors['firstNameError'] = 'يرجي ادخال الاسم الاول';
    }

    if (empty($lastName)) {
        $errors['lastNameError'] = 'يرجي ادخال الاسم الاخير';
    }

    if (empty($email)) {
        $errors['emailError'] = 'يرجي ادخال الايميل';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'يرجي ادخال ايميل صالح';
    }

    // check if errors array is empty
    if (!array_filter($errors)) {
        // stop add scripts to database
        // <script>alert("hi");</script>
        // script enter database as a string
        $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        $sql = "INSERT INTO users(firstName,lastName,email) 
        VALUES ('$firstName','$lastName','$email')";

        if (mysqli_query($connection, $sql)) {
            header("Location: {$_SERVER['PHP_SELF']}"); // go to index.php page & erase any stored data & prevent duplication
        } else {
            echo 'Error: ' . mysqli_error($connection);
        }
    }
}
