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
   <div class="container-fluid bg-light mt-5 py-5">
    <h1 class="text-center text-primary">User DashBoard</h1>
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
   <div class="row py-5">
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card text-center bg-light">
            <img class="card-img-top m-auto" src="./assests/uploads/user.png" alt="Card image cap" style="width:150px;height:150px">
            <div class="card-body">
                <h2 class="card-title"><?php echo $_SESSION['name']?></h2>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
    <a href="createtask.php" style="float:right"><button class="btn btn-primary btn-lg">Add Task</button></a>
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
                $uid = $_SESSION['id'];
                $query = "SELECT * FROM task WHERE userid= $uid";
                $query_result = mysqli_query($conn,$query);
                $count = mysqli_num_rows($query_result);
                if($count == 1){
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
                }
                ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>