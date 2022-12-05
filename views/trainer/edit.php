<?php

include "../../models/trainer.php";
if (isset($_GET["id"])) {
    $train = new Trainer();

    $id = $_GET["id"];
    $row = $train->getTrainer($id);
}

if ($_POST && count($_POST) > 0) {

    $train = new Trainer();

    $trainer_name = $_POST["trainerNameInput"];
    $mobile = $_POST["mobileInput"];
    $email = $_POST["emailInput"];

    $isUpdated = $train->updateTrainer(
        $trainer_name,
        $mobile,
        $email,
        $_POST["id"]
    );

    if ($isUpdated) {
        header('Location: http://localhost/php1/views/trainer/');
    } else {
        exit();
    }
}
?>
<!doctype html>
<html lang="ar" dir="rtl">
<?php include "../includes/head.php"; ?>

<body>
    <?php include "../includes/header.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "../includes/nav.php"; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2>
                    <span> تعديل بيانات المدرب</span>
                </h2>
                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['trainer_id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control" name="trainerNameInput" id="trainerNameInput" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الجوال</label>
                        <input type="text" class="form-control" name="mobileInput" id="mobileInput">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">البريد الالكتروني </label>
                        <input type="text" class="form-control" name="emailInput" id="emailInput">
                    </div>

                    <button type="submit" class="btn btn-primary">تعديل</button>
                </form>
            </main>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/Chart.min.js"></script>

    <script src="../assets/js/dashboard.js"></script>
</body>

</html>