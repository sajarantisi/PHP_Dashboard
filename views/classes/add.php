<?php

use FFI\CData;

include "../../models/classes.php";
include "../../models/trainer.php";
include "../../models/courses.php";
$t = new Trainer();
$c = new Caurses();

$trainers = $t->getAllTrainer();
$courses = $c->getAllCourses();

if ($_POST && count($_POST) > 0) {

    $cls = new Classes();

    $trainer_id = $_POST["trainerInput"];
    $courses_id = $_POST["coursesInput"];
    $start_date = $_POST["startDateInput"];
    $end_date = $_POST["endDateInput"];

    $isInserted = $cls->addClasses($trainer_id, $courses_id, $start_date, $end_date);

    if ($isInserted) {
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

                <h2><span>إضافة شعبة</span></h2>

                <form action="add.php" method="post">


                    <div class="mb-3">
                        <label class="form-label">اسم المدرب</label>
                        <select class="form-select" name="trainerInput">
                            <?php foreach ($trainers as  $trainer) { ?>
                                <option value="<?= $trainer['trainer_id'] ?> ">
                                    <?= $trainer['trainer_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم المساق</label>
                        <select class="form-select" name="coursesInput">
                            <?php foreach ($courses as  $course) { ?>
                                <option value="<?= $course['course_id'] ?> ">
                                    <?= $course['course_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ البداية </label>
                        <input type="date" class="form-control" name="startDateInput" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ النهاية </label>
                        <input type="date" class="form-control" name="endDateInput" />
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </main>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

</body>

</html>