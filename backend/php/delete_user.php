<?php
    include_once("connection.php");

    $user = $_POST['Username'];

    // if delete button clicked
    if(isset($_POST['Deletebtn'])) {
        // validating if username selected is null
        if($user=="null"){
            header("Location:../deleteuser.php");
        }else{ //if condition is met the selected username's data will be deleted in database
            $sql = "DELETE FROM `user` WHERE `Username` = '$user' ";
		    $result = mysqli_query($conn,$sql);
		    
            header("Location:../manage_user.php");
        }
		
    }

?>