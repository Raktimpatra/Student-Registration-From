<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    include 'partials/_dbconnect.php';
    $username =$_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $guardianname = $_POST["guardianname"];
    $add = $_POST["add"];
    $course = $_POST["course"];
    $dob = $_POST["dob"];
    $mobileno = $_POST["mobileno"];
    $emailid = $_POST["emailid"];
    // $exists=false;
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      // $exists = true;
      $showError = "Username Already Exists";  //error show function
    }
    else{
      // $exists = false;
    if(($password == $cpassword)){
      
      // all column name write here
        $sql = "INSERT INTO `users` (`username`, `password`, `dt`,`guardianname`,`add`,`course`,`dob`,`mobileno`,`emailid`) VALUES ('$username', '$password',current_timestamp(),'$guardianname','$add','$course','$dob','$mobileno','$emailid')";
        $result= mysqli_query($conn, $sql);
        if ($result){
          $showAlert = true;
        }
    }
    else{
      $showError = "Passwords do not match";  //error show function
    }
}
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Signup</title>
  </head>
  <body>
  <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){

    // success function
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    // error function
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
?>

  <div class="container">
    <h1 class="text-center">Students Registration Form</h1>
    <form action="/loginsystem/signup.php" method="post">
  <div class="form-group col-md-6">
    <label for="username">Username</label>
    <input type="text"  maxlength="30"  class="form-control" id="username" name="username" aria-describedby="emailHelp"placeholder="Enter Username" >
    
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" minlength="4" maxlength="14" ng-model="dataItem.password" class="form-control" id="password" name="password"  placeholder="Enter password">
    <small id="password" class="form-text text-muted">Minimum 4 Characters</small>
  </div>
  <div class="form-group col-md-6">
    <label for="cpassword">confirm Password</label>
    <input type="password" minlength="4" maxlength="14"  class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
  </div>
  <div class="form-group col-md-6">
    <label for="guardianname">Guardian Name</label>
    <input type="text" class="form-control" id="guardianname" name="guardianname" aria-describedby="emailHelp" placeholder="Guardian Name">
    
  </div>
  <div class="form-group col-md-6">
    <label for="add">Address</label>
    <input type="text" class="form-control" id="add" name="add" aria-describedby="emailHelp"placeholder="Enter Your Address">
    
  </div>
  <div class="form-group col-md-6">
    <label for="course">Choose a course:</label>
    <select id="course" name="course">
    
    
    
    
    <option value="Computer Science and Engineering">Computer Science and Engineering</option>
    <option value="Mechanical Engineering">Mechanical Engineering</option>
    <option value="Biotechnology Engineering">Biotechnology Engineering</option>
    <option value="Civil Engineering">Civil Engineering</option>
    <option value="Automobile Engineering">Automobile Engineering</option>
    <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
    <option value="Data Science">Data Science</option>
  </select>
  </div>
 
  <div class="form-group col-md-6">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob" aria-describedby="emailHelp" placeholder="dd/mm/yyyy">
    
  </div>

  <div class="form-group col-md-6">
    <label for="mobileno">Mobile Number</label>
    <input  minlength="10" maxlength="10" class="form-control" id="mobileno" name="mobileno" aria-describedby="emailHelp"placeholder="### ### ####" >
    
  </div>

  <div class="form-group col-md-6">
    <label for="emailid">Email ID</label>
    <input type="email" class="form-control" id="emailid" name="emailid" aria-describedby="emailHelp" placeholder="email@xyz.com">
    
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
 
</form>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
