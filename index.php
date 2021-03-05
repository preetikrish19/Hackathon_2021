<?php
session_start();
include('db.php');

  $sql = "SELECT * FROM `images`";
  $result =$con->query($sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Photo display</title>
  </head>
  <body>


    <h2 style="color: white">Images: </h2>
    <div class="header text-center">
      <?php
      if(isset($_SESSION['username'])){
          echo "<div class='bg-white text-center'>HELLO ". $_SESSION['username']."</div>";
          ?>
          <a type="button" class="btn btn-success submit" href="logout.php" >Logout</a>
          <?php
      }else{
          ?>
          <a type="button" class="btn btn-success submit" href="login.php" >Login</a>
          <?php
      }
      ?>

      <a type="button" class="btn btn-primary submit" href="photo_upload.php">Add a picture</a>
        <a type="button" class="btn btn-danger submit" href="credit_card.html">Credit card GUI</a>
  </div>
    <div class="container">
    <?php
    while( $details = $result->fetch_assoc()){
        ?>
		<img src="uploads/<?php echo $details['name']; ?>">
        <?php
    }?>
	  </div>


  </body>
</html>
