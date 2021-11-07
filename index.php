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
4. frontend
-->

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.min.css">
    <script src="./js/bootstrap.bundle.min.js" defer></script>
    <script src="./js/main.js" defer></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 fw-normal">أربح مع نور</h1>
                <p class="lead fw-normal">باقي علي فتح التسجيل</p>
                <p class="lead fw-normal">للسحب علي ربح نسخة مجانية من برنامج</p>
                <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">تابع البث المباشر علي صفحتي بالفيسبوك بالتاريخ المذكور اعلاه</li>
            <li class="list-group-item">ساقوم ببث مباشر لمدة ساعة عن اسئلة و اجوبة حرة للجميع</li>
            <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
            <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
            <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
        </ul>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
    </div>

    <form action="./index.php" method="POST">
        <input type="text" name="firstName" id="firstName" autocomplete="off" placeholder="First name" required />
        <input type="text" name="lastName" id="lastName" autocomplete="off" placeholder="Last name" required />
        <input type="email" name="email" id="email" autocomplete="off" placeholder="Email" required />
        <input type="submit" name="submit" value="submit" />
    </form>

    <?php foreach ($users as $key => $user) : ?>
        <h1>
            <?php
            echo htmlspecialchars("{$user['firstName']} {$user['lastName']}")
                . "<br/>"
                . htmlspecialchars("{$user['email']}");
            ?>
        </h1>
    <?php endforeach; ?>

</body>

</html>