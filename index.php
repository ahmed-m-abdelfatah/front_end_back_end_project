<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

if (isset($_POST['submit'])) {
    echo $firstName . ' / ' . $lastName . ' / ' . $email;
}

?>

<!--
STEPS:
1. get data and show data
2. put data in database
3. get data from database

-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <script src="./js/main.js" defer></script>
    <title>Document</title>
</head>

<body>
    <form action="./index.php" method="POST">
        <input type="text" name="firstName" id="firstName" autocomplete="off" required value="test" placeholder="first name" />
        <input type="text" name="lastName" id="lastName" autocomplete="off" required value="test" placeholder="last name" />
        <input type="email" name="email" id="email" autocomplete="off" required value="test@test.test" placeholder="email" />
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>