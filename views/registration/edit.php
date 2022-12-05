<?php

include "../../models/classes.php";
include "../../models/students.php";
include "../../models/registration.php";
$s = new Students();
$c = new Classes();

$students = $s->getAllStudents();
$classes = $c->getAllClasses();

if (isset($_GET["id"])) {
    $reg = new Registration();

    $id = $_GET["id"];
    $row = $reg->getRegistration($id);
}

if ($_POST && count($_POST) > 0) {

    $reg = new Registration();

    $id = $_POST["id"];
    $class_id = $_POST["classInput"];
    $student_id = $_POST["studentInput"];
    $reg_date = $_POST["regDateInput"];

    $isUpdated = $reg->updateRegistration($class_id, $student_id, $reg_date, $id);

    if ($isUpdated) {
        header('Location: http://localhost/php1/views/registration/');
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

                <h2><span>تعديل سجل الطالب </span></h2>

                <form action="add.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['reg_id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">المساق و الشعبة</label>
                        <select class="form-select" name="classInput">
                            <?php foreach ($classes as  $class) { ?>
                                <option value="<?= $class['class_id'] ?> " <?= ($row['class_id'] == $class['class_id'] ? 'selected' : '') ?>>
                                    <?= $class['course_name'] . " " . "(" . $class['class_no'] . ")" ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم الطالب</label>
                        <select class="form-select" name="studentInput">
                            <?php foreach ($students as  $student) { ?>
                                <option value="<?= $student['student_id'] ?>" <?= ($row['student_id'] == $student['student_id'] ? 'selected' : '') ?>>
                                    <?= $student['student_fname'] . " " . $student['student_lname'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ التسجيل </label>
                        <input type="date" class="form-control" name="regDateInput" value="<?= $row['reg_date'] ?>" />
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