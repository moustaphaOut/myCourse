<!--
Into this file, we create a layout for welcome page.
-->
<?php
//class="d-block w-100 h-100"
session_start();
include_once('header1.php');

require_once('connection.php');
include_once('link.php');
require_once('MyFonctions.php');
$categorieSelected='';
//$user = '';
if (!empty($_GET['idCategorie']))
  $categorieSelected = $_GET['idCategorie'];

?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="mySlides h-75 w-100" src="img/Slider/1.jpg" style="opacity: 0.9;">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="font-weight-bold display-1 ">Prenez des résolutions ambitieuses</h1>
        <h5 class="display-4">En 2019, devenez la personne que vous avez toujours souhaité devenir.</h5>
      </div>
    </div>
    <div class="carousel-item active">
     <img class="mySlides h-75 w-100" src="img/Slider/2.jpg" style="opacity: 0.9;">
     <div class="carousel-caption d-none d-md-block">
        <h1 class="font-weight-bold display-1">Crée votre cours gratuitement en 5min</h1>
        <h5 class="display-4">Vous avez choisi de créer un cours en ligne sur MyCourse. Félicitations ! Nous sommes ravis de vous voir ici.</h5>
      </div>
    </div>
    <div class="carousel-item active">
      <img class="mySlides h-75 w-100" src="img/Slider/3.jpg" style="opacity: 0.9;">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="font-weight-bold display-1">Votre avenir commence ici.</h1>
        <h5 class="display-4">Découvez les compétences de demain.Et prenez votre carriére en main.</h5>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  <script>
    var slideIndex = 0;
    carousel();

    function carousel() {
    var i;
    var x = document.getElementsByClassName("carousel-item active");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
      x[slideIndex-1].style.display = "block"; 
      setTimeout(carousel, 4000); // Change image every 2 seconds
    }
  </script>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-2">
      <div class="my-4">
        <h1 >Categories</h1>
            <!--<div class="col-sm-6">
              <button class="btn btn-success" ria-expanded="false" data-toggle="modal" data-target="#addCategorie">Ajouter Categorie</button>
            </div>-->
      </div>

      <div class="list-group">
        <?php
	         $sql = "SELECT * FROM categorie;";
	         $result = mysqli_query($conn, $sql);
	         if(mysqli_num_rows($result) > 0){
	           while($row = mysqli_fetch_assoc($result)){
        				$nameCategorie= $row["nomCategorie"];
                $idCategorie = $row["idCategorie"];
                $sql2 = "SELECT count(*) as nbCoursByCategorie FROM cours where idCategorie = '{$idCategorie}';";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($result2);
                $nbCoursByCategorie = $row2["nbCoursByCategorie"];
        ?>
        <a href="welcome.php?idCategorie=<?php echo $idCategorie;?>" class="list-group-item"><?php echo $nameCategorie." (".$nbCoursByCategorie.")";?></a>
        <?php
              }
            }
       	?>
      </div>

      </div>
        <div class="col-lg-9">
          
          <H1>Tes cours</H1>
          <div class="row">
            <?php
              if($categorieSelected != NULL)
                  $sql = "SELECT * FROM cours where idCategorie = {$categorieSelected} AND emailProfesseur='{$_SESSION['emailUser']}' AND publier = '1';";
              else
                  $sql = "SELECT * FROM cours where emailProfesseur='{$_SESSION['emailUser']}' AND publier = '1';";
              $result = mysqli_query($conn, $sql);
              while ($row = $result->fetch_assoc()):
                  $idCours = $row["idCours"];
                  $nameCours = $row["nomCours"];
                  $imageCours = $row["dossierImage"];
                  $descriptionCours = $row["descriptionCours"];
                  $timeCours = $row["volumeHoraire"];

                  $sql2 = "SELECT COUNT(emailEtudiant) as nbStudent from coursetudiant WHERE idCours = '{$idCours}';";
                  $result2 = mysqli_query($conn, $sql2);
                  $row2 = mysqli_fetch_array($result2);
                  $nbStudent = $row2["nbStudent"];
            ?>

            <div class="col-lg-4 col-md-6 mb-2">
              <div class="card" style="height: 400;">
                <a href="Course.php?CoursSelected=<?php echo $idCours;?>"><img class="card-img-top" src="<?php echo $imageCours; ?>" style="height: 150px; width: 150px;" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="Course.php?CoursSelected=<?php echo $idCours;?>"><?php echo $nameCours;?></a>
                  </h4>
                  <h5>Un cours de <?php echo $timeCours;?>H</h5>
                  <p class="card-text"><?php custom_echo($descriptionCours, 200);?></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted"><span class="glyphicon glyphicon-education"></span> (<?php echo $nbStudent;?>)</small>
                </div>
              </div>
            </div> 
            <?php endwhile;?>
          </div>
          <hr></hr>

          <h1>Cours en ligne</h1>
          <div class="row">
            <?php
              if($categorieSelected != NULL)
                  $sql = "SELECT * FROM cours where emailProfesseur!='{$_SESSION['emailUser']}' AND idCategorie = {$categorieSelected} AND publier = '1' ;";
              else
                  $sql = "SELECT * FROM cours where emailProfesseur!='{$_SESSION['emailUser']}' AND publier = '1';";
              $result = mysqli_query($conn, $sql);
              while ($row = $result->fetch_assoc()):
                  $idCours = $row["idCours"];
                  $nameCours = $row["nomCours"];
                  $imageCours = $row["dossierImage"];
                  $descriptionCours = $row["descriptionCours"];
                  $timeCours = $row["volumeHoraire"];

                  $sql2 = "SELECT COUNT(emailEtudiant) as nbStudent from coursetudiant WHERE idCours = '{$idCours}';";
                  $result2 = mysqli_query($conn, $sql2);
                  $row2 = mysqli_fetch_array($result2);
                  $nbStudent = $row2["nbStudent"];
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-20" style="height: 400;">
                  <a href="Course.php?CoursSelected=<?php echo $idCours;?>"><img class="card-img-top" src="<?php echo $imageCours; ?>" style="height: 150px; width: 150px;" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="Course.php?CoursSelected=<?php echo $idCours;?>"><?php echo $nameCours;?></a>
                    </h4>
                    <h5>Un cours de <?php echo $timeCours;?>H</h5>
                    <p class="card-text"><?php custom_echo($descriptionCours,200);?></p>
                  </div>
                  <div class="card-footer">
                  <small class="text-muted"><span class="glyphicon glyphicon-education"></span> (<?php echo $nbStudent;?>)</small>
                  </div>
                </div>
            </div> 
            <?php endwhile;?>
          </div>

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
<?php
  include_once('footer.php');
?>

<!-- ............................START POPUP............................................. -->

<div class="modal" id="addCategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <form action="addCategorie_code.php" method="post">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Supprimer Categorie</h4>
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

<!-- ........................................END POPUP............................................. -->
