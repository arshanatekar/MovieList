<?php
require"connection.php";

if(isset($_POST['save'])){

    $stmt = $connect->prepare('insert into movies(moviename,rating,actorname,actoressname,directorname,moviedescription,releasedate)
    values(:moviename,:rating,:actorname,:actoressname,:directorname,:moviedescription,:releasedate)');

    $stmt->bindValue('moviename',$_POST['moviename']);
    $stmt->bindValue('rating',$_POST['rating']);
    $stmt->bindValue('actorname',$_POST['actorname']);
    $stmt->bindValue('actoressname',$_POST['actoressname']);
    $stmt->bindValue('directorname',$_POST['directorname']);
    $stmt->bindValue('moviedescription',$_POST['moviedescription']);
    $stmt->bindValue('releasedate',$_POST['releasedate']);

    $stmt->execute();
    header("location:index.php");

}

//delete code

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
$stmt = $connect->prepare('delete from movies where moviename = :moviename');
$stmt->bindValue('moviename',$_GET['moviename']);
$stmt->execute();
}

$stmt = $connect->prepare('select * from movies');
$stmt->execute();

?>


<DOCTYPE html>
<html>
    <head>
        <title>Movies</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
#movielist {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
  margin-left: auto;
  margin-right: auto;
}

#movielist td, #movielist th {
  border: 1px solid #ddd;
  padding: 8px;
  font-weight:600;
  font-size:16px;
  text-align:center;
}

#movielist tr:nth-child(even){background-color: #f2f2f2;}

#movielist tr:hover {background-color: #ddd;}

#movielist th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #e47066;
  color: white;
  font-weight:700;
  font-size:16px;
  text-align:center;
}
input[type=text], select {
  width: 200px;
  padding: 7px 7px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number], select {
    width: 200px;
  padding: 7px 7px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=date], select {
    width: 200px;
  padding: 7px 7px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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
.button {
  width: 20%;
  background-color:  #e47066;
  color: white;
  padding: 10px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left:15px;
}
.header {
    padding:5px;
  background: #e47066;
  color: white;
  font-size: 14px;
  text-align:left;
  padding-left:45px;
}

@media only screen and (max-width: 390px) {
  /* For tablets: */
  .column1 {
  float: center;
  width: 33.33%;
  padding: 15px;
}
}
@media only screen and (max-width: 1390px) {
 
.padding1{
padding-left:20px;

}
 
}
.textarea{
    width: 200px;
  padding: 7px 7px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
</head>

<body style="background-color:#edf2f7">

<div class="header" >
  <h1>Movies</h1>
  <p>Lets make list of your favourite movies.</p>
</div>
<div>
<div style="color:black;text-align:left;padding-left:45px;">
   <h2>Add Movie</h2>
    </div>

    <div style="text-align:left;padding-left:30px;">
    <form method="post" autocomplete="off">
    <div class="row column1" >
    <div class="column">
        <label >Movie Name:</label>
        <input type="text" id="moviename" name="moviename" required/>
        </div>
        <div class="column padding1">
        <label for="number">Rating:</label>
        <input type="number" id="rating" name="rating" required/>
        </div>
        <div class="column">
        <label>Actor Name:</label>
        <input type="text" id="actorname" name="actorname" required/>
        </div>
        <div class="column padding1">
        <label>Actoress Name:</label>
        <input type="text" id="actoressname" name="actoressname" required/>
        </div>
        <div class="column">
        <label>Director Name</label>
        <input type="text" id="directorname" name="directorname" required/>
        </div>
        <div class="column padding1" >
        <label>Movie description:</label>
        <textarea type="text" class="textarea" id="moviedescription" name="moviedescription" required></textarea>
        </div>
        <div class="column">
        <label>Release date:</label>
        <input type="date" id="releasedate" name="releasedate" required/>
        </div>
     
</div>
<div>
<button class="button" type="submit" name="save" value="Save">Add</button>
</div>
    </form>
    </div>

</div>
<div style="color:black;text-align:center">
   <h1> List Of Movies</h1>
    </div>

<div style="padding-bottom:20px;">
    <table cellspacing="2" cellpadding="2" id="movielist">
        <tr>
<th>Movie Name</th>
<th>Rating</th>
<th>Action</th>
        </tr>
        <?php 
        while($movies = $stmt->fetch(PDO::FETCH_OBJ)){?>
        <tr>
            <td><?php echo $movies->moviename; ?></td>
            <td><?php echo $movies->rating; ?></td>
           
            <td>
                <a style="color:black" onclick="" href="index.php?moviename=<?php echo $movies->moviename?>&action=delete"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
                <a tyle="color:black" href="view.php?moviename=<?php echo $movies->moviename ?>"><i class="fa fa-eye" style="color:black;font-size:24px"></i></a>
            </td>
        </tr>
        <?php }?>
</table>
</div>
</body>
    </html>