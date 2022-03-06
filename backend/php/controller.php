<?php include_once("connection.php");
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    // Connection Created Successfully

    session_start();


    // Store All Errors
    $errors = [];
    // Declaring variable for modal message
    $sample = "";
    $textinfo = "";
    $intro="OTP Has been sent";
    

    // if forgot button will clicked
    if (isset($_POST['forgot_password'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $emailCheckQuery = "SELECT * FROM user WHERE email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        // if query run
        if ($emailCheckResult) {
            // if email matched
            if (mysqli_num_rows($emailCheckResult) > 0) {
                $code = rand(999999, 111111);
                // update the user's code in database
                $updateQuery = "UPDATE user SET code = $code WHERE email = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery);
                    // Send a code via email
                    if ($updateResult){
                        $mailTo = $email;
                        $body = "<h1>Your Code is </h1>"."<h1>". $code . "</h1>";
                        $mail = new PHPMailer\PHPMailer\PHPMailer();
                        $mail->isSMTP();
                        $mail->Host = "mail.smtp2go.com";
                        $mail->SMTPAuth = true;
                        $mail->Username = "Analytica";
                        $mail->Password = "1128";
                        $mail->SMTPSecure = "tls";
                        $mail->Port = "2525";
                        $mail->From = "sample@gmail.com";
                        $mail->FromName = "Biñan Analytica";
                        $mail->addAddress($mailTo, "Analytica");
                        $mail->isHTML(true);
                        $mail->Subject = "Reset password notification";
                        $mail->Body = $body;
                        $mail->AltBody = "error body";
                        // proceed to verify otp page
                        echo "<script>window.location='verifyotp.php'</script>"; 
                        
                        if(!$mail->send()){
                            echo "Mailer error :".$mail->ErrorInfo;
                        }else{
                            
                        }
            }else{
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
                $textinfo = "Failed while inserting data into database!!";
                $intro="";
                
                }
        }else{
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
            $textinfo = "The email you entered isn’t connected to an account.";
            $intro="";
            
        }

    }else{

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
            $textinfo = "Failed while checking email from database";
            $intro="";
            
        }
    }


    // if verifyotp button is clicked
    if(isset($_POST['verifyotp'])){
        $_SESSION['message'] = "";
            // Validate the code that inputed
            $OTPverify = mysqli_real_escape_string($conn, $_POST['OTPverify']);
            $verifyQuery = "SELECT * FROM user WHERE code = $OTPverify";
            $runVerifyQuery = mysqli_query($conn, $verifyQuery);
            if($runVerifyQuery){
                if(mysqli_num_rows($runVerifyQuery) > 0){ // met reset the value of code in database
                    $newQuery = "UPDATE user SET code = 0";
                    $run = mysqli_query($conn,$newQuery);
                    // proceed to change password form
                    echo "<script>window.location='changepassform.php'</script>";
                    
                    
                }else{
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
                    $textinfo = "Invalid Verification Code";
                    $intro="";
                    
                    
                }
            }else{
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
                    $textinfo = "Failed while checking Verification Code from database!";
                    $intro="";
                    
            }
        }

// if change Password button is clicked
if(isset($_POST['changePassword'])){
    $password = ($_POST['password']);
    $confirmPassword = ($_POST['confirmPassword']);
        // if password not matched so
        if ($_POST['password'] != $_POST['confirmPassword']) { // valdating if passwords are match
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
                    $textinfo = "Password not match";
                    
        } else { // if condition is met change the password in database corresponding on the email entered
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE user SET password = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword);
            session_destroy();
            echo "<script> alert('Change password succeed!');window.location='../backend/../../index.php'</script>";
        }
}
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
<div id="modalmessage" class="modal">

    <div class="modal-content">
        <div class="modal-header">
            <p>Message</p>
        </div>

        <div class="modal-body">
            <p><?php echo $textinfo?><?php echo $intro?></p>
        </div>

        <div class="modal-option">
            <span class="close"><button>Close</button></span>
        </div>
    </div>
    

</div>
<div id="intro" class="modal">

        <div class="modal-content">
            <div class="modal-header">
                <p>Message</p>
            </div>

            <div class="modal-body">
                <p>OTP Accepted</p>
            </div>

            <div class="modal-option">
                <span class="off"><button>Close</button></span>
            </div>
        </div>
    

    </div>


</body>
</html>
