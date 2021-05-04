<?php

class toDolist
{
    private $servername = "remotemysql.com";
    private $username = "aRDZcUfuOm";
    private $password = "LliVkBP8Ji";
    private $database = "aRDZcUfuOm";
    public $con;

    // Database Connection
    public function __construct()
    {

        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }

    // Insert customer data into customer table
    public function insertData($post)
    {
        $task = $this->con->real_escape_string($_POST['task']);
        
        $query = "INSERT INTO tasks(task) VALUES('$task')";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:displaytask.php?msg1=insert");
        } else {
            echo "Registration failed try again!";
        }
    }
    public function undoData($post)
    {
        $task = $this->con->real_escape_string($post);
        $query = "INSERT INTO tasks(task) VALUES('$task')";
        $sql = $this->con->query($query);
        $query1 = "DELETE FROM trashcan where task=$task";
        $sql1 = $this->con->query($query1);
        if ($sql == true) {
            header("Location:displaytask.php?msg1=insert");
        } else {
            echo "Something went wrong please try again!";
        }
    }

    // Fetch customer records for show listing
    public function displayData()
    {
        $query = "SELECT * FROM tasks";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } 
    }

    // Fetch single data for edit from customer table
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM tasks WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    // Update customer data into customer table
    public function updateRecord($postData)
    {
        $etask = $this->con->real_escape_string($_POST['etask']);
        $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE tasks SET task = '$etask' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                header("Location:displaytask.php?msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }

    }

    public function displayDeleteddata()
    {
        $query = "SELECT * FROM trashcan";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }


    // Delete customer data from customer table
    public function deleteRecord($id,$task)
    {
        
        $query1 = "INSERT into trashcan(task) select task from tasks where id=$id";
        $sql1 = $this->con->query($query1);
        $query = "DELETE FROM tasks WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:displaytask.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

    public function deleteTrashtask($id){

        $query = "DELETE FROM trashcan WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:trashcan.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }

    }

    // public function insertTotrash($task){
    //     echo "$task";

    //     $query = "SELECT * from tasks";
    //     $sql = $this->con->query($query);

    // }

    // public function login($post)
    // {
    //     $username = $_POST['username1'];
    //     $password = $_POST['password1'];
    //     $query = "SELECT * FROM customers WHERE email=? AND password=?'";
    //     $result = $this->con->query($query);
    //     if ($result->num_rows > 0) {
    //         $data = array();
    //         while ($row = $result->fetch_assoc()) {
    //             if($row['username']==$username){
    //                 echo "Welcome User";
    //             }else{
    //                 header('location:login.php');
    //             }
    //         }
            
    //     } else {
    //         echo "No found records";
    //     }
    // }
}
