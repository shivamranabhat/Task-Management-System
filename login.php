<?php
require('config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid">
        <?php
        if(isset($_POST['login'])){
          $email = $_POST['email'];
          $password = $_POST['password'];
          if($email !="" && $password !=""){
            $query = "SELECT * FROM register WHERE email = '$email'AND password='$password'";
            $query_result = mysqli_query($conn,$query);
            $count = mysqli_num_rows($query_result);
            if($count==1){
              session_start();
              $fetch_data = mysqli_fetch_assoc($query_result);
              $_SESSION['name'] = $fetch_data['name'];
              $_SESSION['address'] = $fetch_data['address'];
              $_SESSION['email'] = $fetch_data['email'];
              $_SESSION['password'] = $fetch_data['password'];
              echo header('Location:manage.php?msg=loginsuccess');
            }
            else{
              ?><div class="alert alert-danger text-center" role="alert">
              <h4 class="alert-heading">Invalid username or password.</h4>
            </div>
            <?php
            }
          }
          else{
            ?><div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Please fill all the fields.</h4>
          </div>
          <?php
          }
        }
        ?>
        <form action="#" method="POST">
              <div class="form bg-light p-5 w-50 mx-auto mt-5">
                  <h1 class="text-primary text-center">Login</h1>
                  <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                  </div>
                  <div class="mb-3">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                  </div>
                  <a href="manage.php"><button type="submit" class="btn btn-primary btn-lg px-4 mt-3" name="login">Login</button></a>
              </div>
          </form>
          <div class="alert alert-success w-50 mx-auto" role="alert">
            <a href="register.php"><h5 class="alert-heading text-center">Don't have an account?Click here</h5></a>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>