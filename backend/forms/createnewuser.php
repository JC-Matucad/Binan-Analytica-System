<?php
    session_start();

    if(isset($_SESSION['User']))
    {
    }
    else
    {
        header("location:loginform.html");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/newuser.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
    <title>Create User</title>
</head>
<body>
        <div id="menu" class="menu">
            <div class="menu-items">
                <div class="menu-logo">
                <h3>Biñan Analytica</h3><span class="close">&times;</span>
                </div>
                <div class="menu-channel">
                    <div class="import-data"><a href="../manage_data.php">Manage Data</a> </div>
                    <div class="new-user active"><a href="../manage_user.php">Manage User</a> </div>
                    <div class="logout"><a href="../php/logout.php?logout">Log Out</a> </div>
                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="logo">
                <h3>Biñan Analytica</h3>
            </div>
            <div class="collapse"><button id="myBtn" class="myBtn"><p>☰</p></button></div>
            <div class="dashboard">
            <a href="../../user/population.php" target="_blank"><h3>Open Dashboard</h3></a>
            

            </div>
            </div>
            <div class="main">
                <div class="sidebar">
                    <div class="import-data">
                        <a href="../manage_data.php">Manage Data</a>
                    </div>
                    <div class="new-user active"><a href="../manage_user.php">Manage User</a>
                    </div>
                    <div class="logout"><a href="../php/logout.php?logoutp">Log Out</a>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                    <div class="c2 mb card-3">
                        <div class="card height-100">
                            <h2>Create Account</h2>
                            <form method="POST" action="../php/adduser.php">
                                <div><input type="text" name="Uname" id="Uname"  placeholder="Username" required></div>
                                <div><input type="password" name="Password" id="Password" placeholder='Password'required></div>
                                
                                <div><input type="password" name="CPassword" id="CPassword" placeholder='Confirm Password'required></div>
                                <div><select name="Status" id="Status" class="option">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select></div>
                                <div><input type="text" name="Email" id="Email"  placeholder="Email"required></div>
                                <div class="clickable">
                                    <a class="cancelBtn" href="../manage_user.php">Cancel</a>
                                    <input type="submit" name="Submitbtn" id="Submitbtn" value="Sign Up">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                var menu = document.getElementById("menu");
                var btn = document.getElementById("myBtn");
                var close1 = document.getElementsByClassName("close")[0];
                const body = document.querySelector("body");

                
                close1.onclick = function() {
                    menu.style.display = "none";
                    body.style.overflow = "auto";
                }

                btn.onclick = function() {
                    menu.style.display = "block";
                    body.style.overflow = "hidden";
                ;}
                window.onclick = function(event) {
                if (event.target == menu) {
                  menu.style.display = "none";
                  body.style.overflow = "auto";
                    }
                }
            </script>
</body>
</html>