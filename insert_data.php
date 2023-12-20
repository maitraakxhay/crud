<?php
include("connection.php");
if(isset($_POST["add_students"])){

    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];


    if($f_name == "" || $l_name == ""){
        header("location:index.php?message=You need to add details");
    }
    else{

        $query = "insert into `students` (`first_name`, `last_name`) values ('$f_name','$l_name')";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Error".mysqli_error($conn));
        }

        else{
            header("location:index.php?msg=Your Data Added");
        }

    }
}


?>