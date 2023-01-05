<?php
require"connection.php";

$stmt=$connect->prepare('select * from movies where moviename = :moviename');
$stmt->bindValue('moviename',$_GET['moviename']);
$stmt->execute();
$movies = $stmt->fetch(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            View Details
        </title>
        <style>
            .header {
  padding: 5px;
  text-align: left;
  background: #e47066;
  color: white;
  font-size: 14px;
}
.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;

}
            </style>
    </head>
    <body>
    <div class="header">
  <h1>Movie Details</h1>
</div>
<div class="row">
<div class="column">
        <label style="font-size:16px;font-weight:700;">Movie Name:</label>
        <text><?php echo $movies->moviename; ?></text>
        </div>
        <div class="column">
        <label style="font-size:16px;font-weight:700;">Rating:</label>
        <text><?php echo $movies->rating; ?></text>
        </div>
        <div class="column">
        <label style="font-size:16px;font-weight:700;">Actor Name:</label>
        <text><?php echo $movies->actorname; ?></text>
        </div>
        <div class="column">
        <label style="font-size:16px;font-weight:700;">Actoress Name:</label>
        <text><?php echo $movies->actoressname; ?></text>
        </div>
        <div class="column">
        <label style="font-size:16px;font-weight:700;">Director Name:</label>
        <text><?php echo $movies->directorname; ?></text>
        </div>
        <div class="column">
        <label style="font-size:16px;font-weight:700;">Movie description:</label>
        <text><?php echo $movies->moviedescription; ?></text>
        </div>
        <div class="column">
        <label style="font-size:16px;font-weight:700;">Release date:</label>
        <text><?php echo $movies->releasedate; ?></text>
        </div>
        
</div>

</body>
    </html>