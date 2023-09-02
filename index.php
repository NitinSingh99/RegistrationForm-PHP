<?php
$insert = false;
session_start();

if(isset($_POST['name'])){

  if(empty($_SESSION['form_submitted'])){
        $_SESSION['form_submitted'] = true;

    
    $server = "localhost";
    $username = "root";
    $password = "";

    
    $con = mysqli_connect($server, $username, $password);

    
    if(!$con){
      die("connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `canada_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone',
    '$desc', current_timestamp());";

    
    if($con->query($sql) == true){
        echo "Sucessfully inserted";
        
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
    }
}

unset($_SESSION['form_submitted']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <img src="./bg.jpg" alt="IIT kgp" class="bg" />
    <div class="container">
      <div class="head">
        <h1>Welcome</h1>
      </div>
      <div class="body">
        <form action="index.php" method="post">
          <input
            type="text"
            name="name"
            id="name"
            placeholder="Enter your name"
          />
          <input type="text" name="age" id="age" placeholder="Enter your Age" />
          <input
            type="text"
            name="gender"
            id="gender"
            placeholder="Enter your gender"
          />
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your email"
          />
          <input
            type="phone"
            name="phone"
            id="phone"
            placeholder="Enter your phone"
          />
          <textarea
            name="desc"
            id="desc"
            cols="30"
            rows="10"
            placeholder="Enter any other info"
          ></textarea>
          <div class="con">
            <button class="btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>