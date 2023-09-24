<?php
    include("connection.php");
    $aadhar = $_POST['aadhar'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $add = $_POST['address'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];

    if($cpass!=$pass){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/register.php";
            </script>';
    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert = mysqli_query($connect, "insert into user1 (aadhar, name, mobile, password, address, photo, status, votes, role) values('$aadhar','$name', '$mobile', '$pass', '$add', '$image', 0, 0, '$role') ");
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../";
                </script>';
        }
    }
    
?>