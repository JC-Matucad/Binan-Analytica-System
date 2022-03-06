<?php include_once ("../php/controller.php"); 


?>

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
                    </script>
<?php echo $sample;?>
    <div class="container">
        <div class="card">
            <div class="card-title">Biñan Analytica<span>Data Dashboard for Biñan City
            </span> </div>
        </div>
        <div class="card-1">
            <div class="card-title">Enter your OTP<span>Verification code has sent to your Email</span></div>
            <form action="verifyOTP.php" method="POST" autocomplete="off">
                <div><input type="number" name="OTPverify" placeholder="&#xf007  Verification Code" required></div>
                <div><input type="submit" name="verifyotp" value="Verify"></div>
            </form>
            <p>Already have an account? <a href="../php/logout.php?logout">Login</a></p> 
        </div>
            
    </div>
    <div id="modalmessage" class="modal">

        <div class="modal-content">
            <div class="modal-header">
                <p>Message</p>
            </div>

            <div class="modal-body">
                <p>Otp Has been send to your email</p>
            </div>

            <div class="modal-option">
                <span class="close"><button>Close</button></span>
            </div>
        </div>
    

    </div>

</body>
</html>