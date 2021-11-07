<?php
include './include/connection.php';
include './include/form.php';
include './include/select.php';
include './include/db_close.php';
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
    <script src="./js/loader.js" defer></script>
    <script src="./js/main.js" defer></script>
    <title>Document</title>
</head>

<body>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">أربح مع نور</h1>
            <p class="lead fw-normal">باقي علي فتح التسجيل</p>
            <h3 id="count-down"></h3>
        </div>

        <div class="container">
            <h3>للدخول في السحب يرجي اتباع ما يلي</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
                <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
                <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
                <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
                <li class="list-group-item">هذا النص هو مثال لنص يمكن استبداله في نفس المساحة.</li>
            </ul>
        </div>
    </div>


    <div class="container">
        <div class="position-relative text-center ">
            <div class="col-md-5 mx-auto my-5">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <h3>الرجاء أدخل معلوماتك</h3>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">الاسم الاول</label>
                        <input type="text" name="firstName" id="firstName" autocomplete="off" class="form-control" value="<?php echo $firstName ?>" />
                        <div class="form-text error "><?php echo $errors['firstNameError'] ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">الاسم الاخير</label>
                        <input type="text" name="lastName" id="lastName" autocomplete="off" class="form-control" value="<?php echo $lastName ?>" />
                        <div class="form-text error"><?php echo $errors['lastNameError'] ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الالكتروني</label>
                        <input type="text" name="email" id="email" autocomplete="off" class="form-control" value="<?php echo $email ?>" />
                        <div class="form-text error"><?php echo $errors['emailError'] ?></div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">ارسال المعلومات</button>
                </form>
            </div>
        </div>

        <!-- Button trigger modal -->
        <div class="d-grid gap-2 col-6 mx-auto my-5">
            <button type="button" id="winner" class="btn btn-primary">
                اختيار الرابح
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="winnerModal" tabindex="-1" aria-labelledby="winnerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="winnerModalLabel">الرابح في المسابقة</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($winners as $key => $winner) : ?>
                            <h5 class="modal-title h1 display1 text-center">
                                <?php
                                echo htmlspecialchars("{$winner['firstName']} {$winner['lastName']}")
                                ?>
                            </h5>
                            <p class="modal-text display1 text-center">
                                <?php
                                echo htmlspecialchars("{$winner['email']}")
                                ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <h2>جميع المشاركين</h2>
        <div id="cards" class="row mb-5 pb-5">
            <?php foreach ($users as $key => $user) : ?>
                <div class="col-sm-6">
                    <div class="card my-3 bg-light">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars("{$user['firstName']} {$user['lastName']}") ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars("{$user['email']}") ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="loader-container">
            <div id="loader">
                <canvas id="circularLoader" width="200" height="200"></canvas>
            </div>
        </div>
    </div>
</body>

</html>