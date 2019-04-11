<!--
Here, we write code for addCourse1.2.
-->
<?php
	
	require_once('connection.php');
	$nomCategorie = $_POST['nameCategorie'];
	$descriptionCategorie = $_POST['descriptionCategorie'];

	$sql = "INSERT INTO categorie (nomCategorie, descriptionCategorie) VALUES ('$nomCategorie','$descriptionCategorie')";
	$result = mysqli_query($conn, $sql);
	if($result){
		header("Location: addCourse1.2.php?add=done");
	}else{
		echo "Error :".$sql;
	}


?>
