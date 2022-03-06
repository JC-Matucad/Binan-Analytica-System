<?php
require_once('connection.php');

if (isset($_POST['Submitbtn'])) { //---Valdating if Submitbutton has benn pressed
    //--Declaring Variable and Getting the data from the create new user form
    $user = $_POST['Uname'];
    $pass = $_POST['Password'];
    $cpass = $_POST['CPassword'];
    $status = $_POST['Status'];
    $email = $_POST['Email'];

    $userCheckQuery = "SELECT * FROM user WHERE Username = '$user'";
    $userCheckResult = mysqli_query($conn, $userCheckQuery);
    if($userCheckResult){ 
        if(mysqli_num_rows($userCheckResult) == 0){ //--Validating if username is already exist
            if ($pass == $cpass){ //--Validating if passwords are not match
                $emailCheckQuery = "SELECT * FROM user WHERE email = '$email'";
                $emailCheckResult = mysqli_query($conn, $emailCheckQuery);
                if ($emailCheckResult) { 
                    if (mysqli_num_rows($emailCheckResult) == 0) { //--Validating if Email is already exist
                            //-- if met all the data will be inserted to database
                            $sql="INSERT INTO `user`(`Username`, `Password`, `Status`, `Email`) VALUES ('$user','$pass', '$status', '$email')";
                            $result = mysqli_query($conn,$sql);
                            echo "<script> alert('User has been added');window.location='../manage_user.php'</script>";
                    } else {
                        echo "<script> alert('Email is already exist!');window.location='../createnewuser.php'</script>";
                    }
                }
            }else{
                echo "<script> alert('Password is not match!');window.location='../createnewuser.php'</script>";
            }
        }else{
            echo "<script> alert('Username already exist!');window.location='../createnewuser.php'</script>";
        }
    }
                
    

}

?>