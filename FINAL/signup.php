<?php
     $showAlert = false;
     $showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;

    if(($password == $cpassword) && $exists==false){
         $sql = "INSERT INTO `signup` ( `username`, `password`, `Dt`) VALUES ( '$username', '$password', current_timestamp())";
         $result = mysqli_query($conn,$sql);
         if ($result){
            $showAlert = true;
         }
    }
    else{
        $showError = "Passwords do not match";
    }
}





?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <?php require '<partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success</strong>Your account is now created and you can now login
    </div>'; 
    }
    ?>
     <?php
    if($showError){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error</strong>  Passwords do not match
    </div>'; 
    }
    ?>

    <div class="container my-4 " style="
    display: flex;
    flex-direction: column;
    align-items: center;">
        <h1 class="text-center">Signup</h1>
        <form action="/loginsystem/signup.php" method="post">
            <div class="form-group">
                <label for="username" class="form-label">UserName</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="cpassword" class="form-text">Make sure to write the same passord</div>
            </div> 
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
     
  </body>
</html>