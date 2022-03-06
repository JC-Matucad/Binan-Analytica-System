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
        <?php echo $sample;?>
        
    <div class="container">
        <div class="card">
            <div class="card-title">Biñan Analytica<span>Data Dashboard for Biñan City
            </span> </div>
        </div>
        <div class="card-1">
            <div class="card-title">Forgot Password<span>Enter your Email</span></div>
            <form method="POST" action="forgotform.php">
                <div><input type="text" name="email" id="email" placeholder="&#xf007  Enter email" required></div>
                <div><input type="submit" name="forgot_password" id="myBtn" value="Send OTP"></div>
            </form>
            <p>Already have an account? <a href="../php/logout.php?logout">Login</a></p> 
        </div>
            
    </div>

</div>
<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
</script>
</body>
</html>