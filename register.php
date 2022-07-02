<?php
require('config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid mt-5">
      <?php
      if(isset($_POST['submit']))
      {
        $name = $_POST['name'];
        $address= $_POST['address'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        if($name != "" && $address != "" && $email != "" && $password != "")
        {
          $query = "INSERT INTO register(name,address,email,password) VALUES ('$name','$address','$email','$password')";
          $query_result = mysqli_query($conn,$query);
          if($query_result){
            ?><div class="alert alert-success" role="alert">
              <h4 class="alert-heading text-center">Register successfully</h4>
            </div>
            <?php
          }
          else{
            ?><div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Register failed.Please retry</h4>
          </div>
          <?php
          }
        }
        else{
          ?><div class="alert alert-danger text-center" role="alert">
          <h4 class="alert-heading">Please fill all the fields</h4>
        </div>
        <?php
        }
      }
      ?>
        <form action="#" method="POST">
            <div class="form bg-light p-5">
                <h1 class="text-primary text-center">Register</h1>
                <div class="mb-3 mt-3">
                    <label for="task">Name</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="description">Address</label>
                    <input type="address" class="form-control" name="address" id="" placeholder="Enter your address">
                </div>
                <div class="mb-3">
                    <label for="description">Email</label>
                    <input type="email" class="form-control" name="email" id="" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="description">Password</label>
                    <input type="password" class="form-control" name="password" id="" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg px-4 mt-3" name="submit">Register</button>
            </div>
        </form>
        <div class="alert alert-light text-center" role="alert">
          <a href="login.php"><h5>Have an account? Login</h5></a>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>