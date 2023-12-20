<?php include("header.php"); ?>
<?php include("connection.php"); ?>

    <?php 

    if(isset($_GET["id"])) {


        $id = $_GET["id"];
    
        $query = "select * from `students` where `id` = '$id'";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Error". mysqli_error($conn));
        }
        else{
            $row = mysqli_fetch_assoc($result);

            // print_r($row);
        }
    }
    ?>


<?php

        if(isset($_POST["update_students"])){

            if(isset( $_GET["id_new"])){
                $idnew = $_GET["id_new"];
            }

            $fname = $_POST["f_name"];
            $lname = $_POST["l_name"];


            $query = "update `students` set `first_name` = '$fname', `last_name` = '$lname' where `id` = '$idnew'";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("Error". mysqli_error($conn));
            }
            else{
                header('location:index.php?update_message=You have updated');
            }
        }

?>

            <form action="update.php?id_new=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="f_name">Firstname</label>
                <input type="text" name="f_name"class="form-control" value="<?php echo $row["first_name"]; ?>">
            </div>
            <div class="form-group">
                <label for="l_name">Lastname</label>
                <input type="text" name="l_name"class="form-control" value="<?php echo $row["last_name"]; ?>">
            </div><br>

            <input type="submit" class="btn btn-success" name="update_students" value="Update">

            </form>



<?php include("footer.php"); ?>
