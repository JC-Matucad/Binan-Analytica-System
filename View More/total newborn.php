<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/viewmore.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
    <title>Total Newborn</title>
</head>
<body>
        <div id="menu" class="menu">
            <div class="menu-items">
                <div class="menu-logo">
                <h3>Biñan Analytica</h3><span class="close">&times;</span>
                </div>
                <div class="menu-channel">
                    <div class="population active"><a href="../user/Population.php">Population</a> </div>
                    <div class="society"><a href="../user/Society.php">Society</a> </div>
                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="logo">
                <h3>Biñan Analytica</h3>
            </div>
            <div class="collapse"><button id="myBtn" class="myBtn"><p>☰</p></button></div>
            
            </div>
            <div class="main">
                <div class="sidebar">
                    <div class="population active">
                        <a href="../user/Population.php">Population</a>
                    </div>
                    <div class="society"><a href="../user/Society.php">Society</a>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="c1 mb card-1">
                            <div class="height-100">
                                <div class="card">
                                    <div class="head">
                                        <div class="title"><h2>Total Newborn</h2></div>
                                        <div class="back"><a href="../user/population.php">Back</a></div>
                                    </div>
                                    <div class="graph">
                                    <canvas id="newborn" ></canvas><!-- displaying the chart from the script below -->
                                    </div>
                                </div>
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

<!-- Syntax Getting the data from database and make a chart -->
<script>
    <?php
        $dbhost = 'localhost';
        $dbname = 'analyticsdb';
        $dbuser = 'root';
        $dbpass = '';
    ?>
        <?Php 
            try{
                $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);

            } catch(PDOException $ex) {
                    die($ex->getMessage());
                }
                $newborn = $dbcon->prepare("SELECT `Year` , `Total` FROM `total_newborn`ORDER BY `Year` ASC");
                $newborn->execute();
                $year = [];
                $total = [];
                while ($row=$newborn->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $year[] = $Year;
                    $total[] = (int)$Total;
                }

            ?>

            const ltx = document.getElementById('newborn').getContext('2d');
            const newborn = new Chart(ltx, {
                type: 'line',
                data: {
                    labels: 
                        <?Php echo json_encode($year); ?>,
                    datasets: [{
                        label: 'Total Population',
                        data: <?Php echo json_encode($total); ?>,
                        backgroundColor: [
                            '#92D4E8',
                        ],
                        borderColor: [
                            '#1B85A6',
                        ],
                        fill: true,
                        borderWidth: 2,
                        borderRadius: 30
                    }]  
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                        },
                        y: {
                            grid: {
                                display: false
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                
                }
            });
            
        </script>
</body>
</html>