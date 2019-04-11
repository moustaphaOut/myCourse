<?php
//Here, we write code for registration.

require_once('connection.php');
$fname = $lname = $gender = $email = $password = '';
$user = $_POST['user'];
$User = ucfirst($user);
$fname = htmlentities($_POST['firstname']);
$lname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = md5($_POST['password']);
//echo "Password {$password}";
$birthDay = $_POST['birthDay'];
//$profession = $_POST['profession'];
$dateLogin = date('Y-m-d H:i:s');
$dateLastLogin = date('Y-m-d H:i:s');

$sql = "INSERT INTO ".$user." (prenom".$User.",nom".$User.",sexe".$User.",email".$User.",password".$User.",dateNaissance".$User.",dateLogin,dateLastLogin) VALUES ('$fname','$lname','$gender','$email','$password','$birthDay','$dateLogin','$dateLastLogin')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: login.php");
}
else
{
	echo "Error :".$sql;
}