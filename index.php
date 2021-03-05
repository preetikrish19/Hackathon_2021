<?php
include('db.php');
  //echo 'Host information: '.$mysqli->host_info;
  //echo '<br>';
  //echo 'Protocol version: '.$mysqli->protocol_version;
  $sql = "SELECT * FROM `images`";
  $result = mysqli_query($mysqli, $sql);
  $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //mysqli_free_result($result);
  //mysqli_close($mysqli);
  print_r($details);
//$conn=mysqli_connect('localhost','root','');
//mysqli_select_db($conn,'tuteeHUT');

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
    <div class="container">
    <?php foreach($details as $detail){ ?>
		<img src="ulpoads/<?php echo detail['image']; ?>">
    }?>
	  </div>


  </body>
</html>
