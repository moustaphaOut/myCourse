<link rel="stylesheet" type="text/css" href="css/courseDisplay.css">
<?php
//Into this file, we write a code for display user information.
session_start();
include_once('connection.php');
include_once('link.php');
include_once('header1.php');
$endCourse = true;
if(!empty($_GET['CoursSelected']))
	$CoursSelected = $_GET['CoursSelected'];
$studentSelected = '';
$currentId = '';
if(!empty($_GET['currentId']))
	$currentId = $_GET['currentId'];
if(!empty($_GET['listSelected']))
	$listSelected = $_GET['listSelected'];

if($_SESSION['user'] == "Etudiant"){
	$sql = "INSERT INTO coursetudiant (idCours, emailEtudiant) VALUES ('$CoursSelected','{$_SESSION['emailUser']}')";
	$result = mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM cours where idCours = '{$CoursSelected}';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$nameCours = $row["nomCours"];

?>
<div class="">
	<h1 class="my-4"><?php echo $nameCours;?></h1>
	<div class="tree well">
		<h5>Sommaire:</h5>
	    <ul>
	    	<li>
	    	<span><i class="icon-folder-open"></i> <?php echo $nameCours;?></span>
	    	<ul>
	       	<?php 
				$sql = "SELECT * FROM chapitre where idCours = {$CoursSelected};";
				$result = mysqli_query($conn, $sql);
				while ($row = $result->fetch_assoc()):
					$idChapitre = $row["idChapitre"];
					$nameChapitre = $row["nomChapitre"]; 
			?>
	        <li>
	            <span><i class="icon-folder-open"></i> <?php echo $nameChapitre;?></span> <a href="courseDisplay.php?CoursSelected=<?php echo $CoursSelected;?>&currentId=<?php echo $idChapitre;?>&listSelected=Chapitre">Voir ce chapitre</a>
	            <ul>
	                <?php 
						$sql2 = "SELECT * FROM exercice where idChapitre = '{$idChapitre}';";
						$result2 = mysqli_query($conn, $sql2);
						while ($row2 = $result2->fetch_assoc()):
							$idExercice = $row2["idExercice"];
							$nameExercice = $row2["nomExercice"]; 
					?>
	                <li>
	                	<span><i class="icon-minus-sign"></i> <?php echo $nameExercice;?></span> <a href="courseDisplay.php?CoursSelected=<?php echo $CoursSelected;?>&currentId=<?php echo $idExercice;?>&listSelected=Exercice">Voir ce exercice</a>
	                    <ul>
	                        <?php 
								$sql3 = "SELECT * FROM correction where idExercice = '{$idExercice}';";
								$result3 = mysqli_query($conn, $sql3);
								while ($row3 = $result3->fetch_assoc()):
									$idCorrection = $row3["idCorrection"]; 
									$nameCorrection = $row3["nomCorrection"]; 
							?>
	                        <li>
		                        <span><i class="icon-leaf"></i> <?php echo $nameCorrection;?></span> <a href="courseDisplay.php?CoursSelected=<?php echo $CoursSelected;?>&currentId=<?php echo $idCorrection;?>&listSelected=Correction">voir cette correction</a>
	                        </li>
		                    <?php endwhile; ?>

	                    </ul>
	                </li>
	                <?php endwhile; ?>
	            </ul>
	        </li>
	  		<?php endwhile; ?>
	  		</ul>
	  		</li>
	    </ul>
	</div>
	<script>
		$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});	
	</script>

</div>
<div class="col-lg-2">
  <div class="list-group">
  	<h3><?php echo $listSelected;?></h3>
  	<?php
		$CourseItems = array(0 => "Cours", 1 => "Chapitre", 2 => "Exercice", 3 => "Correction");
        $courseItemsByName = array("Cours"=> 0, "Chapitre" => 1,"Exercice" => 2, "Correction" => 3);
        if($listSelected == "Correction")
	        $listSelected_1 = $listSelected;
	    else
        	$listSelected_1= $CourseItems[$courseItemsByName[$listSelected]+1];

		$sql22 = "SELECT * FROM {$listSelected_1} where id{$listSelected} = '{$currentId}';";
		//echo $sql22;
		$result22 = mysqli_query($conn, $sql22);
		while ($row22 = $result22->fetch_assoc()):
			$idElement = $row22['id'.$listSelected_1];
			$nameElement = $row22['nom'.$listSelected_1]; 
	?>
    <a href="courseDisplay.php?CoursSelected=<?php echo $CoursSelected;?>&currentId=<?php echo $idElement;?>&listSelected=<?php echo $listSelected_1;?>" class="list-group-item"><?php echo $nameElement;?></a>
	<?php endwhile; ?>

  </div>
</div>
<div class="col2">
	<?php
		if(!$currentId){
			$sql = "SELECT idChapitre FROM chapitre where idCours = '{$CoursSelected}' LIMIT 1;";
	    	$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$idChapitre = $row['idChapitre'];
    		$sql3 = "SELECT * FROM chapitre where idChapitre = '{$idChapitre}';";
		}else{
    		$sql3 = "SELECT * FROM {$listSelected} where id{$listSelected} = '{$currentId}';";
		}
		
    	$result3 = mysqli_query($conn, $sql3) or die("<h1>Félicitation vous avez finis le cours</h1>");
    	$row3 = mysqli_fetch_array($result3);
    	if(mysqli_num_rows($result3)>0){
	        $row = mysqli_fetch_array($result3);
	        $currentId = $row3['id'.$listSelected];
	        $nomChapitre = $row3['nom'.$listSelected];
	        $descriptionChapitre = $row3['description'.$listSelected];
			$dossierChapitre = '';
			$dossierChapitre= $row3['dossier'.$listSelected];
			$typeSupport = $row3['typeSupport'.$listSelected];
			$endCourse = false;
		}
	?>
	<?php if (!$endCourse): ?> 
	<h3><?php echo $nomChapitre;?></h3>
	<p class="text-muted"><?php echo $descriptionChapitre;?></p>
	<?php if($typeSupport == "mp4"):?>
		<video class="video-js vjs-default-skin" controls data-setup="{}" preload="auto" width="100%" height="450" poster="my_video_poster.png">
  		<source src="<?php echo $dossierChapitre;?>" type='video/mp4'>
		</video>
	<?php else:?>


		<embed src="<?php echo $dossierChapitre;?>" style="background:#063;padding:10px;width:80%;height:80%;margin:15px auto;"/>
	<?php endif;?>

		<div class="text-center">
		<?php 
			if($listSelected == "Chapitre"){
				$sql9 = "SELECT idChapitre FROM chapitre where idCours = {$CoursSelected} AND idChapitre > {$currentId} ORDER BY idChapitre ASC LIMIT 1;";
				$result9 = mysqli_query($conn, $sql9);
				$row9 = mysqli_fetch_array($result9);
				$nextId  = $row9['idChapitre'];
				$sql99 = "SELECT idChapitre FROM chapitre where idCours = {$CoursSelected} AND idChapitre < {$currentId} ORDER BY idChapitre DESC LIMIT 1;";
				$result99 = mysqli_query($conn, $sql99);
				$row99 = mysqli_fetch_array($result99);
				$previousId  = $row99['idChapitre'];
			}else{
				$sql9 = "SELECT idChapitre FROM chapitre where idCours = '{$CoursSelected}' ORDER BY idChapitre ASC LIMIT 1;";
				$result9 = mysqli_query($conn, $sql9);
				$row9 = mysqli_fetch_array($result9);
				$nextId  = $row9['idChapitre'];
				$previousId = $row9['idChapitre'];
			}


		?>
		<br>
		<a class="btn btn-dark btn-lg" href="Course.php?CoursSelected=<?php echo $CoursSelected;?>">Revenir</a>
		<a class="btn btn-success btn-lg" href="courseDisplay.php?CoursSelected=<?php echo $CoursSelected;?>&currentId=<?php echo $previousId;?>&listSelected=Chapitre">Precedent</a></button>
		<a class="btn btn-success btn-lg" href="courseDisplay.php?CoursSelected=<?php echo $CoursSelected;?>&currentId=<?php echo $nextId;?>&listSelected=Chapitre">Suivant</a>
	</div>
	<?php endif ?>
  <!--<div id='box'>
    	
        <video id="my_video_1" class="video-js vjs-default-skin" controls data-setup="{}" preload="auto" width="100%" height="450" poster="my_video_poster.png">
        
  		<source src="<?php// echo $video;?>" type='video/mp4'>
		</video>

		<script type="text/javascript">
          function myScript() {
            console.log;
          }
        </script>
        <div id='back'>
        <a href="index.php">Back</a>
        </div>
	</div>-->
  
</div>
<br>