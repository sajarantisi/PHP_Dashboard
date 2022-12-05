<?php

include "../../models/sesstions.php";


$ses = new Sesstions();
//Deleting Method
if ($_POST && $_POST["id"]) {
    $ses->deleteSesstions($_POST["id"]);
}


$sesstions = $ses->getAllSesstions();
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
                    <span>اللقاءات</span>
                    <a href="add.php" type="button" class="btn btn-light float-end">إضافة</a>
                </h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">رقم اللقاء</th>
                                <th scope="col">رقم السجل</th>
                                <th scope="col">اسم المساق</th>
                                <th scope="col">اسم المدرب</th>
                                <th scope="col">تاريخ اللقاء </th>
                                <th scope="col">وقت البداية</th>
                                <th scope="col">وقت النهاية</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sesstions as $key => $value) { ?>
                                <tr>
                                    <td><?= ($key + 1); ?></td>
                                    <td><?= $value["sesstion_id"]; ?></td>
                                    <td><?= $value["class_no"]; ?></td>
                                    <td><?= $value["course_name"]; ?></td>
                                    <td><?= $value["trainer_name"]; ?></td>
                                    <td><?= $value["sesstion_date"]; ?></td>
                                    <td><?= $value["start_time"]; ?></td>
                                    <td><?= $value["end_time"]; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $value["sesstion_id"] ?>"><span data-feather="edit"></span></a>
                                        <a href="#" data-id="<?= $value["sesstion_id"] ?>" class="delete"><span data-feather="trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- data-bs-toggle="modal" data-bs-target="#deleteModal" -->
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">حذف سجل اللقاء</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>
                        هل تريد بالتأكيذ حذف بيانات اللقاء
                        <small id="name" style="color: blue;"></small>
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" id="id" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-danger">تأكيد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "../includes/footer.php"; ?>
</body>

</html>