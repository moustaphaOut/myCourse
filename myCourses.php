<!--
Into this file, we write a code for display user information.
-->

<?php
include_once('link.php');
session_start();
include_once('header1.php');
require_once('connection.php');

?>
<div class="jumbotron">
    <center>
        <h1>Mes Cours</h1>
    </center>
</div>
<ul class="products">
        <?php
            $sql = "SELECT * FROM cours where emailProfesseur = '".$_SESSION['emailUser']."';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $nameCours = $row["nomCours"];
                    $imageCours = $row["dossierImage"];
                    ?>
                    <li>
                            <h4><?php echo $nameCours ?></h4>
                            <a href="CourseTeacher.php?listSelected=cours&CoursSelected=<?php echo $row["idCours"];?>">
                                <img src="<?php echo $imageCours; ?>" style="height: 150px; width: 150px;" >
                            </a>
                    </li>
                    <?php
                }
            }
        ?>
        