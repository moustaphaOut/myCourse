<!--
Here, we write code for addCourse1.2.
-->
<?php
	require_once('connection.php');
	session_start();

	$sql = "INSERT INTO cours (nomCours,descriptionCours,volumeHoraire,dossierImage) VALUES ('".$_SESSION['nameCourse']."','".$_SESSION['descriptionCours']."','".$_SESSION['CoursHours']."','".$_SESSION['imageCours']."')";
	$result = mysqli_query($conn, $sql);
	if($result){
		#---------- Start uploading file ----------
		//if(isset($_POST['submit'])){
			
			$file = $_FILES['fileRessource'];
			//print_r($file);
			$fileName = $_FILES['fileRessource']['name'];
			$fileTmpName = $_FILES['fileRessource']['tmp_name'];
			$fileSize = $_FILES['fileRessource']['size'];
			$fileError = $_FILES['fileRessource']['error'];
			$fileType = $_FILES['fileRessource']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg','jpeg','png', 'pdf', 'PDF','MP4');

			if(in_array($fileActualExt, $allowed)){
				if($fileError === 0){
					if($fileSize < 100000000){
						$fileNewName = uniqid(reset($fileExt), true).".".$fileActualExt;
						$fileDestination = 'uploads/'.$fileNewName;
						move_uploaded_file($fileTmpName, $fileDestination);
						$fileRessource = $fileDestination;
						//header("Location: welcome.php?uploadsuccess");
					}else{
						echo "Your file is too big!";
					}
				}else{
					echo "There was an error uploading your file!";
				}
			}else{
				echo "You cannot upload files of this type!";
			}
		//}
		#---------- End uploading file ---------- https://www.youtube.com/watch?v=JaRq73y5MJk
		$typeAdd = $_POST['typeAdd'];
		$nameAdd = $_POST['nameAdd'];
		$descriptionAdd = $_POST['descriptionAdd'];
		$typeSource = $_POST['typeSource'];
		$sql = "INSERT INTO chapitre (nomChapitre,descriptionChapitre,dossierChapitre,typeSupportChapitre,idCours) VALUES ('".$nameAdd."','".$descriptionAdd."','".$fileRessource."','".$typeSource."',(SELECT idCours FROM cours WHERE nomCours = '".$_SESSION['nameCourse']."' limit 1))";
		$result2 = mysqli_query($conn, $sql);
		if($result2){
			header("Location: myCourses.php");
		}else{
			echo "Error :".$sql;
		}
	}else{
		echo "Error :".$sql;
	}
?>
