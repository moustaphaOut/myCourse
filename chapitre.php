<?php
  require_once('MyFonctions.php');

            $typeSelected = ucfirst($listSelected);//Chapitre,Exercice,Correction
            $courseItems = array(0 => "cours", 1 => "chapitre", 2 => "exercice", 3 => "correction");
            $CourseItems = array(0 => "Cours", 1 => "Chapitre", 2 => "Exercice", 3 => "Correction");
            $courseItemsByName = array("cours"=> 0, "chapitre" => 1,"exercice" => 2, "correction" => 3);

   // echo $courseItems[$courseItemsByName["chapitre"]-1];
  ?>
  <div class="float-xl-right">
    <a class="btn btn-success glyphicon glyphicon-plus" href="CourseTeacher.php?listSelected=<?php echo $listSelected;?>&CoursSelected=<?php echo $CoursSelected;?>&add=yes"> Add</a>
  </div>
  <div>
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <!--<th scope="col">Id</th>-->
            <th scope="col">Nom de <?php echo $typeSelected;?></th>
            <th scope="col">Description</th>
            <th scope="col">Lien vers</th>
            <th scope="col">Support</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if( $listSelected == $courseItems[1]){
              $sql = "SELECT * FROM ".$listSelected." WHERE idcours = ".$CoursSelected;
              //$sql2 = "SELECT nomCours FROM cours WHERE idCours = 74";
            }else if($listSelected == $courseItems[2]){
              $sql = "SELECT * FROM ".$listSelected." INNER JOIN ".$courseItems[1]." on (".$typeSelected.".id".$courseItems[1]." = ".$courseItems[1].".id".$courseItems[1].") where idCours = ".$CoursSelected;
              //$sql2 = "SELECT nomChapitre FROM chapitre WHERE idChapitre = ..";
            }else if ($listSelected == $courseItems[3]){
               $sql = "SELECT * FROM ".$listSelected." INNER JOIN ".$courseItems[2]." on (".$typeSelected.".id".$courseItems[2]." = ".$courseItems[2].".id".$courseItems[2].") INNER JOIN ".$courseItems[1]." on (".$courseItems[2].".id".$courseItems[1]." = ".$courseItems[1].".id".$courseItems[1].") where idCours = ".$CoursSelected;
               //$sql2 = "SELECT nomExercice FROM exercice WHERE idExercice = ..";
            }
            //echo $sql;
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()):
              $idP2 = $row['id'.$typeSelected];
              $dossierImage = $row['dossier'.$typeSelected];
          ?>
          <tr>
            <!--<th scope="row"><?php //echo $idP2;?></th>-->
            <td><?php custom_echo($row['nom'.$typeSelected],30);?></td>
            <td><?php custom_echo($row['description'.$typeSelected],30);?></td>
            <?php 

              if( $listSelected == $courseItems[1]){
                $sql2 = "SELECT nomCours FROM cours WHERE idCours = ".$CoursSelected;
                $rowNeed = "Cours";
              }else if($listSelected == $courseItems[2]){
                 $sql2 = "SELECT nomChapitre FROM chapitre WHERE idChapitre = (select idchapitre from exercice where idExercice = ".$row['id'.$typeSelected].");";
                 $rowNeed = "Chapitre";
              }else if ($listSelected == $courseItems[3]){
                 $sql2 = "SELECT nomExercice FROM exercice WHERE idExercice = (select idExercice from correction where idCorrection = ".$row['id'.$typeSelected].");";
                 $rowNeed = "Exercice";
              }
              //echo $sql2;
              $idFK =$row['id'.$rowNeed];
              $result2 = mysqli_query($conn, $sql2);
              while ($row = $result2->fetch_assoc()):
            ?>
            <td><?php custom_echo($row['nom'.$rowNeed],30);?></td>
            <?php endwhile; ?>
            <td><?php custom_echo($dossierImage,30);?></td>
            <!--<td><?php //echo $row['typeSupportChapitre'];?></td>-->
            <td>
              <a class="btn btn-info" href="CourseTeacher.php?listSelected=<?php echo $listSelected;?>&CoursSelected=<?php echo $CoursSelected;?>&edit=<?php echo $idP2;?>" >Edit</a>
              <a class="btn btn-danger" href="CourseTeacher.php?listSelected=<?php echo $listSelected;?>&CoursSelected=<?php echo $CoursSelected;?>&delete=<?php echo $idP2;?>" >Delete</a>
            </td>
          </tr>    
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <?php if ($add == true): ?> 
    <div class="row justify-content-center">
      <form action="" method="POST" enctype="multipart/form-data">
          <br><h1>Ajouter <?php echo $typeSelected;?></h1><br>
        <input type="hidden" name="idP" value="<?php echo $idP;?>">
        <div class="form-group">
          <label>Nom de <?php echo $typeSelected;?></label>
          <input type="text" name="name" class="form-control" placeholder="" value="<?php echo $name;?>" required>
        </div>
        <div class="form-group">
          <label>Description</label>
          <input type="text" name="description" class="form-control" placeholder="" value="<?php echo $description;?>">
        </div>
        <div class="form-group">
          <label>Support</label>
          <input type="file" name="file" class="form-control" value="<?php echo $dossier;?>" required>
        </div>
        <div class="form-group">
            <label class="control-label">Lien vers:</label>
            <div class="form-group">
              <?php 
                // mysql select query
                  if( $listSelected == $courseItems[2])
                    $query = "SELECT * FROM chapitre where idCours = ".$CoursSelected;
                  else if($listSelected == $courseItems[3])
                    $query = "SELECT * FROM exercice join chapitre on (exercice.idChapitre = chapitre.idChapitre) where chapitre.idCours = ".$CoursSelected;
                  else
                    $query = "SELECT * FROM cours where idCours = ".$CoursSelected;//mybe u have to modift

                  //$courseItems[$courseItemsByName[$listSelected]-1]
                // for method 1
                  $result1 = mysqli_query($conn, $query);
              ?>
                <select class="form-control" name="idFK">
                    <?php while($row1 = mysqli_fetch_array($result1)):;
                      $idElement = $row1[0];
                      $nameElement = $row1[1];
                      $nameChapitree = '';
                      if($listSelected == $courseItems[3]){
                        $fkElement = $row1[5];
                        $sql = "SELECT nomChapitre FROM chapitre where idChapitre = '{$fkElement}' limit 1;";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $nameChapitree = '-'.$row["nomChapitre"];
                      }
                      ?>
                    <option value="<?php echo $idElement;?>"><?php echo $nameElement.$nameChapitree;?></option>
                    <?php endwhile;?>
                </select>
            </div>
        </div>
        <input type="hidden" name="idFKkk" value="<?php echo $idFK;?>">
        <div class="form-group">
          <?php if ($update == true): ?>
            <button type="submit" name="update" class="btn btn_info">Update</button>
          <?php else: ?>
            <button type="submit" name="save" class="btn btn_primary" value="<?php echo  $CoursSelected;?>">Ajouter</button>
          <?php endif ?>
        </div> 
      </form>
    </div>
    <?php endif ?>