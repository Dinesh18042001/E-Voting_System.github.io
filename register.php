<?php
include("connect.php");

$aadhar = $_POST['aadhar'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['name']['photo'];
$tmp_name = $_FILES['tmp_name']['photo'];
$role = $_POST['role'];

if($password == $cpassword){
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect,"INSERT INTO user (aadhar,name,mobile,address,password,photo,role,status,votes) VALUES ('$aadhar','$name','$mobile','$password','$address','$image','$role', 0,0)");
    if($insert){
        echo ' 
        <script>
        alert("Registration Successful!");
        window.location = "../";
        </script>
        ';
    }
    else{
        echo ' 
        <script>
        alert("Some error occured!");
        window.location = "../routes/register.html";
        </script>
        ';
    }
}
else{
    echo ' 
    <script>
    alert("Password and Confirm Password does not match!");
    window.location = "../routes/register.html";
    </script>
    ';
}
?>