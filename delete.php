<?php include("connection.php"); ?>


<?php

   if(isset($_GET['id'])){
        $id = $_GET['id'];
   

$query = "delete from `students` where `id` = '$id'";

$result = mysqli_query($conn, $query);

    if(!$result){
            die("Error".mysqli_error($conn));
    }
    else{
        header("location:index.php?delete_message=You have deleted record"  );
    }

   }
?>