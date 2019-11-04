<?php
 session_start();
error_reporting(1);
include("Connection.php");
 
 if($_SESSION['s_uname'] !="" && $_SESSION['s_pass'] !="")
 {
     
     $myid = $_GET['id'];
$myid = $_GET['id'];
if($myid)
{

     $selecttotal = "SELECT `Total` FROM `invoice` WHERE id = ".$_GET['id'];
    $sexe = mysqli_query($con,$selecttotal);
    $rowwef = mysqli_fetch_array($sexe);
 
  $selecttota1 = "SELECT * FROM `invoice` WHERE id = ".$_GET['id'];
    $sexe1 = mysqli_query($con,$selecttota1);
    $amounts = mysqli_fetch_array($sexe1);
 
  
   $l1 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[10] where `accountname`='".$amounts[4]."' And `accountid` = 2";
   $exel1 = mysqli_query($con,$l1);

 $l11 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[11] where `accountname`='".$amounts[5]."' And `accountid` = 2";
   $exel11 = mysqli_query($con,$l11);

   $l111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[12] where `accountname`='".$amounts[6]."' And `accountid` = 2";
   $exel111 = mysqli_query($con,$l111);

   $l1111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[13] where `accountname`='".$amounts[7]."' And `accountid` = 2";
   $exel1111 = mysqli_query($con,$l1111);

   $l11111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[14] where `accountname`='".$amounts[8]."' And `accountid` = 2";
   $exel11111 = mysqli_query($con,$l11111);

   $l111111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[15] where `accountname`='".$amounts[9]."' And `accountid` = 2";
   $exel111111 = mysqli_query($con,$l111111);

 
 $selectcus = "SELECT `subid` FROM `subaccount` WHERE `accountname`= '".$amounts[3]."' And accountid=1";
    $cusexe = mysqli_query($con,$selectcus);
    $rowcus = mysqli_fetch_array($cusexe);


 $re = "UPDATE `account` SET `amount` = `amount` - $amounts[17] where accountname='A/c Receivable'";
    $exere = mysqli_query($con,$re);


  $queryin = "UPDATE `account` SET `amount` = `amount` - $amounts[17] where accountid=2";
    $exequeryin = mysqli_query($con,$queryin);


    $deletequery = "DELETE FROM `invoice` WHERE id =".$_GET['id'];
    $deleteexe = mysqli_query($con,$deletequery);

if(deleteexe) 
{
  echo "<script type='text/javascript'>
alert('Id ".$myid." record have been Deleted!');
  </script>";
} else
{
  echo "<script type='text/javascript'>
alert('Error Found');
  </script>";
}

  
}
 ?>


<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InvoiceRecords</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon1.png">
<link rel="stylesheet" type="text/css" href="css/datatable.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
 

   <!-- Favicon-->


    </head>

   
  <body >
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form name="form" id="form1" action="" method="post">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="paymentdesign.php" class="navbar-brand">
                 <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dash</strong><strong>Board</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">DF</strong><strong>M</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
      
            <!-- Log out               -->
            <div class="list-inline-item logout">                   <a id="logout" href="signout.php" class="nav-link">Logout <i class="icon-logout"></i></a></div>
          
        
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/Mylogo.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">SSA</h1>
            <p>(Super-Sami.com)</p>
          </div>
        </div>
     <?php include("sidebar.php"); ?>    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Super Sami Accounting Managments</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="paymentdesign.php">Home</a></li>
            <li class="breadcrumb-item active">invoice           </li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Basic Form-->
          
              <!-- Form Elements -->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Invoice Records</strong></div>
                  <div class="block-body">
                 <form name="form" id="form1" action="" method="post">

<div >

<?php

$select = mysqli_query($con, "Select * from data");
$select1 = mysqli_query($con, "SELECT * FROM `invoice`");

?>

<br>
<div align="center" id="txtshow">
  <div class="table-responsive">  
<table id="tables" class="display" >
<thead>
<tr class="table-active">
<th>Print</th>
<th>Edit|Delete	</th>
<th>ID</th>
<th>Date</th>
<th>Bill</th>
<th>Customer</th>
<th>SubAccount</th>
<th>SubAccount1</th>
<th>SubAccount2</th>
<th>SubAccount3</th>
<th>SubAccount4</th>
<th>SubAccount5</th>
<th>Total</th>


</tr>
<thead>
<tbody>
<?php

while($row = mysqli_fetch_array($select1))
{
  $tabledata = '<tr >
 <td><a href="printinvoice.php?id='.$row[0].'">Print</a></th>
<td><a href="invoiceedit.php?id='.$row[0].'">Edit</a> | <a href="?id='.$row[0].'">Delete</a></td>
 
 <td class="table-active">'.$row[0].'</td>
  <td class="table-secondary">'.$row[1].'</td>
  <td>'.$row[2].'</td>
  <td>'.$row[3].'</td>
  <td >'.$row[4].'</td>
  <td>'.$row[5].'</td>
  <td>'.$row[6].'</td>
  <td>'.$row[7].'</td>
  <td>'.$row[8].'</td>
  <td>'.$row[9].'</td>

 <td class="table-active">'.$row[17].'</td>	
 
 	 

  
  </tr>';
  echo $tabledata;
  }

?>
<tbody>
</table></div></div>
              </form> </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://super-sami.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="no-margin-bottom">2020&copy; Super-Sami Design by <a href="https://super-sami.com">Raja Osama - Theme used of Bootstrap</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
	
	
	
	
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>   
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>   
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>   
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pSSAake/0.1.36/pSSAake.min.js"></script>   
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pSSAake/0.1.36/vfs_fonts.js"></script>   
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>   




	  
	  <script>
	   $(document).ready( function () {
    $('#tables').DataTable({
		   
			 dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]

	});
} );

</script>
	
  </body>
</html>

<?php

}else{
   header('Location:login.php');
 }

  

?>