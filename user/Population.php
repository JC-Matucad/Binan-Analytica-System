<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/population.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../font-awesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
    <title>Population</title>
</head>
<body>
    <div id="menu" class="menu">
        <div class="menu-items">
            <div class="menu-logo">
            <h3>Biñan Analytica</h3><span class="close">&times;</span>
            </div>
            <div class="menu-channel">
                <div class="population active"><a href="Population.php">Population</a> </div>
                <div class="society"><a href="Society.php">Society</a> </div>
            </div>
        </div>
    </div>
    <div class="navbar">
        <div class="logo">
            <h3>Binan Analytica</h3>
        </div>
        <div class="collapse"><button id="myBtn" class="myBtn"><p>☰</p></button></div>
        <div class="year">
        <?php
            require_once('../backend/php/connection.php');
            $sqlyear = "SELECT `Year` FROM `total_population` ORDER BY Year DESC LIMIT 1";
            $resultyear = mysqli_query($conn,$sqlyear);
            if (mysqli_num_rows($resultyear)){
                while($rowsyear = mysqli_fetch_array($resultyear)){
                (int)$highestyear = $rowsyear["Year"];
                }
            }
            //----- Showing the Selected year
            $year = $highestyear;  
            if(isset($_POST["year"])){
                $year=$_POST["year"];
                $year = (int)$year;
            }
        ?>

        <form method="POST" action="">

            <select name="year" id="list" onchange="this.form.submit()">
                <option value="null"><?php echo $year?></option>
                <?php
                    //----- getting database connection
                    require_once('../backend/php/connection.php'); 
                    //----- Gettng Year Column in Total population table to show as a Select tag
                    $sql = "SELECT `Year` FROM `total_population` Order by Year DESC";
                    $result = $conn->query($sql);
                                                                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' .$row['Year']. '">' .$row['Year']. '</option>';
                        }
                    }
                ?>


            </select>
        </form>
        </div>
        </div>
            <div class="main">
                <div class="sidebar">
                    <div class="population active">
                        <a href="Population.php">Population</a>
                    </div>
                    <div class="society"><a href="Society.php">Society</a>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="c1 mb card-3">
                                <div class="card height-100">
                                    <?php
                                    require_once('../backend/php/connection.php');
                                        //----- Selecting Data of Year and Total from database Where the Year is the previous row of selected year
                                        $sql1 = "SELECT `Year`, `Total` FROM `total_population` WHERE Year < $year ORDER BY Year DESC LIMIT 1";
                                        $result1 = mysqli_query($conn,$sql1);
                                        if (mysqli_num_rows($result1)){
                                            while($rows = mysqli_fetch_array($result1)){
                                            (int)$year1 = $rows["Total"];
                                            }
                                        }else{
                                            $year1 = 0;
                                        }
                                        //-----Selecting Data of Year and Total from database Where the Year is equal to the selected year and calculate the percentage
                                        $sql = "SELECT `Year`, `Total` FROM `total_population` WHERE Year = $year";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()) {
                                            (int)$year2 = $row["Total"];
                                            if($year1 != 0){
                                                (int)$total = ($year2 - $year1)* 100/$year2;
                                                (int)$percent = number_format((float)$total, 1, '.', '');
                                            } else {
                                                $percent = 0;
                                            }

                                    ?>
                                    <!-- Displaying the collected data and the calulated percentage -->
                                    <h2><?Php echo number_format($year2)?> <i class="arrow fa-solid fa-angle-up"></i><span class="percent"><?php echo $percent?>%</span></h2>
                                    <p>Total Number of Population, <?Php echo $row["Year"] ?></p>
                                    <div class="view-more">
                                        <a href="../view more/total population.php"><p>View More</p></a>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                        <div class="c2 mb card-3">
                                <div class="card height-100">
                                    <?php
                                    require_once('../backend/php/connection.php');
                                    //----- Selecting Data of Year and Total from database Where the Year is the previous row of selected year
                                    $sql1 = "SELECT `Year`, `Total` FROM `total_household` WHERE Year < $year ORDER BY Year DESC LIMIT 1";
                                    $result1 = mysqli_query($conn,$sql1);
                                    if (mysqli_num_rows($result1)){
                                        while($rows = mysqli_fetch_array($result1)){
                                        (int)$year1 = $rows["Total"];
                                        }
                                    }else{
                                        $year1 = 0;
                                    }

                                    //-----Selecting Data of Year and Total from database Where the Year is equal to the selected year and calculate the percentage
                                    $sql = "SELECT `Year`, `Total` FROM `total_household` WHERE Year = $year";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            (int)$year2 = $row["Total"];
                                            if($year1 != 0){
                                                (int)$total = ($year2 - $year1)* 100/$year2;
                                                (int)$percent = number_format((float)$total, 1, '.', '');
                                            } else {
                                                $percent = 0;
                                            }
                                    ?>
                                    <!-- Displaying the collected data and the calulated percentage -->
                                    <h2><?Php echo number_format($year2) ?> <i class="arrow fa-solid fa-angle-up"></i><span class="percent"><?php echo $percent?>%</span></h2>
                                    <p>Total Number of Household, <?Php echo $row["Year"] ?></p>
                                    <div class="view-more">
                                    <a href="../view more/total household.php"><p>View More</p></a>
                                    </div>
                                    <?php } } ?>
                            </div>
                        </div>
                        <div class="c3 mb card-3">
                                <div class="card height-100">
                                <?php
                                    require_once('../backend/php/connection.php');
                                    //----- Selecting Data of Year and Total from database Where the Year is the previous row of selected year
                                    $sql1 = "SELECT `Year`, `Total` FROM `total_newborn` WHERE Year < $year ORDER BY Year DESC LIMIT 1";
                                    $result1 = mysqli_query($conn,$sql1);
                                    if (mysqli_num_rows($result1)){
                                        while($rows = mysqli_fetch_array($result1)){
                                        (int)$year1 = $rows["Total"];
                                        }
                                    }else{
                                        $year1 = 0;
                                    }

                                    //-----Selecting Data of Year and Total from database Where the Year is equal to the selected year and calculate the percentage
                                    $sql = "SELECT `Year`, `Total` FROM `total_newborn` WHERE Year = $year";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            (int)$year2 = $row["Total"];
                                            if($year1 != 0){
                                                (int)$total = ($year2 - $year1)* 100/$year2;
                                                (int)$percent = number_format((float)$total, 1, '.', '');
                                            } else {
                                                $percent = 0;
                                            }
                                    ?>
                                    <!-- Displaying the collected data and the calulated percentage -->
                                    <h2><?Php echo number_format($year2) ?> <i class="arrow fa-solid fa-angle-up"></i><span class="percent"><?php echo $percent?>%</span></h2>
                                    <p>Total Number of Newborn, <?Php echo $row["Year"] ?></p>
                                    <div class="view-more">
                                        <a href="../view more/total newborn.php"><p>View More</p></a>
                                    </div>
                                    <?php } } ?>
                                </div>
                        </div>
                        <div class="c4 mb card-4">
                                <div class="card height-100">
                                    <h3>Total Population  </h3>
                                    <div class="graph1">
                                        <canvas id="totalpopulation"></canvas><!-- displaying the chart from the script below -->
                                    </div>
                            </div>
                        </div>   
                        <div class="c5 mb card-3">
                                <div class="card height-100">
                                    <h3>Gender</h3>
                                    <div class="graph2">
                                        <canvas id="genderpopulation"></canvas><!-- displaying the chart from the script below -->

                                        <div class="legend">
                                            <div class="male"></div>
                                            <div><p>Male</p></div>
                                        </div>

                                        <div class="legend"><div class="female"></div>
                                            <div><p>Female</p></div>
                                        </div>


                                    </div>
                                </div>
                        </div>   
                        <div class="c6 mb card-4">
                                <div class="card height-100">
                                    <h3>Barangay Population </h3>
                                    <div class="graph3">
                                        <canvas id="brgypopulation"></canvas><!-- displaying the chart from the script below -->
                                    </div>
                                </div>
                        </div>   
                        <div class="c7 mb card-3">
                                <div class="card height-100">
                                    <h3>Age Distribution</h3>
                                    <div class="graph4">
                                        <canvas class="agedis" id="AgeDistribution"></canvas><!-- displaying the chart from the script below -->
                                        
                                        <div class="legend">
                                            <div class="bullet age14"></div>
                                            <p>less 1-14 year/s old</p>
                                        </div>
                                        <div class="legend">
                                            <div class="bullet age18"></div>
                                            <p>15-18 years old</p>
                                        </div>
                                        <div class="legend">
                                            <div class="bullet age30"></div>
                                            <p>19-30 years old</p>
                                        </div>
                                        <div class="legend">
                                            <div class="bullet age60"></div>
                                            <p>31-60 years old</p>
                                        </div>
                                        <div class="legend">
                                            <div class="bullet age61"></div>
                                            <p>61 years old and above</p>
                                        </div>
                                    </div>
                                </div>
                        </div>  
                        <div class="c8 mb card-1">
                                <div class="card height-100">
                                    <h3>Leading Cause of Death</h3>
                                    <div class="graph5">
                                        <canvas id="causeofdeath"></canvas><!-- displaying the chart from the script below -->
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

<?php //----- Declaring Variable for database connection
   $dbhost = 'localhost';
    $dbname = 'analyticsdb';
    $dbuser = 'root';
    $dbpass = '';
?>
<script> //----------TOTAL POPULATION CHART SYNTAX-----------------------------------------------//
    <?Php 
        //-----Connecting to Database
        try{
             $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
        }catch(PDOException $ex) {
            die($ex->getMessage());
        }
        //----- Declaring Variable and Getting Data from database
        $totalpopulation = $dbcon->prepare("SELECT * FROM `total_population` ORDER BY `Year` ASC");
        $totalpopulation->execute();
        $populationYear = [];
        $populationTotal = [];
        while ($row=$totalpopulation->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $populationYear[] =  $Year;
            $populationtotal[] = (int)$Total;
        }

    ?>

    //----- Converting the data from database as json format and making a chart
    const rtx = document.getElementById('totalpopulation').getContext('2d');
    const totalpopulation = new Chart(rtx, {
        type: 'line',
        data: {
            labels: <?Php echo json_encode($populationYear); ?>,
            datasets: [{
                label: 'Total Population',
                data: <?Php echo json_encode($populationtotal); ?>,
                backgroundColor: [
                    '#1B85A6',
                ],
                borderColor: [
                    '#1B85A6',
                ],
                borderWidth: 2,
                pointRadius: 7,
                }]  
                },
                options: {
                    scales: {
                        x: {
                            grid:{
                                display:false
                            }
                        },
                        y: {

                            grid:{
                                display:true
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                }
            });
</script>

<script>//--------------------GENDER POPULATION CHART SYNTAX-------------------------------------
    <?Php 
        //-----Connecting to Database
        try{
            $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
        } catch(PDOException $ex) {
                die($ex->getMessage());
            }
        //----- Declaring Variable and Getting Data from database
        $genderpopulation = $dbcon->prepare("SELECT `Gender`, `Total` FROM `total_gender_population` WHERE `Year` = $year ORDER BY `Gender` ASC");
        $genderpopulation->execute();
        $labelGender = [];
        $genderTotal = [];
        while ($row=$genderpopulation->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $labelGender[] =  $Gender;
            $genderTotal[] = (int)$Total;

            }

        ?>
            //----- Converting the data from database as json format and making a chart
            const ctx = document.getElementById('genderpopulation').getContext('2d');
            const genderpopulation = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: <?Php echo json_encode($labelGender); ?>,
                    datasets: [{
                        label: '',
                        data: <?Php echo json_encode($genderTotal); ?>,
                        backgroundColor: [
                            'rgba(217, 85, 123, 0.35)',
                            'rgba(39, 177, 220, 0.95)',
                        ],
                        borderColor: [
                            'rgba(217, 85, 123, 0.35)',
                            'rgba(39, 177, 220, 0.95)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    cutout: 80,
                    scales: {
                        x: {
                            display: false
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
                
            });

</script>

<script>//----------------------BARANGAY POPULATION-------------------------------------
            <?Php 
            //-----Connecting to Database
            try{
                $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);

            } catch(PDOException $ex) {
                    die($ex->getMessage());
                }
                //----- Declaring Variable and Getting Data from database
                $brgypopulation = $dbcon->prepare("SELECT `Barangay` , `Total` FROM `barangay_population` where `Year` = $year order by `Total` DESC ");
                $brgypopulation->execute();
                $brgy = [];
                $brgypopulationtotal = [];
                while ($row=$brgypopulation->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $brgy[] = $Barangay;
                    $brgypopulationtotal[] = (int)$Total;
                }

            ?>

            //----- Converting the data from database as json format and making a chart
            const btx = document.getElementById('brgypopulation').getContext('2d');
            const brgypopulation = new Chart(btx, {
                type: 'bar',
                data: {
                    labels: 
                        <?Php echo json_encode($brgy); ?>,
                    datasets: [{
                        label: 'Total Population',
                        data: <?Php echo json_encode($brgypopulationtotal); ?>,
                        backgroundColor: [
                            '#1B85A6',
                        ],
                        borderColor: [
                            '#1B85A6',
                        ],
                        borderWidth: 1
                    }]  
                },
                options: {
                    indexAxis: "y",
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            ticks: {
                                stepSize: 1,
                                min: 20,
                                autoSkip: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                        display: false
                        }
                    },
                }
            });
            
</script>

<script>//------------------------AGE DISTRIBUTION--------------------------------
            <?Php 
                //-----Connecting to Database
                try{
                    $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    
                } catch(PDOException $ex) {
                        die($ex->getMessage());
                    }
                //----- Declaring Variable and Getting Data from database
                $AgeDistribution = $dbcon->prepare("SELECT `Age`, `Total` FROM `age_distribution` WHERE `Year` = $year ORDER BY `Age` ASC");
                $AgeDistribution->execute();
                $labelAge = [];
                $AgeTotal = [];
                while ($row=$AgeDistribution->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $labelAge[] =  $Age;
                    $AgeTotal[] = (int)$Total;

                }

            ?>

            //----- Converting the data from database as json format and making a chart
            const atx = document.getElementById('AgeDistribution').getContext('2d');
            const AgeDistribution = new Chart(atx, {
                type: 'doughnut',
                data: {
                    labels: <?Php echo json_encode($labelAge); ?>,
                    datasets: [{
                        label: 'Barangay Population',
                        data: <?Php echo json_encode($AgeTotal); ?>,
                        backgroundColor: [
                            '#DDA872',
                            '#61BEDB',
                            '#F8ED89',
                            '#FD91B0',
                            '#A4E2AC',
                        ],
                        borderColor: [
                            '#DDA872',
                            '#61BEDB',
                            '#F8ED89',
                            '#FD91B0',
                            '#A4E2AC',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    cutout: 80,
                    scales: {
                        x: {
                            display: false
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
                
            });
</script>

<script>//------------------------CAUSE OF DEATH----------------------------------------------------
            <?Php 
            //-----Connecting to Database
            try{
                $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);

            } catch(PDOException $ex) {
                    die($ex->getMessage());
                }
                //----- Declaring Variable and Getting Data from database
                $causeofdeath = $dbcon->prepare("SELECT `Cause` , `Total` FROM `cause_of_death` WHERE `Year` = $year order by `Total` Desc LIMIT 9");
                $causeofdeath->execute();
                $causes = [];
                $totaldeath = [];
                while ($row=$causeofdeath->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $causes[] = $Cause;
                    $totaldeath[] = (int)$Total;
                }

            ?>

            //----- Converting the data from database as json format and making a chart
            const ktx = document.getElementById('causeofdeath').getContext('2d');
            const causeofdeath = new Chart(ktx, {
                type: 'bar',
                data: {
                    labels: 
                        <?Php echo json_encode($causes); ?>,
                    datasets: [{
                        label: 'Total Population',
                        data: <?Php echo json_encode($totaldeath); ?>,
                        backgroundColor: [
                            '#1B85A6',
                        ],
                        borderColor: [
                            '#1B85A6',
                        ],
                        borderWidth: 1
                    }]  
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            display: false
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
    <script>
        let percent = document.getElementsByClassName("percent");
        let arrow = document.getElementsByClassName("arrow");

        for (var i = 0; i < percent.length; i++) {
        var arrowIcon = arrow[i];
        var percentColor = percent[i];
        var percent1 = parseInt(percent[i].innerHTML);
        console.log(percent1);
        console.log(typeof(percent1))
        

        if (percent1 < 0 ) {
            arrowIcon.classList.remove('fa-angle-up');
            arrowIcon.classList.add('fa-angle-down');
            arrowIcon.style.color = "#ea3943";
            percentColor.style.color = "#ea3943";
        }
        else {
        
        }
        }
    
    </script>

</body>
</html>