<?php

include "../../models/classes.php";
include "../../models/trainer.php";
include "../../models/courses.php";
$t = new Trainer();
$c = new Caurses();

$trainers = $t->getAllTrainer();
$courses = $c->getAllCourses();

if (isset($_GET["id"])) {
    $cls_object = new Classes();

    $id = $_GET["id"];
    $row = $cls_object->getClass($id);
}

if ($_POST && count($_POST) > 0) {

    $cls_object = new Classes();

    $trainer_id = $_POST["trainerInput"];
    $courses_id = $_POST["coursesInput"];
    $start_date = $_POST["startDateInput"];
    $end_date = $_POST["endDateInput"];

    $isUpdate = $cls_object->updateClasses(
        $trainer_id,
        $courses_id,
        $start_date,
        $end_date,
        $_post["id"]
    );

    if ($isUpdated) {
        // redirect
        header('Location: http://localhost/php1/views/classes/');
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

                <h2><span>تعديل شعبة</span></h2>

                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['class_id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">اسم المدرب</label>
                        <select class="form-select" name="trainerInput">
                            <?php foreach ($trainers as  $trainer) { ?>
                                <option value="<?= $trainer['trainer_id'] ?>" <?= ($row['trainer_id'] == $trainer['trainer_id'] ? 'selected' : '') ?>>
                                    <?= $trainer['trainer_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم المساق</label>
                        <select class="form-select" name="coursesInput">
                            <?php foreach ($courses as  $course) { ?>
                                <option value="<?= $course['course_id'] ?> " <?= ($row['course_id'] == $course['course_id'] ? 'selected' : '') ?>>
                                    <?= $course['course_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ البداية </label>
                        <input type="date" class="form-control" name="startDateInput" value="<?= $row['start_date'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ النهاية </label>
                        <input type="date" class="form-control" name="endDateInput" value="<?= $row['end_date'] ?>" />
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة</button>
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