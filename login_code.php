<?php
//Here, we write code for login.
session_start();
require_once('connection.php');
$email = $password = '';

$email = $_POST['email'];
$password =md5($_POST['password']);
//$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$user = "Professeur";
$sql = "SELECT * FROM {$user} WHERE emailProfesseur='{$email}' AND passwordProfesseur='{$password}';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(mysqli_num_rows($result)>0){
	$_SESSION['emailUser'] = $email;
	$_SESSION['user'] = $user;
	header("Location: welcome.php");//send email ro welcome 

}else{
	$user = "Etudiant";
	$sql2 = "SELECT * FROM {$user} WHERE emailEtudiant='{$email}'AND passwordEtudiant='{$password}';";// AND passwordEtudiant='{$password}'
	$result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

	if(mysqli_num_rows($result2)>0){
		$_SESSION['emailUser'] = $email;
		$_SESSION['user'] = $user;
		echo $_SESSION['user'];
		header("Location: welcome.php");

	}else{
		header("Location: Login.php?failed=Invalid email or password");
	}
}