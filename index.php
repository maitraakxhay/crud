<?php include("header.php"); ?>
<?php include("connection.php"); ?>

<div class="box1">
<h2>Students List</h2>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Students
</button>
</div>

<table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    <?php

        $query = "select * from students";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Error". mysqli_error($conn));
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
                ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>

                <?php
            }
        }   
     ?>

        </tbody>
    </table>

    <?php
        if(isset($_GET['message'])){
            echo "<h6>".$_GET["message"]."</h6>";
        }
        if(isset($_GET['msg'])){
            echo "<h6>".$_GET["msg"]."</h6>";
        }
        if(isset($_GET['update_message'])){
            echo "<h6>".$_GET["update_message"]."</h6>";
        }
        if(isset($_GET['delete_message'])){
            echo "<h6>".$_GET["delete_message"]."</h6>";
        }

 ?>

<!-- Modal -->
<form action="insert_data.php" method="post">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="f_name">Firstname</label>
                <input type="text" name="f_name"class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">Lastname</label>
                <input type="text" name="l_name"class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<?php include("footer.php"); ?>
