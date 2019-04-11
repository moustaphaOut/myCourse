<!--
this is second header file which is visible after login.
-->

<?php
include_once('link.php');

?>
<nav class="navbar navbar-dark bg-dark">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="welcome.php" class="navbar-brand mb-100 h1"><img id="tt" src="img/logo3.PNG"></a>
			<a href="welcome.php" class="navbar-brand h1">Accueil</a>
      <?php if($_SESSION['user'] == "Professeur"):?>
      <a href="addCourse1.2.php" class="navbar-brand h1">Ajouter un cours</a>
      <a href="myCourses.php" class="navbar-brand h1">Mes cours</a>
      <?php endif;?>
      <a href="completeCourse1.2.php" class="navbar-brand h1"></a>
		</div>
		<div class="dropdown navbar-right" id="right">
  <button class="btn btn-primary" type="button" data-toggle="dropdown"><?php echo $_SESSION['emailUser'];?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  	<li><a href="account.php">Profile</a></li>
    <li><a href="logout.php">Déconnecter</a></li>
  </ul>
</div>
	</div>
</nav>