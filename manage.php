<?php
require('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <div class="container-fluid bg-light mt-5">
                <!-- for delete message -->
                <?php
             if(isset($_GET['msg'])){
              $delete_msg = $_GET['msg'];
              if($delete_msg =='deletesuccess'){
                ?>
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading text-center">Deleted successfully</h4>
                </div><?php
              }
            }
            ?>
            <!-- For login success message -->
            <?php
             if(isset($_GET['msg'])){
              $delete_msg = $_GET['msg'];
              if($delete_msg =='loginsuccess'){
                ?>
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading text-center">Login successfully</h4>
                </div><?php
              }
            }
            ?>
   <div class="row">
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card text-center bg-light">
            <img class="card-img-top m-auto" src="./assests/uploads/user.png" alt="Card image cap" style="width:150px;height:150px">
            <div class="card-body">
                <h2 class="card-title"><?php echo $_SESSION['name']?></h2>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
        <table class="table w-100">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Task Title</th>
                <th scope="col">Task Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM task";
                $query_result = mysqli_query($conn,$query);
                $i=0;
                while($task = mysqli_fetch_array($query_result)){
                  $i++;
                  ?>
                  <tr>
                  <th scope="row"><?php echo $i ?></th>
                  <td><?php echo $task['title']?></td>
                  <td><?php echo $task['description']?></td>
                  <td><a href="edit.php?id=<?php echo $task['id'];?>">
                  <button class="btn btn-primary mx-4">Edit</button>
                  </a>
                  <a href="delete.php?id=<?php echo $task['id'];?>">
                  <button class="btn btn-danger mx-4">Delete</button>
                  </a>
                </td>
                </tr><?php
                }
                ?>
            </tbody>
        </table>
    </div>
  </div>
  <div class="alert alert-primary text-center" role="alert"><a href="createtask.php"><button class="btn btn-primary btn-lg">Add Task</button></a></div>
</div>
</body>
</html>