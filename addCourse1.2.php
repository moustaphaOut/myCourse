<!--
Into this file, we write a code for display user information.
-->

<?php
include_once('link.php');
session_start();
include_once('header1.php');
include_once('connection.php');

?>
<div id="frmRegistration">
<form class="form-horizontal" action="addCourse_code.php" method="POST" enctype="multipart/form-data">
  <br><br>
  <h1>Creer Votre Cours</h1>
  <div class="form-group">
    <label class="control-label col-sm-2">Nom du cours:</label>
    <div class="col-sm-6">
      <input type="text" name="nameCourse" class="form-control" placeholder="Le nom de votre Cours" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Description:</label>
    <div class="col-sm-6">
      <input type="text" name="descriptionCours" class="form-control" placeholder="Une description de votre cours">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Volume horaire:</label>
    <div class="col-sm-6">
      <input type="number" name="CoursHours" class="form-control" min="4" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Langue:</label>
    <div class="col-sm-6">
        <select name="langueCours">
          <option value="Anglais">Anglais</option>
          <option value="Français">Français</option>
          <option value="Arabe">Arabe</option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Image:</label>
    <div class="col-sm-6">
      <input type="file" name="file" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Categorie:</label>
    <div class="col-sm-6">
      <div class="col-sm-6">
        <select name="categorieCours">
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
      
  </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Créer</button>
    </div>
  </div>
</form>
</div>
<div class="col-sm-6">
  <!--<button class="btn btn-success" ria-expanded="false" data-toggle="modal" data-target="#addCategorie">Ajouter Categorie</button>-->
</div>
<!-- ............................START POPUP............................................. -->

<div class="modal" id="addCategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <form action="addCategorie_code.php" method="post">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Ajouter Categorie</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <label class="control-label">Nom Categorie</label>
                    <input type="text" name="nameCategorie" placeholder="" class="form-control validate">

                </div>

                <div class="md-form mb-4">
                    <label class="control-label">Description Categorie</label>
                    <input type="text" name="descriptionCategorie" placeholder="" class="form-control validate">
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-success">Ajouter</button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- ............................END POPUP............................................. -->


