<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'analyticsdb');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM poverty_rate WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        header("Location:../poverty_rate.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>