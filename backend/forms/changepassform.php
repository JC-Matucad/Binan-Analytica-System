<?php include_once ("../php/controller.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginform.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">    <title>Document</title>
</head>
<body>
<script>
                    var modal = document.getElementById('intro');
                    var span = document.getElementsByClassName('off')[0];
                        modal.style.display = 'block';
                        span.onclick = function() {
                        modal.style.display = 'none';
                    }
                    window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                    }
                    </script>
        <?php echo $sample;?>
    <div class="container">
        <div class="card">
            <div class="card-title">Biñan Analytica<span>Data Dashboard for Biñan City
            </span> </div>
        </div>
        <div class="card-1">
            <div class="card-title">New Password<span>Enter you new password</span></div>
            <form action="changepassform.php" method="POST" autocomplete="off">
                <div><input type="password" name="password" placeholder="&#xf007  Enter New Password" required></div>
                <div><input type="password" name="confirmPassword" placeholder="&#xf007 Confirm Password" required></div>
                <div><input type="submit" name="changePassword" value="Save"></div>
            </form>
            <p>Already have an account? <a href="../php/logout.php?logout">Login</a></p> 
        </div>
            
    </div>
    

</body>
</html>