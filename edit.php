<?php
require('config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-3">
  <a href="manage.php"><button class="btn btn-dark text-white">Go Back</button></a>
    <!-- For fetching data using id sent throught get method -->
    <?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $select = "SELECT * FROM task WHERE id =$id";
        $select_result= mysqli_query($conn,$select);
        $fetch_data = mysqli_fetch_assoc($select_result);
        $fetch_title = $fetch_data['title'];
        $fetch_description = $fetch_data['description'];
    }
    ?>
    <!-- For update data -->
    <?php
    if(isset($_POST['update'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        if($title !="" && $description !=""){
            $update = "UPDATE task SET title = '$title',description = '$description' WHERE id = '$id'";
            $update_result = mysqli_query($conn,$update);
           if($update_result){
            ?><div class="alert alert-info" role="alert">
            <h4 class="alert-heading text-center">Task updated successfully</h4>
          </div>
            <?php
           }
           else{
            ?><div class="alert alert-danger" role="alert">
            <h4 class="alert-heading text-center">Error while updating task</h4>
          </div>
            <?php
           }
        }
        else{
            ?><div class="alert alert-danger" role="alert">
            <h4 class="alert-heading text-center">Please retry!!</h4>
          </div>
            <?php
        }
    }
    ?>
      <form action="#" method="POST">
        <div class="form bg-light p-5">
            <h1 class="text-danger text-center">Task Management System</h1>
            <div class="mb-3 mt-3">
                <label for="task">Task Title</label>
                <input type="text" value="<?php echo $fetch_title;?>" class="form-control" id="title" placeholder="Enter task name" name="title">
            </div>
            <div class="mb-3">
                <label for="description">Task Description:</label>
                <input type="text" value="<?php echo $fetch_description;?>" class="form-control" id="des" placeholder="Enter taks description" name="description">
            </div>
            <button type="submit" class="btn btn-danger" name="update" >Update</button>
        </div>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>