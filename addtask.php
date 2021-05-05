<?php

  // Include database file
  include 'taskFunction.php';

  $toDolistobj = new toDolist();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $toDolistobj->insertData($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD to do list</title>
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
.card {
background-color: rgba(0, 0, 0, 0.90); /* Transparent Yellow */
border-radius: 1rem;
}
.form-group input{
  border: 0;
 
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.60);
}
hr.hr1{
  border: 2px solid blue;

}
hr.hr2{
  border: 2px solid #ff0066;
 
}
div h5{
  color:black;
}
</style>
</head>
<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="displaytask.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trashcan.php">Trash</a>
      </li>
      
    </ul>

    <div class="mx-auto">
	  	
	</div>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="card bg-image card shadow-1-strong"style="background-image: url('./bg.jpg')   width: 18rem;">
        <div class="card-body text-light">
              <div class=" text-center" style="padding:10px;">
                <h5>Disorganized thoughts and actions ? <br><br>put all your task here!</h5>
                <hr class="hr1">
            </div>
              <form action="addtask.php" method="POST">
                <div class="form-group">
                  <label for="task">Enter your task:</label>
                  <input type="text" class="form-control" name="task" placeholder="Enter task" required="">
                </div><br>
                <hr class="hr2">
                <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
              </form>
            </div>
      </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
