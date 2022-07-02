<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
      <?php
      if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        if($title !="" && $description !="")
        {
          $query = "INSERT INTO task(title,description) VALUES('$title','$description')";
          $query_result = mysqli_query($conn,$query);
          if($query_result){
            ?>
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading text-center">Task added successfully</h4>
            </div>
            <?php
            echo header('Location:createtask.php?msg=createsuccess');
          }
          else{
            ?>
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading text-center">Task couldn't be added</h4>
            </div>
            <?php
          }
        }
        else{
          ?>
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading text-center">Please fill all the fields</h4>
            </div>
          <?php
        }
      }
      ?>
      <form action="#" method="POST">
      <div class="form bg-light p-5">
        <h1 class="text-primary text-center">Task Management System</h1>
          <div class="mb-3 mt-3">
            <label for="task">Task Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter task name" name="title">
          </div>
          <div class="mb-3">
            <label for="description">Task Description:</label>
            <input type="text" class="form-control" id="des" placeholder="Enter taks description" name="description">
          </div>
          <a href="<?php if(isset($_GET['msg'])){
            $message = $_GET['msg'];
            if($message == "createsuccess"){
              ?>manage.php<?php
            }
            else{
              ?>create.php<?php
            }
            }?>"><button type="submit" class="btn btn-primary btn-lg px-4 mt-3" name="submit" >Submit</button></a>
      </div>
    </form>
</div>
</body>
</html>