<!--
Into this file, we create a layout for registration page.
-->
<?php
include_once('header.php');
include_once('link.php');
?>

<div id="frmRegistration">
<form class="form-horizontal" action="registration_code.php" method="POST">
	<h1>Créer votre compte</h1>
  <div class="form-group">
    <label class="control-label col-sm-2" for="user"></label>
    <div class="col-sm-6">
    <label class="control-label col-sm-4" for="firstname" >Je suis un:</label>
      <label class="radio-inline"><input type="radio" name="user" value="professeur" required>Professeur</label>
    <label class="radio-inline"><input type="radio" name="user" value="etudiant" required>Etudiant</label>
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="firstname" >Prénom:</label>
    <div class="col-sm-6">
      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Nom:</label>
    <div class="col-sm-6">
      <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="sexe">Sexe:</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="gender" value="Homme" required>Homme</label>
	  <label class="radio-inline"><input type="radio" name="gender" value="Femme" required>Femme</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Date de naissance:</label>
    <div class="col-sm-6">
      <input type="date" name="birthDay" class="form-control" placeholder="Enter birthDay">
    </div>
  </div>
  <!--<div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Profession:</label>
    <div class="col-sm-6">
      <input type="text" name="profession" class="form-control" placeholder="">
    </div>
  </div>*-->
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Mot de passe:</label>
    <div class="col-sm-6"> 
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create" class="btn btn-primary btn-lg">Créer</button>
    </div>
  </div>
</form>
</div>