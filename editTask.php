<?php

// Include database file
include 'taskFunction.php';

$toDolistObj = new toDolist();

// Edit customer record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $task = $toDolistObj->displyaRecordById($editId);
}

// Update Record in customer table
if (isset($_POST['update'])) {
    $toDolistObj->updateRecord($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP CRUD:</title>
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
        h4.title{
            color:#cc0099;
        }
        h4.title1{
            color:#0000ff;
        }
        .card {
        background-color: rgba(0, 0, 0, 0.20); /* Transparent Yellow */
        border-radius: 1rem;
        }
        .form-group input{
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.50);
        }
        .form-group label{
            color:black;
        }
        hr.hr1{
        border: 2px solid blue;
       
        }
        hr.hr2{
        border: 2px solid #ff0066;
       
        }
</style>
</head>
<body>

<div class="container-fluid mb-5">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    

    <div class="mx-auto">
   
 
 
	</div>
    
    
  </div>
</nav>
</div>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card bg-image card shadow-1-strong"
        style="background-image: url('./bg.jpg')   width: 25rem;">
        <div class="card-body text-light">
                <div class="container">
                    <form action="editTask.php" method="POST">
                        <div class="form-group">
                        <label for="etask">Task:</label>
                        <input type="text" class="form-control" name="etask" value="<?php echo $task['task']; ?>" required="">
                        </div>
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                        <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
