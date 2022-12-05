<?php

include "../../models/courses.php";
if (isset($_GET["id"])) {
    $cors = new Caurses();

    $id = $_GET["id"];
    $row = $cors->getCourse($id);
}

if ($_POST && count($_POST) > 0) {

    $cors = new Caurses();

    $first_name = $_POST["courseNameInput"];

    $isUpdated = $cors->updateCourses(
        $first_name,
        $_POST["id"]
    );

    if ($isUpdated) {
        header('Location: http://localhost/php1/views/courses/');
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
                    <span>تعديل بيانات الاسم</span>

                </h2>

                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['course_id'] ?>">

                    <div class="mb-3">
                        <label for="courseNameInput" class="form-label">الاسم</label>
                        <input type="text" class="form-control" name="courseNameInput" id="courseNameInput" value="<?= $row['course_name'] ?>" required>
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