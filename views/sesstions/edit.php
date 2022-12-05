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
$course = $co->getAllCourses();
$trainer = $t->getAllTrainer();


if (isset($_GET["id"])) {
    $ses = new Sesstions();

    $id = $_GET["id"];
    $row = $ses->getSesstion($id);
}

if ($_POST && count($_POST) > 0) {

    $ses = new Sesstions();
    $session_id = $_POST["sesstionInput"];
    $class_id = $_POST["classInput"];
    $class_no = $_POST["classNoInput"];
    $coures_name = $_POST["couresNameInput"];
    $trainer_name = $_POST["trainerNameInput"];
    $start_time = $_POST["startTimeInput"];
    $end_time = $_POST["endTimeInput"];
    $session_date = $_POST["sesstionDateInput"];

    $isUpdate = $cls_object->updateSesstions(
        $classId,
        $startTime,
        $endTime,
        $sessionDate,
        $_post["id"]
    );

    if ($isUpdated) {
        // redirect
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
                <input type="hidden" name="id" value="<?= $row['sesstion_id'] ?>">
                <h2><span>إضافة لقاء</span></h2>

                <form action="add.php" method="post">


                    <div class="mb-3">
                        <label class="form-label">رقم اللقاء</label>
                        <select class="form-select" name="sesstionInput">
                            <?php foreach ($sesstions as  $sesstion) { ?>
                                <option value="<?= $sesstion['sesstion_id'] ?>" <?= ($row['sesstion_id'] == $sesstion['sesstion_id'] ? 'selected' : '') ?>>
                                    <?= $sesstion['trainer_id'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">رقم السجل</label>
                        <select class="form-select" name="classNoInput">
                            <?php foreach ($classes as  $class) { ?>
                                <option value="<?= $class['class_id'] ?> " <?= ($row['class_id'] == $class['class_id'] ? 'selected' : '') ?>>
                                    <?= $class['class_no'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم المساق </label>
                        <select class="form-select" name="couresNameInput">
                            <?php foreach ($courses as  $course) { ?>
                                <option value="<?= $course['course_id'] ?> " <?= ($row['course_id'] == $course['course_id'] ? 'selected' : '') ?>>
                                    <?= $course['course_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم المدرب </label>
                        <select class="form-select" name="trainerNameInput">
                            <?php foreach ($trainers as  $trainer) { ?>
                                <option value="<?= $trainer['trainer_id'] ?> " <?= ($row['trainer_id'] == $trainer['trainer_id'] ? 'selected' : '') ?>>
                                    <?= $trainer['trainer_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ اللقاء </label>
                        <input type="date" class="form-control" name="sesstionDateInput" value="<?= $row['sesstion_date'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">وقت البداية </label>
                        <input type="time" min="09:00" max="2:00" class="form-control" name="startTimeInput" value="<?= $row['start_time'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">وقت النهاية </label>
                        <input type="time" min="09:00" max="2:00" class="form-control" name="endTimeInput" value="<?= $row['end_time'] ?>" />
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