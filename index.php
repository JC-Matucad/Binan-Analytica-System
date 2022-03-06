<?php 
require_once('backend/php/connection.php');
// Creating a session for login
session_start();
    $sample = "";
    $textinfo = "";
    if(isset($_POST['Submitbtn']))
    {
        $query="select * from user where Username='".$_POST['Uname']."' and Password='".$_POST['Password']."'";
        $result=mysqli_query($conn,$query);

        if(mysqli_fetch_assoc($result))
        {
            $_SESSION['User']=$_POST['Uname'];
            header("location:backend/manage_data.php");
        }
        else
        {
            $sample = "<script>
        var modal = document.getElementById('modalmessage');
        var span = document.getElementsByClassName('close')[0];
            modal.style.display = 'block';
            span.onclick = function() {
            modal.style.display = 'none';
        }
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
        }
        </script>";
        $textinfo = "Username or Password is incorrect!!";
        }
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backend/css/loginform.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">    <title>Document</title>
</head>
<body>
    <div id="modalmessage" class="modal">

        <div class="modal-content">
            <div class="modal-header">
                <p>Message</p>
            </div>

            <div class="modal-body">
                <p><?php echo $textinfo?></p>
            </div>

            <div class="modal-option">
                <span class="close"><button>Close</button></span>
            </div>
    </div>
    </div>
    <?php echo $sample;?>
    <div class="container">
        <div class="card">
            <div class="card-title">Biñan Analytica<span>Data Dashboard for Biñan City
            </span> </div>
        </div>
        <div class="card-1">
            <div class="card-title">Sign In<span>To access the portal</span></div> 
            <form method="POST" action="index.php"> <!-- Get inputed data from this form and send to login.php -->
                <div><input type="text" name="Uname" id="Uname" placeholder="&#xf007  Enter Username"></div>
                <div><input type="password" name="Password" id="Password" placeholder='&#xf084  Enter Password' required></div>
                <div><input type="submit" name="Submitbtn" id="Submitbtn" value="Login" required></div>
            </form>
            <p><a href="backend/forms/forgotform.php">Forgot Password?</a></p> 
        </div>
            
    </div>
    
    

</div>


</body>
</html>