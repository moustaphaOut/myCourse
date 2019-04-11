<?php

  include_once('connection.php');

            $courseItems = array(0 => "cours", 1 => "chapitre", 2 => "exercice", 3 => "correction");
            $CourseItems = array(0 => "Cours", 1 => "Chapitre", 2 => "Exercice", 3 => "Correction");
            $courseItemsByName = array("cours"=> 0, "chapitre" => 1,"exercice" => 2, "correction" => 3);

  $idP = 0;
  $update = false;
  $add = false;
  $name = '';
  $description = '';
  $dossier = '';
  $idFK = 0;
  $listSelected = '';
  $typeSelected = '';
  if(isset($_GET['listSelected'])){
    $listSelected = $_GET['listSelected'];
  }
  if(isset($_GET['add'])){
    //$idP= $_GET['add'];
    $add = true;
  }

  if(isset($_POST['save'])){
      $name = $_POST['name'];
      $description = $_POST['description'];
      #---------- Start uploading file ----------
      //if(isset($_POST['file'])){
        include_once("uploadFile.php");
        $dossier  = $fileDestination;
        $typeSupport = $fileActualExt;//
      //}
      #---------- End uploading file ----------
      $idFK = $_POST['idFK'];
      echo $dossier;

      $sql = "INSERT INTO ".$listSelected." (nom".$listSelected.", description".$listSelected.", dossier".$listSelected.", id".$courseItems[$courseItemsByName[$listSelected]-1].",typeSupport".$listSelected.") VALUES ('$name','$description','$dossier','$idFK','$typeSupport')";//
      echo $sql;
      $result = mysqli_query($conn, $sql);

      $_SESSION['message'] = "Record has been saved!";
      $_SESSION['msg_type'] = "success";
     // $add = false;
      header("location: courseTeacher.php?listSelected=".$listSelected."&CoursSelected=".$_SESSION['CoursSelected']);//?CoursSelected=<?php echo $_SESSION['CoursSelected'];
  }
  if(isset($_GET['delete'])){
    $idP= $_GET['delete'];
    
    $sql = "DELETE FROM ".$listSelected." WHERE id".ucfirst($listSelected)." = '".$idP."'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
  }

  if(isset($_GET['edit'])){
    $idP= $_GET['edit'];
    $update = true;
    $add = true;
    $sql = "SELECT * FROM {$listSelected} WHERE id".$listSelected." ='".$idP."'";
   // echo "....".$sql;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $name = $row['nom'.ucfirst($listSelected)];
    $description = $row['description'.ucfirst($listSelected)];
    $dossier = $row['dossier'.ucfirst($listSelected)];
    $_SESSION['message'] = "Record has been edited!";
    $_SESSION['msg_type'] = "info";
  }
  if(isset($_POST['update'])){
    //echo "string";
    $idP= $_POST['idP'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    #---------- Start uploading file ----------
      //if(isset($_POST['file'])){
        include_once("uploadFile.php");
        $dossier = $fileDestination;
      //}
    #---------- End uploading file ----------

    $sql = "UPDATE ".$listSelected." SET nom".ucfirst($listSelected)."='$name', description".ucfirst($listSelected)."='$description', dossier".ucfirst($listSelected)."='$dossier' where id".ucfirst($listSelected)." ='".$idP."'";
    echo $sql;//' injection SQL
    //return false;
    $result = mysqli_query($conn, $sql);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: courseTeacher.php?listSelected=".$listSelected."&CoursSelected=".$_SESSION['CoursSelected']);

  }
  
?>