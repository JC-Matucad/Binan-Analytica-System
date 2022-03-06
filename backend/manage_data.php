<?php
    session_start();

    if(isset($_SESSION['User']))
    {
    }
    else
    {
        header("location:loginform.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../backend/css/importdata.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
    <title>Manage Data</title>
</head>
<body>
        <div id="menu" class="menu">
            <div class="menu-items">
                <div class="menu-logo">
                <h3>Biñan Analytica</h3><span class="close">&times;</span>
                </div>
                <div class="menu-channel">
                    <div class="import-data active"><a href="manage_data.php">Manage Data</a> </div>
                    <div class="new-user"><a href="php/adminverify.php">Manage User</a> </div>
                    <div class="logout"><a href="php/logout.php?logout">Log Out</a> </div>
                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="logo">
                <h3>Biñan Analytica</h3>
            </div>
            <div class="collapse"><button id="myBtn" class="myBtn"><p>☰</p></button></div>
            <div class="dashboard">
                <a href="../user/population.php" target="_blank"><h3>Open Dashboard</h3></a>
            

            </div>
            </div>
            <div class="main">
                <div class="sidebar">
                    <div class="import-data active">
                        <a href="manage_data.php">Manage Data</a>
                    </div>
                    <div class="new-user"><a href="php/adminverify.php">Manage User</a>
                    </div>
                    <div class="logout"><a href="php/logout.php?logout">Log Out</a>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Population</h2>
                            <div class="btn"><a href="import/total_population/total_population.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Household</h2>
                            <div class="btn"><a href="import/total_household/total_household.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Newborn</h2>
                            <div class="btn"><a href="import/total_newborn/total_newborn.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Barangay Population
                            </h2>
                            <div class="btn"><a href="import/Barangay_population/Barangay_population.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Age Distribution</h2>
                            <div class="btn"><a href="import/age_distribution/age_distribution.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Cause of Death
                            </h2>
                            <div class="btn"><a href="import/cause_of_death/cause_of_death.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Birth Rate</h2>
                            <div class="btn"><a href="import/birth_rate/birth_rate.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Death Rate
                            </h2>
                            <div class="btn"><a href="import/death_rate/death_rate.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Poverty Rate</h2>
                            <div class="btn"><a href="import/poverty_rate/poverty_rate.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Growth Rate</h2>
                            <div class="btn"><a href="import/population_growth_rate/population_growth_rate.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Marital Status</h2>
                            <div class="btn"><a href="import/maritalstatus/maritalstatus.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Teenage Pregnancy</h2>
                            <div class="btn"><a href="import/teenpreg/teenpreg.php">Manage Data</a></div>
                        </div>
                    </div>
                    <div class="c1 mb card-3">
                        <div class="card height-100">
                            <h2>Gender Population</h2>
                            <div class="btn"><a href="import/total_gender_population/total_gender_population.php">Manage Data</a></div>
                        </div>
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