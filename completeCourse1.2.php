<!--
Into this file, we write a code for display user information.
-->

<?php
include_once('link.php');
include_once('header1.php');
?>
<?php require_once 'process.php'; ?>
<?php if (isset($_SESSION['message'])): ?>
  <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?> 
  </div>
<?php endif ?>
<div class="container">
<?php
  include_once('connection.php');
  $sql = "SELECT * FROM etudiant";
  $result = mysqli_query($conn, $sql);

  //pre_r($result)
?>
<div class="row justify-content-center">
    <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()):?>
          <tr>
            <td><?php echo $row['nomEtudiant'];?></td>
            <td><?php echo $row['prenomEtudiant'];?></td>
            <td>
              <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn_info">Edit</a>
              <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn_danger">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      
    </table>
</div>
<?php
  /*fonction pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '<pre>';
  }*/
?>
<div class="row justify-content-center">
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?php echo $namChaptire;?>">
    </div>
    <div class="form-group">
      <label>Location</label>
      <input type="text" name="location" class="form-control" placeholder="Enter your location" value="<?php echo $descriptionChapitre;?>">
    </div>
    <div class="form-group">
      <?php if ($update == true): ?>
        <button type="submit" name="update" class="btn btn_info">Save</button>
      <?php else: ?>
        <button type="submit" name="save" class="btn btn_primary">Save</button>
      <?php endif ?>
      
    </div>
    
  </form>

</div>
</div>