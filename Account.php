<?php
//Into this file, we write a code for display user information.
// require 'vendor/autoload.php'
include_once('link.php');
session_start();
include_once('header1.php');
require_once('connection.php');


?>
<div id="account">
<div class="col-lg-6 col-sm-6">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="img/user.svg">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo "Professeur";?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <table class="table">
            <?php
            $user = $_SESSION['user'];
            $sql = "SELECT * FROM {$_SESSION['user']} where email{$_SESSION['user']} = '{$_SESSION['emailUser']}';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $fname = $row['prenom'.$user];
            $lname = $row['nom'.$user];
            $gender = $row['sexe'.$user];
            $birthDay = $row['dateNaissance'.$user];
            if($user == "Professeur"){
              $professionLabel = "Profession";
              $profession = $row['profession'];
              $nbLabel = "crée";
              $sql = "SELECT count(idCours) as nbCours FROM cours where emailProfesseur = '{$_SESSION['emailUser']}';";

            }
            else{
              $professionLabel = "Universite";
              $profession = $row['nomUniversite'];
              $nbLabel = "suivi";
              $sql = "SELECT count(idCours) as nbCours FROM coursetudiant where emailEtudiant = '{$_SESSION['emailUser']}';";
            }

            $result = mysqli_query($conn, $sql);
            $data=mysqli_fetch_assoc($result);
            $nbCours = $data['nbCours'];
            ?>
          	<tr>
          		<td>Prénom:</td>
          		<td><?php echo $fname;?></td>
          	</tr>
          	<tr>
          		<td>Nom:</td>
          		<td><?php echo $lname;?></td>
          	</tr>
          	<tr>
          		<td>Sexe:</td>
          		<td><?php echo $gender;?></td>
          	</tr>
          	<tr>
          		<td>Email:</td>
          		<td><?php echo $_SESSION['emailUser'];?></td>
          	</tr>
            <tr>
              <td>Date de naissance:</td>
              <td><?php echo $birthDay;?></td>
            </tr>
            <tr>
              <td><?php echo $professionLabel;?>:</td>
              <td><?php echo $profession;?></td>
            </tr>
            <tr>
              <td>Nombre des cours <?php echo $nbLabel;?>:</td>
              <td><?php echo $nbCours;?></td>
            </tr>
          </table>
        </div>
        
      </div>
    </div>
    
    </div>
    
    </div>    
