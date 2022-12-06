<?php

include "../../models/classes.php";
include "../../models/trainer.php";
include "../../models/sesstions.php";
include "../../models/courses.php";

$s = new Sesstions();
$c = new Classes();
$co = new Caurses();
$t = new Trainer();

$sesstions = $s->getAllSesstions();
$classes = $c->getAllClasses();
$courses = $co->getAllCourses();
$trainers = $t->getAllTrainer();

if ($_POST && count($_POST) > 0) {

    $ses = new Sesstions();
    $session_id = $_POST["sesstionInput"];
    $class_id = $_POST["classInput"];
    $coures_name = $_POST["couresNameInput"];
    $trainer_name = $_POST["trainerNameInput"];
    $start_time = $_POST["startTimeInput"];
    $end_time = $_POST["endTimeInput"];
    $session_date = $_POST["sesstionDateInput"];

    $isInserted = $ses->addSesstions($session_id, $class_id, $start_time, $end_time, $session_date);

    if ($isInserted) {
        header('Location: http://localhost/php1/views/sesstions/');
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

                <h2><span>إضافة لقاء</span></h2>

                <form action="add.php" method="post">


                    <div class="mb-3">
                        <label class="form-label">رقم اللقاء</label>
                        <input type="text" class="form-control" name="sesstionInput" />

                    </div>
                    <div class="mb-3">
                        <label class="form-label">رقم السجل</label>
                        <select class="form-select" name="classInput">
                            <?php foreach ($classes as  $class) { ?>
                                <option value="<?= $class['class_id'] ?> ">
                                    <?= $class['class_no'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم المساق </label>
                        <select class="form-select" name="couresNameInput">
                            <?php foreach ($courses as  $course) { ?>
                                <option value="<?= $course['course_id'] ?> ">
                                    <?= $course['course_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم المدرب </label>
                        <select class="form-select" name="trainerNameInput">
                            <?php foreach ($trainers as  $trainer) { ?>
                                <option value="<?= $trainer['trainer_id'] ?> ">
                                    <?= $trainer['trainer_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ اللقاء </label>
                        <input type="date" class="form-control" name="sesstionDateInput" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">وقت البداية </label>
                        <input type="time" class="form-control" name="startTimeInput" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">وقت النهاية </label>
                        <input type="time" class="form-control" name="endTimeInput" />
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </main>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

</body>

</html>