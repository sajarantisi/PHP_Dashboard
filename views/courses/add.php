<?php
include "../../models/courses.php";

if ($_POST && count($_POST) > 0) {

    $cors = new Caurses();

    $first_name = $_POST["courseNameInput"];

    $isInserted = $cors->addCourses(
        $first_name,

    );

    if ($isInserted) {
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

                <h2><span>إضافة الاسم</span></h2>

                <form action="add.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control" name="courseNameInput" id="courseNameInput" required>
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </main>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

</body>

</html>