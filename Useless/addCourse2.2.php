<!--
Into this file, we write a code for display user information.
-->

<?php
include_once('link.php');
include_once('header1.php');
include_once('connection.php');

?>
<div id="frmRegistration">
<form class="form-horizontal" action="addCourse_code2.php" method="POST" enctype="multipart/form-data">
  <br><br>
  <h1>Creer Votre Cours > Ajouter </h1>
  <div class="form-group">
    <label class="control-label col-sm-2">Type:</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="typeAdd" value="cours">Chapitre</label>
      <label class="radio-inline"><input type="radio" name="typeAdd" value="Chapitre">Exercice</label>
      <label class="radio-inline"><input type="radio" name="typeAdd" value="exercice">Correction</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Nom:</label>
    <div class="col-sm-6">
      <input type="text" name="nameAdd" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Description:</label>
    <div class="col-sm-6">
      <input type="text" name="descriptionAdd" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Type:</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="typeSource" value="Video">Video</label>
      <label class="radio-inline"><input type="radio" name="typeSource" value="Image">Image</label>
      <label class="radio-inline"><input type="radio" name="typeSource" value="PDF">PDF</label>
      <label class="radio-inline"><input type="radio" name="typeSource" value="None">None</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ressource:</label>
    <div class="col-sm-6">
      <input type="FILE" name="fileRessource">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Lien vers:</label>
    <div class="col-sm-6">
      <?php 
        // mysql select query
          $query = "SELECT * FROM `cours`";

// for method 1

          $result1 = mysqli_query($conn, $query);
      ?>
        <select>

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

        </select>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
    </div>
<!--
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create" class="btn btn-primary">Precedent</button>
      <button type="submit" name="create" class="btn btn-primary" onclick="window.location.href='/welcome.php'">Valider</button>
    </div>
    
  </div>
-->
</form>
</div>