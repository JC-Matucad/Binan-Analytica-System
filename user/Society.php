<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/society.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
    <title>Society</title>
</head>
<body>
    <div id="menu" class="menu">
        <div class="menu-items">
            <div class="menu-logo">
            <h3>Biñan Analytica</h3><span class="close">&times;</span>
            </div>
            <div class="menu-channel">
                <div class="population"><a href="Population.php">Population</a> </div>
                <div class="society active"><a href="Society.php">Society</a> </div>
            </div>
        </div>
    </div>
    <div class="navbar">
        <div class="logo">
            <h3>Binan Analytica</h3>
        </div>
        <div class="collapse"><button id="myBtn" class="myBtn"><p>☰</p></button></div>
        <div class="year">
        <form method="POST" action="">
            
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
                    <div class="population">
                        <a href="Population.php">Population</a>
                    </div>
                    <div class="society active"><a href="Society.php">Society</a>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="c1 mb card-1-1">
                                <div class="card height-100">
                                    
                                    <?php
                                        //----- Selecting Data of Percentage from database Where the Year is the previous row of selected year
                                        require_once('../backend/php/connection.php');
                                        $sql1 = "SELECT `Percentage` FROM `birth_rate` WHERE Year < $year ORDER BY Year DESC LIMIT 1";
                                        $result1 = mysqli_query($conn,$sql1);
                                        if (mysqli_num_rows($result1)){
                                            while($rows = mysqli_fetch_array($result1)){
                                            (int)$year1 = $rows["Percentage"];
                                            }
                                        }else{
                                            $year1 = 0;
                                        }

                                        //-----Selecting Data of Percentage from database Where the Year is equal to the selected year and calculate the percentage
                                        $sql = "SELECT `Percentage` FROM `birth_rate` WHERE Year = $year";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            (int)$year2 = $row["Percentage"];
                                            if($year1 != 0){
                                                (int)$total = $year2 - $year1 ;
                                            }else{
                                                $total = 0;
                                            }
                                    ?>
                                    <!-- Displaying the collected data and the calulated percentage -->
                                    <h2><?Php echo $year2 ?>% <i class="arrow fa-solid fa-angle-up"></i><span class="percent"><?Php echo $total ?>%</span></h2>
                                    <?php } } ?>
                                    <p>Birth Rate</p>
                                    <div class="view-more">
                                        <a href="../View More/Birth Rate.php"><p>View More</p></a>
                                    </div>
                                </div>
                        </div>
                        <div class="c2 mb card-1-1">
                                <div class="card height-100">
                                    
                                    <?php
                                        require_once('../backend/php/connection.php');
                                        //----- Selecting Data of Percentage from database Where the Year is the previous row of selected year
                                        $sql1 = "SELECT `Percentage` FROM `death_rate` WHERE Year < $year ORDER BY Year DESC LIMIT 1";
                                        $result1 = mysqli_query($conn,$sql1);
                                        if (mysqli_num_rows($result1)){
                                            while($rows = mysqli_fetch_array($result1)){
                                            (int)$year1 = $rows["Percentage"];
                                            }
                                        }else{
                                            $year1 = 0;
                                        }

                                        //-----Selecting Data of Percentage from database Where the Year is equal to the selected year and calculate the percentage
                                        $sql = "SELECT `Percentage` FROM `death_rate` WHERE Year = $year";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                (int)$year2 = $row["Percentage"];
                                                if($year1 != 0){
                                                    (int)$total = $year2 - $year1 ;
                                                }else{
                                                    $total = 0;
                                                }
                                        ?>
                                    <!-- Displaying the collected data and the calulated percentage -->
                                    <h2><?Php echo $year2 ?>% <i class="arrow fa-solid fa-angle-up"></i><span class="percent"><?Php echo $total ?>%</span></h2>
                                    <?php } } ?>
                                    <p>Death Rate</p>
                                    <div class="view-more">
                                    <a href="../View More/death Rate.php"><p>View More</p></a>
                                    </div>
                            </div>
                        </div>
                        <div class="c3 mb card-1-1">
                                <div class="card height-100">
                                    
                                    <?php
                                        require_once('../backend/php/connection.php');
                                        //----- Selecting Data of Percentage from database Where the Year is the previous row of selected year
                                        $sql1 = "SELECT `Percentage` FROM `poverty_rate` WHERE Year < $year ORDER BY Year DESC LIMIT 1";
                                        $result1 = mysqli_query($conn,$sql1);
                                        if (mysqli_num_rows($result1)){
                                            while($rows = mysqli_fetch_array($result1)){
                                            (int)$year1 = $rows["Percentage"];
                                            }
                                        }else{
                                            $year1 = 0;
                                        }

                                        //-----Selecting Data of Percentage from database Where the Year is equal to the selected year and calculate the percentage
                                        $sql = "SELECT `Percentage` FROM `poverty_rate` WHERE Year = $year";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                (int)$year2 = $row["Percentage"];
                                                if($year1 != 0){
                                                    (int)$total = $year2 - $year1 ;
                                                }else{
                                                    $total = 0;
                                                }
                                        ?>
                                    <!-- Displaying the collected data and the calulated percentage -->
                                    <h2><?Php echo $year2 ?>% <i class="arrow fa-solid fa-angle-up"></i><span class="percent"><?Php echo $total ?>%</span></h2>
                                    <p>Poverty Rate</p>
                                    <?php } } ?>
                                    <div class="view-more">
                                    <a href="../View More/poverty Rate.php"><p>View More</p></a>
                                    </div>
                                </div>
                        </div>
                        <div class="c4 mb card-1-1">
                                <div class="card height-100">
                                    
                                    <?php
                                        require_once('../backend/php/connection.php');
                                        //----- Selecting Data of Percentage from database Where the Year is the previous row of selected year
                                        $sql1 = "SELECT `Percentage` FROM `poverty_rate` WHERE Year < $year ORDER BY Year DESC LIMIT 1";
                                        $result1 = mysqli_query($conn,$sql1);
                                        if (mysqli_num_rows($result1)){
                                            while($rows = mysqli_fetch_array($result1)){
                                            (int)$year1 = $rows["Percentage"];
                                            }
                                        }else{
                                            $year1 = 0;
                                        }

                                        //-----Selecting Data of Percentage from database Where the Year is equal to the selected year and calculate the percentage
                                        $sql = "SELECT `Percentage` FROM `population_growth_rate` WHERE Year = $year";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                (int)$year2 = $row["Percentage"];
                                                if($year1 != 0){
                                                    (int)$total = $year2 - $year1 ;
                                                }else{
                                                    $total = 0;
                                                }
                                        ?>
                                    <!-- Displaying the collected data and the calulated percentage -->
                                    <h2><?Php echo $year2 ?>% <i class="arrow fa-solid fa-angle-up"></i><span class="percent"><?Php echo $total ?>%</span></h2>
                                    <p>Growth Rate</p>
                                    <?php } } ?>
                                    <div class="view-more">
                                    <a href="../View More/growth Rate.php"><p>View More</p></a>
                                    </div>
                                </div>
                        </div>
                        </div>   
                        <div class="c5 mb card-3">
                                <div class="card height-100">
                                    <h3>Marital Status</h3>
                                    <div class="graph1">
                                        <canvas id="maritalstatus" ></canvas><!-- displaying the chart from the script below -->
                                    </div>
                                </div>
                        </div>   
                        <div class="c6 mb card-4">
                                <div class="card height-100">
                                    <h3>Teenage Pregnancy</h3>
                                    <div class="graph2">
                                        <canvas id="teenpreg" ></canvas><!-- displaying the chart from the script below -->
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
        
        <script>//-------------------------- Marital Status -------------------------------
            <?Php 
            //-----Connecting to Database
            try{
                $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);

            } catch(PDOException $ex) {
                    die($ex->getMessage());
                }
                //----- Declaring Variable and Getting Data from database
                $maritalstatus = $dbcon->prepare("SELECT `Status` , `Total` FROM `marital_status_population` WHERE `Year` = $year");
                $maritalstatus->execute();
                $status = [];
                $totalstatus = [];
                while ($row=$maritalstatus->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $status[] = $Status;
                    $totalstatus[] = (int)$Total;
                }

            ?>

            //----- Converting the data from database as json format and making a chart
            const ltx = document.getElementById('maritalstatus').getContext('2d');
            const brgypopulations = new Chart(ltx, {
                type: 'bar',
                data: {
                    labels: 
                        <?Php echo json_encode($status); ?>,
                    datasets: [{
                        label: 'Total Population',
                        data: <?Php echo json_encode($totalstatus); ?>,
                        backgroundColor: [
                            '#92D4E8',
                        ],
                        borderColor: [
                            '#1B85A6',
                        ],
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
<script>//---------------------------Teen pregnancy------------------------------
            <?Php
            //-----Connecting to Database
            try{
                $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);

            } catch(PDOException $ex) {
                    die($ex->getMessage());
                }
                //----- Declaring Variable and Getting Data from database
                $teenpreg = $dbcon->prepare("SELECT `Year` , `Total` FROM `teenage_pregnancy_population` ORDER BY `Year` ASC");
                $teenpreg->execute();
                $year = [];
                $totalstatus = [];
                while ($row=$teenpreg->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $year[] = $Year;
                    $totalstatus[] = (int)$Total;
                }

            ?>
            
            //----- Converting the data from database as json format and making a chart
            const ptx = document.getElementById('teenpreg').getContext('2d');
            const teenpreg = new Chart(ptx, {
                type: 'line',
                data: {
                    labels: 
                        <?Php echo json_encode($year); ?>,
                    datasets: [{
                        label: 'Total Population',
                        data: <?Php echo json_encode($totalstatus); ?>,
                        backgroundColor: [
                            'rgba(146, 212, 232, 0.49)',
                        ],
                        borderColor: [
                            '#1B85A6',
                        ],
                        fill: true,
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