<?php
    //--Creating connection to database
    $conn=mysqli_connect('localhost','root','','analyticsdb');

    if(!$conn)
    {
        die(' Please Check Your Connection'.mysqli_error($conn));
    }
?>