<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path_array = explode("/", $path);
$active_controller = $path_array[count($path_array) - 2];
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?= $active_controller == 'students' ? 'active' : '' ?>" aria-current="page" href="../students/index.php">
          <span data-feather="home"></span>
          الطلاب
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $active_controller == 'courses ' ? 'active' : '' ?>" aria-current="page" href="../courses/index.php">
          <span data-feather="file"></span>
          المساقات
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?= $active_controller == 'trainers' ? 'active' : '' ?> aria-current="page" href="../trainer/index.php">
          <span data-feather="shopping-cart"></span>
          المدربين
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?= $active_controller == 'classes ' ? 'active' : '' ?> href="../classes/index.php">
          <span data-feather="users"></span>
          الشعب
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?= $active_controller == 'registration ' ? 'active' : '' ?> href="../registration/index.php">
          <span data-feather="users"></span>
          التسجيل
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?= $active_controller == 'sesstions ' ? 'active' : '' ?> href="../sesstions/index.php">
          <span data-feather="layers"></span>
          اللقاءات
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>التقارير المحفوظة</span>
      <a class="link-secondary" href="#" aria-label="إضافة تقرير جديد">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          الشهر الحالي
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          الربع الأخير
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          التفاعل الإجتماعي
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          مبيعات نهاية العام
        </a>
      </li>
    </ul>
  </div>
</nav>