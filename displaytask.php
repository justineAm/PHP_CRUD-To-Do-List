<?php
  
  // Include functionalities file
  include 'taskFunction.php';

  $toDolistObj = new toDolist();

  // Delete record from table
  
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']) ) {
      
      $deleteId = $_GET['deleteId'];
      
      $taskresult = $toDolistObj->displayData();  
      foreach ($taskresult as $task) {
        $trashtask = $task['task'];
        $toDolistObj->deleteRecord($deleteId,$trashtask);
      }  
      
      
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
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trashcan.php">Trash</a>
      </li>
      
    </ul>

    <div class="mx-auto">
   
  <h2>My to-do-list</h2>
 
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
  <h2 ><a href="addtask.php" class="btn btn-primary offset-3" style="float:right;margin-left:50px;">
  <i class="fa fa-plus" aria-hidden="true">&nbsp;</i>Add task</a>
    All records!
  </h2>
  
  
  <br>
  <table class="table table-hover table-striped">
    <thead class="thead-dark">
      <tr>
      
      
        <th>task</th>
        <th>Date Added</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
        <?php 
        
          $taskresult = $toDolistObj->displayData(); 
          foreach ($taskresult as $task) {
            
        ?>
        <tr>
          
         
          <td><input type="checkbox" class='box'>&nbsp;&nbsp;<?php echo $task['task']?></td>
          <td><?php echo $task['added_at'] ?></td>
          <td>
            <a href="editTask.php?editId=<?php echo $task['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
            
            <a href="displaytask.php?deleteId=<?php echo $task['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
            
            
          </td>
        </tr>
      <?php 
     
      
    } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

$('.box').change(function(){
  if (this.checked){
    $(this).parent().css("text-decoration","line-through");
  }else{
    $(this).parent().css("text-decoration","none");
  }
})

</script>


</body>
</html>