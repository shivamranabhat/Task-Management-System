<?php
require('config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_query = "DELETE FROM task WHERE id = '$id'";
    $delete_result = mysqli_query($conn,$delete_query);
    if($delete_result){
        echo header('Location:manage.php?msg=deletesuccess');
    }
    else{
        echo header('Location:manage.php?msg=deletefailed');
    }
}
?>