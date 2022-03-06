<?php 
require_once('connection.php');
session_start();
$user = $_SESSION['User'];

$sql = "SELECT `Status` FROM `user` Where Username = '$user'";
$result = $conn-> query($sql);

if ($result-> num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
        $admin = $row["Status"];
    }
}

if($admin == "Admin"){ //--Validating if user's status is Admin to proceed in manage_user page
    header("location:../manage_user.php");
}else{
    
    echo "<script> alert('you are not admin!');window.location='../manage_data.php'</script>";
}
