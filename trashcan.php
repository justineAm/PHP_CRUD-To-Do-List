<?php
  
  // Include database file
  include 'taskFunction.php';

  $toDolistObj = new toDolist();

  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']) ) {
      
    $deleteId = $_GET['deleteId'];
    $toDolistObj->deleteTrashtask($deleteId);
  }


if(isset($_GET['undoTask'])) {
  $undoTask = $_GET['undoTask'];
  $taskresult = $toDolistObj->displayData();  
  $toDolistObj->undoData($undoTask);
}

     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>To Do List Using PHP </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
<style>
   body{
        background-image:url('./bg.jpg');
        background-repeat:no-repeat;
        background-size:cover;

        }
        table td{
          color:black;
        }
       
</style>
</head>
<body>

<div class="container-fluid">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link" href="displaytask.php">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="trashcan.php">Trash<span class="sr-only">(current)</span></a>
      </li>
      
    </ul>

    <div class="mx-auto">
   
  <h2>Deleted task records</h2>
 
	</div>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>


<div class="container mt-5">
<?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your task added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your task updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>

  <br>
  <table class="table table-hover table-striped">
    <thead class="thead-dark">
      <tr>
       
        <th>task</th>
        <th>Date added</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $taskresult = $toDolistObj->displayDeleteddata(); 
          foreach ($taskresult as $task) {
            if($task=='0'){
              echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              No found records!
            </div>";
            }
        ?>
        <tr>
         
          <td><?php echo $task['task'] ?></td>
          <td><?php echo $task['deleted_at'] ?></td>
          <td>
            <a href="trashcan.php?undoTask=<?php echo $task['task'] ?>" style="color:#39e600">
              <i class="fa fa-undo" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="trashcan.php?deleteId=<?php echo $task['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>