<?php
//Here, we write code for addCourse1.2.

	session_start();
	require_once('connection.php');
	#---------- Start uploading file ----------
	if(isset($_POST['submit'])){
		$listSelected = "Cours";
		include_once("uploadFile.php");
        $imageCours = $fileDestination;
	}
	#---------- End uploading file ----------

	$nameCourse = $_POST['nameCourse'];
	$descriptionCours = $_POST['descriptionCours'];
	$CoursHours = $_POST['CoursHours'];
	$idCategorie = $_POST['categorieCours'];
	$langueCours = $_POST['langueCours'];
	$dateLancement = date('Y-m-d H:i:s');

	$sql = "INSERT INTO cours (nomCours, descriptionCours, volumeHoraire, langueCours, dossierImage, emailProfesseur, dateLancement, idCategorie, publier) VALUES ('{$nameCourse}', '{$descriptionCours}', '{$CoursHours}', '{$langueCours}', '{$imageCours}', '{$_SESSION['emailUser']}', '{$dateLancement}', '{$idCategorie}','false')";

	$result = mysqli_query($conn, $sql);
	if($result){
		$sql2 = "SELECT idCours FROM cours where nomCours = '{$nameCourse}';";
            $result2 = mysqli_query($conn, $sql2);
            $data=mysqli_fetch_assoc($result2);
            $idCours = $data['idCours'];
		header("Location: CourseTeacher.php?listSelected=cours&CoursSelected={$idCours}");
	}else{
		echo "Error :".$sql;
	}


?>
