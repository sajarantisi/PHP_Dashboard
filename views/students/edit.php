<?php

include "../../models/students.php";
if (isset($_GET["id"])) {
  $std_object = new Students();

  $id = $_GET["id"];
  $row = $std_object->getStudent($id);
}

if ($_POST && count($_POST) > 0) {

  $std_object = new students();

  $first_name = $_POST["firstNameInput"];
  $second_name = $_POST["secondNameInput"];
  $last_name = $_POST["lastNameInput"];
  $gender = $_POST["genderInput"];
  $date_of_birth = $_POST["dateOfBirthInput"];
  $mobile = $_POST["mobileInput"];

  $isUpdated = $std_object->updateStudent(
    $first_name,
    $second_name,
    $last_name,
    $gender,
    $date_of_birth,
    $mobile,
    $_POST["id"]
  );

  if ($isUpdated) {
    header('Location: http://localhost/php1/views/students/');
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
          <span>تعديل بيانات الطالب</span>

        </h2>

        <form action="edit.php" method="post">
          <input type="hidden" name="id" value="<?= $row['student_id'] ?>">

          <div class="mb-3">
            <label for="firstNameInput" class="form-label">الاسم</label>
            <input type="text" class="form-control" name="firstNameInput" id="firstNameInput" value="<?= $row['student_fname'] ?>" required>
          </div>

          <div class="mb-3">
            <label for="secondNameInput" class="form-label">الأب</label>
            <input type="text" class="form-control" name="secondNameInput" id="secondNameInput" value="<?= $row['student_sname'] ?>">
          </div>

          <div class="mb-3">
            <label for="lastNameInput" class="form-label">العائلة</label>
            <input type="text" class="form-control" name="lastNameInput" id="lastNameInput" value="<?= $row['student_lname'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">الجنس</label>
            <select class="form-select" name="genderInput">
              <option value="1" <?= ($row['student_gender'] == 1 ? "selected" : "") ?>>طالب </option>
              <option value="2" <?= ($row['student_gender'] == 2 ? "selected" : "") ?>>طالبة </option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">تاريخ الميلاد</label>
            <input type="date" class="form-control" name="dateOfBirthInput" id="dateOfBirthInput" value="<?= $row['student_dob'] ?>">
          </div>

          <div class="mb-3">
            <label for="mobileInput" class="form-label">الجوال</label>
            <input type="text" class="form-control" name="mobileInput" id="mobileInput" value="<?= $row['student_mobile'] ?>">
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