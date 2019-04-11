<?php
//Into this file, we write a code for display user information.
session_start();
include_once('connection.php');
include_once('link.php');
include_once('header1.php');
require_once('MyFonctions.php');

$CoursSelected = $_GET['CoursSelected'];

$sql = "SELECT * FROM cours where idCours = '{$CoursSelected}';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$nameCours = $row["nomCours"];
$imageCours = $row["dossierImage"];
$descriptionCours = $row["descriptionCours"];
$volumeHoraire = $row["volumeHoraire"];
$dossierImage = $row["dossierImage"];
$idCategorie = $row["idCategorie"];
$dateLancement = $row["dateLancement"];
$emailProfesseur = $row["emailProfesseur"];
$langueCours = $row["langueCours"];

$sql2 = "SELECT * FROM professeur where emailProfesseur = '{$emailProfesseur}';";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $nomProfesseur = $row2["nomProfesseur"];
  $prenomProfesseur = $row2["prenomProfesseur"];

$sql2 = "SELECT count(*) as nbChapitre FROM chapitre where idCours = '{$CoursSelected}';";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $nbChapitre = $row2["nbChapitre"];

$sql2 = "SELECT count(*) as nbExercice FROM exercice INNER JOIN chapitre on (exercice.idChapitre = chapitre.idChapitre) where idCours = '{$CoursSelected}';";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $nbExercice = $row2["nbExercice"];

$sql2 = "SELECT nomCategorie FROM categorie where idCategorie = {$idCategorie};";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $nomCategorie = $row2["nomCategorie"];

$sql2 = "SELECT COUNT(emailEtudiant) as nbStudent from coursetudiant WHERE idCours = '{$CoursSelected}';";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $nbStudent = $row2["nbStudent"];

?>

<div class="">
  <div class="row">

    <div class="ml-5 col2">
      <div class="card rounded ml-5" style="width: 24rem;">
        <img src="<?php echo $dossierImage;?>" class="card-img-top" style="height: 150px; width: 200px;">
        <div class="card-body">
          <h5 class="card-title text-dark">Gratuit</h5>
          <p class="card-text">Un cours de <?php echo $nomCategorie;?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> Un cours de <?php echo $volumeHoraire;?> heures</li>
          <li class="list-group-item">Continet <?php echo $nbChapitre;?> chapitres</li>
          <li class="list-group-item">Contient <?php echo $nbExercice;?> Exercices</li>
        </ul>
        <div class="card-body">
          <a href="courseDisplay.php?CoursSelected=<?php echo $CoursSelected;?>&listSelected=Chapitre" class="btn btn-success card-link btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> Commencer ce cours</a>
        </div>
      </div>
    </div>

    <div class="ml-5 col">
      <div class="jumbotron jumbotron-fluid">
        <div class="">
          <h5 class="display-4"><?php echo $nameCours;?></h5>
          <br>
          <p class="lead">Learn Interesting facts about java and how java emerges on the world stage.</p>
          <p class="lead"><?php echo $nbStudent;?> participants inscrits</p>
          <p class="lead"><span class="glyphicon glyphicon-pencil"></span>Créé par <?php echo $prenomProfesseur." ".$nomProfesseur;?>&nbsp&nbsp&nbsp&nbsp <span class="glyphicon glyphicon-save-file"></span>Publié le <?php echo $dateLancement;?>&nbsp&nbsp&nbsp&nbsp <span class="glyphicon glyphicon-comment"></span><?php echo $langueCours;?></p>
        </div>
      </div>
      <div class="">
        <h5 class="display-4">Description</h5>
        <br>
        <p class="lead"><?php echo $descriptionCours;?></p>
      </div>
    </div>
  </div>

  <div class="ml-5">
    <br>
    <h1>Des cours similaires</h1>
    <?php
      $sql = "SELECT * FROM cours where idCategorie = '{$idCategorie}';";
      $result = mysqli_query($conn, $sql);
      while ($row = $result->fetch_assoc()):
        $idCours = $row["idCours"];
        $nameCours = $row["nomCours"];
        $imageCours = $row["dossierImage"];
        $descriptionCours = $row["descriptionCours"];
        $timeCours = $row["volumeHoraire"];
    ?>
    <div class="col-lg-3 col-md-6 mb-2">
      <div class="card" style="height: 400;">
        <a href="Course.php?CoursSelected=<?php echo $idCours;?>"><img class="card-img-top" src="<?php echo $imageCours; ?>" style="height: 150px; width: 150px;" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="Course.php?CoursSelected=<?php echo $idCours;?>"><?php echo $nameCours;?></a>
          </h4>
          <h5>Un cours de <?php echo $timeCours;?>H</h5>
          <p class="card-text"><?php custom_echo($descriptionCours, 200);;?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
      </div>
    </div> 
    <?php endwhile;?>
  </div>

</div>
<?php 
  //include_once('footer.php');
