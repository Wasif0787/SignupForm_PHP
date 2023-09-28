<?php
$insert=false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("connetion failed due to " . mysqli_connect_error());
}
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$other = $_POST['desc'];

$sql = "INSERT INTO `ibarts`.`intern` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name',  '$age','$gender', '$email', '$phone', '$other', current_timestamp())";



if($con->query($sql)==true){
    $insert=true;
} else {
    echo "Error in : $sql <br> $con->error";
}

$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
    <title>Aliah University-Admission Portal</title>
</head>

<body>
    <img src="https://www.aliah.ac.in/image/home_banner3.jpg" alt="">
    <div class="container">
        <h1>Welcome to Aliah University</h1>
        <p class="det">Enter your details to join us</p>
        <?php 
        if($insert==true){
            echo "<p class='submitMsg'>Thanks for sharing your details</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="" placeholder="Enter your name">
            <input type="text" name="age" id="" placeholder="Enter your age">
            <input type="text" name="gender" id="" placeholder="Enter your gender">
            <input type="email" name="email" id="" placeholder="Enter your email">
            <input type="text" name="phone" id="" placeholder="Enter your mobile no">
            <textarea name="desc" id="" cols="30" rows="10" placeholder="Describe yourself"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>
