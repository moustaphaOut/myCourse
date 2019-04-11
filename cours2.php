<!--
Into this file, we write a code for display user information.
-->
<?php
require_once('MyFonctions.php');
include_once('link.php');
include_once('connection.php');
require_once 'process2.php'; 
$CoursSelected = $_GET['CoursSelected'];
?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="">
  <div class='container'>
    <fieldset class="fieldset">
      <?php
        $sql = "SELECT * FROM cours where idCours = '".$CoursSelected."' limit 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $nameCours = $row["nomCours"];
        $imageCours = $row["dossierImage"];
        $descriptionCours = $row["descriptionCours"];
        $volumeHoraire = $row["volumeHoraire"];
        $dossierImage = $row["dossierImage"];
        $idCategorie = $row["idCategorie"];
        $langueCours = $row["langueCours"];
        $publier = $row["publier"];
        $sql = "SELECT * FROM Categorie where idCategorie = '".$idCategorie."' limit 1;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $nomCategorie = $row["nomCategorie"];
        ?>
      <legend><h2><?php print $nameCours;?></h2></legend>
        <div class="col-xs-6">
          <img class="img-thumbnail" src="<?php print $imageCours; ?>" style="height: 250px; width: 250px;" >
        </div>
        <div class="col-xs-6">
          <?php if ($add == false): ?>
          <div>
            <dl class="col-xs-6">
              <dt>Nom Cours</dt>
              <dd><?php print $nameCours;?></dd>
              <dt>description Cours</dt>
              <dd><?php custom_echo($descriptionCours,200);?></dd>
              <dt>volume Horaire</dt>
              <dd><?php print $volumeHoraire;?></dd>
              <dt>Langue</dt>
              <dd><?php print $langueCours;?></dd>
              <dt>Image</dt>
              <dd><?php print $dossierImage;?></dd>
              <dt>Categorie</dt>
              <dd><?php print $nomCategorie;?></dd>
              <dt>Statut</dt>
              <dd><?php if($publier) echo "Publié"; else echo "privé";?></dd>
            </dl>
          </div>
        <?php elseif ($add == true): ?>
          <div class="row justify-content-center">
            <form action="process2.php?listSelected=<?php echo $listSelected;?>&CoursSelected=<?php echo $CoursSelected;?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nom Cours</label>
                <input type="text" name="nameCours" class="form-control" placeholder="" value="<?php echo $nameCours;?>" required>
              </div>
              <div class="form-group">
                <label>description Cours</label>
                <input type="text" name="descriptionCours" class="form-control" placeholder="" value="<?php echo  $descriptionCours;?>" required>
              </div>
              <div class="form-group">
                <label>volume Horaire</label>
                <input type="number" name="volumeHoraire" class="form-control" placeholder="" min="4" value="<?php echo $volumeHoraire;?>" required>
              </div>
              <div class="form-group">
                <label>Langue </label>
                <select class="form-control" name="langueCours">
                  <option value="Anglais">Anglais</option>
                  <option value="Français">Français</option>
                  <option value="Arabe">Arabe</option>
                </select>
              </div>
              <div id="console-event"></div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="file" class="form-control" placeholder="" value="<?php echo $dossierImage;?>">
              </div>
              <div class="form-group">
                <label>Statut </label>
                <input name="publier" type="checkbox" data-toggle="toggle" data-on="Publier" data-width="60" data-off="privé">
              
              </div> 
              <div class="form-group">

                <label>Categorie</label>
                  <select class="form-control" name="categorieCours">
                    <?php
                      $sql = "SELECT * FROM categorie;";
                      $result = mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                          $nameCategorie = $row["nomCategorie"];
                          $idCategorie = $row["idCategorie"];
                    ?>
                    <option value="<?php echo $idCategorie;?>"><?php echo $nameCategorie;?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
              </div>
              <?php if ($update == true): ?>
              <button type="submit" name="update" class="btn btn_info" >Enregistrer</button>
              <?php endif ?>
            </form>
          </div>
          <?php endif ?>
        </div>
        <div class="float-xl-right">
          <a class="btn btn-danger" href="CourseTeacher.php?listSelected=<?php echo $listSelected;?>&CoursSelected=<?php echo $CoursSelected;?>&delete=aaa" >Supprimer</a>
          <?php if ($update == false): ?>
          <a class="btn btn-info" href="CourseTeacher.php?listSelected=<?php echo $listSelected;?>&CoursSelected=<?php echo $CoursSelected;?>&edit=xx" >Modifier</a>
          <?php endif ?>
        </div>
    </fieldset>
</div>
