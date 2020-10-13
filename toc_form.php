<?php


$insert=false;
if(isset($_POST['name'])){

$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server, $username, $password);
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}

$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql="INSERT INTO `toc`.`toc_registration` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if(($con->query($sql))==true){
// echo "Successfully inserted";
$insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="reg.jpg" alt="dtu">
    <div class="container">
        <h1>Welcome to the Registration Form</h1>
        <p>Enter your correct details for confirmation</p>
        <?php
        if($insert==true){
            echo "<p>Thanks for submitting your form. Successfully Submitted your details</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone No">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>