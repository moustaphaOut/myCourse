<!--
Into this file, we create a layout for login page.
-->
<?php
include_once('link.php');
include_once('header.php');
if(!empty($_GET['failed']))
  echo "<script type='text/javascript'>alert('Invalid email or password!');</script>"; 

?>

<div id="frmRegistration">
<form class="form-horizontal" method="POST" action="login_code.php">
	<h1>Connectez-vous !</h1>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Mote de passe:</label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="login" class="btn btn-primary btn-lg">Se connecter</button>
    </div>
  </div>
</form>
</div>