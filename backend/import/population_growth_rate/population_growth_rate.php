<?php
    session_start();

    if(isset($_SESSION['User']))
    {
    }
    else
    {
        header("location:../loginform.html");
    }

?>
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "analyticsdb");
$message = '';

if(isset($_POST["upload"]))
{
 if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");
   $junk = fgetcsv($handle,2000,",");
   while($data = fgetcsv($handle))
   {
    $Id = mysqli_real_escape_string($connect, $data[0]);  
    $Year = mysqli_real_escape_string($connect, $data[1]);  
    $Total = mysqli_real_escape_string($connect, $data[2]);
    $Percentage = mysqli_real_escape_string($connect, $data[3]);
    $sql="SELECT * FROM `population_growth_rate` where `Year`='$Year' limit 1";
      $result = mysqli_query($connect,$sql);
      if(mysqli_num_rows($result)==1){
        header("location: population_growth_rate.php?fail=1");
      }else{
        $query = "
        INSERT INTO `population_growth_rate` 
        SET 
        `id` = '$Id', 
        `Year` = '$Year', 
        `Total` = '$Total', 
        `Percentage` = '$Percentage'
       ";
       mysqli_query($connect, $query); 
       header("location: population_growth_rate.php?updation=1");
     }
       
     }
     fclose($handle);
    } else { ?>
      <div class="fail1" data-flashdata="<?php echo $_POST['upload'];?>"></div>
    <?php }
  } else { ?>
    <div class="fail2" data-flashdata="<?php echo $_POST['upload'];?>"></div>
  <?php } }

if(isset($_GET["updation"]))
{ ?>
  <div class="updation" data-flashdata="<?php echo $_GET['updation'];?>"></div>
<?php }

if(isset($_GET["fail"]))
{ ?>
  <div class="fail3" data-flashdata="<?php echo $_GET['fail'];?>"></div>
<?php }

$query = "SELECT * FROM `population_growth_rate`";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
 <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css">
  <title>Population's Data</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/import2.css">
  <link rel="stylesheet" href="../../../font-awesome/css/all.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body class="modal-open">
   <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
   
   <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <form action="action/delete_population_growth_rate.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4>Are you sure you want to delete this data?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

   <div class="navbar"><h1>Biñan Analytica<h1>
   <a href="../../manage_data.php"><h1><i class="fa fa-solid fa-circle-arrow-left fa-lg"></i></h1></a>   </div>
  <div class="container">
   <h2>Import Growth  Rate Data</h2>
   <form method="post" enctype='multipart/form-data'>
    <p><span>Please Select File *CSV format Only</span></p>
    <p><input type="file" name="product_file" /></p>
    <input type="submit" name="upload" class="btn" value="Upload"/>
   </form>
   <?php echo $message; ?>
   <h3>Growth  Rate</h3>
   <br />
   <div class="table-responsive">
    <table class="table">
     <tr>
      <th>ID</th>
      <th>Year</th>
      <th>Population</th>
      <th>Percentage</th>
      <th>Action</th>
     </tr>
     <?php
			  $i = 0;
			  while($rows = mysqli_fetch_assoc($result)){
			  $i++;
      ?>
      <tr>
       <td><?=$rows['id']?></td>
       <td><?=$rows['Year']?></td>
       <td><?=$rows['Total']?></td>
       <td><?=$rows['Percentage']?></td>
       <td><button type="button" class="btn btn-danger deletebtn"> Delete </button></td>
      </tr>
    <?php } ?>
    </table>
   </div>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

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
    const updation = $('.updation').data('flashdata')
    if(updation) {
      Swal.fire({
    icon: 'success',
    title: 'Data Imported Successfully',
    showConfirmButton: false,
    timer: 1500
})
    }
    
    const fail1 = $('.fail1').data('flashdata')
    if(fail1) {
      Swal.fire({
        confirmButtonColor: '#2cabd3',
    icon: 'error',
    text: 'Please Select File *CSV format Only',
})
    }
    const fail2 = $('.fail2').data('flashdata')
    if(fail2) {
      Swal.fire({
        confirmButtonColor: '#2cabd3',
    icon: 'error',
    text: 'Please Select File',
})
    }

    const fail3 = $('.fail3').data('flashdata')
    if(fail3) {
      Swal.fire({
        confirmButtonColor: '#2cabd3',
    icon: 'error',
    text: 'Data with same value will not included the rest will be imported',
})
    }
        
    </script>
 </body>
</html>