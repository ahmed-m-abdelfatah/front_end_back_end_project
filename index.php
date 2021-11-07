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

<?php include_once './parts/header.php' ?>


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 mx-auto my-5">
        <h1 class="display-4 fw-normal">أربح مع نور</h1>
        <p class="lead fw-normal">باقي علي فتح التسجيل</p>
        <h3 id="count-down"></h3>
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

<div class="position-relative text-center ">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
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

<div class="d-grid gap-2 col-6 mx-auto my-5">
    <button id="winner" type="button" class="btn btn-primary">اختيار الرابح</button>
</div>

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



<?php include_once './parts/footer.php' ?>