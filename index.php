<?php
include './include/connection.php';
include './include/form.php';

$sql = 'SELECT * FROM users';
$result = mysqli_query($connection, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC); // get table from database and convert it to array

// print_r() executes the scripts in database
// echo '<pre>';
// htmlspecialchars(print_r($users));
// echo '</pre>';

// foreach ($users as $key => $user) {
//     // script out database as a htmlspecialchars (string)
//     echo htmlspecialchars("$key => {$user['firstName']}") . "<br/>";
// }


mysqli_free_result($result); // memory free variables
mysqli_close($connection);



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
        <input type="text" name="firstName" id="firstName" autocomplete="off" placeholder="First name" required />
        <input type="text" name="lastName" id="lastName" autocomplete="off" placeholder="Last name" required />
        <input type="email" name="email" id="email" autocomplete="off" placeholder="Email" required />
        <input type="submit" name="submit" value="submit" />
    </form>

    <?php foreach ($users as $key => $user) : ?>
        <h1>
            <?php
            echo htmlspecialchars("{$user['firstName']} " . "{$user['lastName']}");
            ?>
        </h1>
    <?php endforeach; ?>

</body>

</html>