<!--
Into this file, we write a code for display user information.
-->


<?php
  include_once('link.php');
  session_start();
  include_once('header1.php');
  include_once('connection.php');
  $_SESSION['CoursSelected'] = $_GET['CoursSelected'];//idcourse
  $CoursSelected = $_SESSION['CoursSelected'];
  $listSelected = $_GET['listSelected'];
?>
<?php require_once 'process.php'; ?>

<div>
  <table class="table table-dark">
    <thead>
      <tr>
          <?php
            $sql = "SELECT nomCours FROM cours WHERE idCours = '$CoursSelected'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $nomCours = $row['nomCours'];
          ?>
          <th scope="col">Cours: <?php echo $nomCours;?></th>
      </tr>
    </thead>
  </table>
</div>

<div class="col-lg-3">
  <h1 class="my-4">Les Elements de ce cours</h1>
  <div class="list-group">
    <a href="CourseTeacher.php?listSelected=cours&CoursSelected=<?php echo $CoursSelected;?>" class="list-group-item"><?php echo $nomCours;?></a>
    <a href="CourseTeacher.php?listSelected=chapitre&CoursSelected=<?php echo $CoursSelected;?>" class="list-group-item">Chapitre</a>
    <a href="CourseTeacher.php?listSelected=exercice&CoursSelected=<?php echo $CoursSelected;?>" class="list-group-item">Exercice</a>
    <a href="CourseTeacher.php?listSelected=correction&CoursSelected=<?php echo $CoursSelected;?>" class="list-group-item">Correction</a>
  </div>
</div>

<div class="col-lg-9">
  <?php if (isset($_SESSION['message'])): ?>
  <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
     echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?> 
  </div>
  <?php endif ?>

  <div>
    <table class="table table-Success">
      <thead>
        <tr>
          <th scope="col"><h1><?php echo ucfirst($listSelected);//?></h1></th>
        </tr>
      </thead>
    </table>
  </div>

  <div>
    <?php if ($listSelected == "cours"): ?>
      <?php include_once('cours2.php');?>
    <?php else: ?>
      <?php include_once('chapitre.php');?>
    <?php endif ?>

  </div>

</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

