<?php
include "../../models/students.php";

if ($_POST && count($_POST) > 0) {

  $std = new Students();

  $first_name = $_POST["firstNameInput"];
  $second_name = $_POST["secondNameInput"];
  $last_name = $_POST["lastNameInput"];
  $gender = $_POST["genderInput"];
  $date_of_birth = $_POST["dateOfBirthInput"];
  $mobile = $_POST["mobileInput"];

  $isInserted = $std->addStudent(
    $first_name,
    $second_name,
    $last_name,
    $gender,
    $date_of_birth,
    $mobile
  );

  if ($isInserted) {
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

        <h2><span>إضافة طالب</span></h2>

        <form action="add.php" method="post">
          <div class="mb-3">
            <label class="form-label">الاسم</label>
            <input type="text" class="form-control" name="firstNameInput" id="firstNameInput" required>
          </div>
          <div class="mb-3">
            <label class="form-label">اسم الأب</label>
            <input type="text" class="form-control" name="secondNameInput" id="secondNameInput">
          </div>
          <div class="mb-3">
            <label class="form-label">العائلة</label>
            <input type="text" class="form-control" name="lastNameInput" id="lastNameInput">
          </div>
          <div class="mb-3">
            <label class="form-label">طالب/طالبة</label>
            <select name="genderInput" class="form-select">
              <option value="1">طالب</option>
              <option value="2">طالبة</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">تاريخ الميلاد</label>
            <input type="date" class="form-control" name="dateOfBirthInput" id="dateOfBirthInput">
          </div>
          <div class="mb-3">
            <label class="form-label">الجوال</label>
            <input type="text" class="form-control" name="mobileInput" id="mobileInput">
          </div>
          <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
      </main>
    </div>
  </div>

  <?php include "../includes/footer.php"; ?>

</body>

</html>