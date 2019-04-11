<?php

  include_once('connection.php');
    $update = false;
    $add = false; 
  if(isset($_GET['delete'])){
    $idCours= $_GET['delete'];
    
    $sql = "DELETE FROM cours WHERE idCours = '".$CoursSelected."'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
     header("location:  myCourses.php");
  }

  if(isset($_GET['edit'])){
    $add = true;
    $update = true;

    $_SESSION['message'] = "Record has been edited!";
    $_SESSION['msg_type'] = "info";
  }
  if(isset($_POST['update'])){
    $name = $_POST['nameCours'];
    $description = $_POST['descriptionCours'];
    $volumeHoraire = $_POST['volumeHoraire'];
    $categorieCours = $_POST['categorieCours'];
    $langueCours = $_POST['langueCours'];
    if($_POST['publier'] =="on")
      $publier = 1;
    else
      $publier = 0;
    $listSelected=  $_GET['listSelected'];
    $CoursSelected=  $_GET['CoursSelected'];
    $CoursSelected=  $_GET['CoursSelected'];

    /*$sql = "SELECT * FROM cours where idCours = '".$CoursSelected."' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $oldImage = $row["dossierImage"];*/
    #---------- Start uploading file ----------
      //if(isset($_POST['file'])){
        include_once("uploadFile.php");
        $dossier = $fileDestination;
      //}
    #---------- End uploading file ----------

    $sql = "UPDATE cours SET nomCours='$name', descriptionCours='$description', volumeHoraire='$volumeHoraire', langueCours='$langueCours', idCategorie='$categorieCours', dossierImage='$dossier', publier= '$publier' where idCours ='".$CoursSelected."'";
    echo $sql;//' injection SQL
     //return false;    
    $result = mysqli_query($conn, $sql);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: courseTeacher.php?listSelected=".$listSelected."&CoursSelected=".$CoursSelected);

  }
  
?>