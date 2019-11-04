 <?php include("Connection.php");
 $id = $_GET['id'];

  if(isset($_POST['btncancle'])){
 ?>
    <script> location.replace("showinvoicedesign.php"); </script>
    <?php }
 if(isset($_POST['btnshow'])){
  $date = $_POST['date'];
  $bill = $_POST['bill'];
  $Customer = $_POST['Customer'];
  $SubAccount = $_POST['SubAccount'];
  $SubAccount1 = $_POST['SubAccount1'];
   $Subaccount2 = $_POST['SubAccount2'];
     $Subaccount3 = $_POST['SubAccount3'];
	   $Subaccount4 = $_POST['SubAccount4'];
	    $Subaccount5 = $_POST['SubAccount5'];

		$Amount = $_POST['Amount'];
		  $Amount1 = $_POST['Amount1'];
   $Amount2 = $_POST['Amount2'];
     $Amount3 = $_POST['Amount3'];
	   $Amount4 = $_POST['Amount4'];
	    $Amount5 = $_POST['Amount5']; 
$sum =  $Amount+$Amount1+$Amount2+$Amount3+$Amount4+$Amount5;


		 $selecttotal = "SELECT `Total` FROM `invoice` WHERE id = ".$_GET['id'];
    $sexe = mysqli_query($con,$selecttotal);
    $rowwef = mysqli_fetch_array($sexe);

 $selecttota1 = "SELECT * FROM `invoice` WHERE id = ".$_GET['id'];
    $sexe1 = mysqli_query($con,$selecttota1);
    $amounts = mysqli_fetch_array($sexe1);
 
  if($Amount !="")
  {
   $l1 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[10] where `accountname`='".$_POST['SubAccount']."' And `accountid` = 2";
   $exel1 = mysqli_query($con,$l1);

$ll1 =  "UPDATE `subaccount` SET `amount` = `amount` + $Amount where `accountname`='".$_POST['SubAccount']."' And `accountid` = 2";
   $exell1 = mysqli_query($con,$ll1);
      
  }

  if($Amount1 !="")
  {
   $l11 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[11] where `accountname`='".$_POST['SubAccount1']."' And `accountid` = 2";
   $exel11 = mysqli_query($con,$l11);

$ll11 =  "UPDATE `subaccount` SET `amount` = `amount` + $Amount1 where `accountname`='".$_POST['SubAccount1']."' And `accountid` = 2";
   $exell11 = mysqli_query($con,$ll11);
     
  }
if($Amount2 !="")
  {
   $l111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[12] where `accountname`='".$_POST['SubAccount2']."' And `accountid` = 2";
   $exel111 = mysqli_query($con,$l111);

$ll111 =  "UPDATE `subaccount` SET `amount` = `amount` + $Amount2 where `accountname`='".$_POST['SubAccount2']."' And `accountid` = 2";
   $exell111 = mysqli_query($con,$ll111);
   
  }
if($Amount3 !="")
  {
   $l1111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[13] where `accountname`='".$_POST['SubAccount3']."' And `accountid` = 2";
   $exel1111 = mysqli_query($con,$l1111);

$ll1111 =  "UPDATE `subaccount` SET `amount` = `amount` + $Amount3 where `accountname`='".$_POST['SubAccount3']."' And `accountid` = 2";
   $exell1111 = mysqli_query($con,$ll1111);
   
  }
if($Amount4 !="")
  {
   $l11111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[14] where `accountname`='".$_POST['SubAccount4']."' And `accountid` = 2";
   $exel11111 = mysqli_query($con,$l11111);

$ll11111 =  "UPDATE `subaccount` SET `amount` = `amount` + $Amount4 where `accountname`='".$_POST['SubAccount4']."' And `accountid` = 2";
   $exell11111 = mysqli_query($con,$ll11111);
     
  }
if($Amount5 !="")
  {
   $l111111 =  "UPDATE `subaccount` SET `amount` = `amount` - $amounts[15] where `accountname`='".$_POST['SubAccount5']."' And `accountid` = 2";
   $exel111111 = mysqli_query($con,$l111111);

$ll111111 =  "UPDATE `subaccount` SET `amount` = `amount` + $Amount5 where `accountname`='".$_POST['SubAccount5']."' And `accountid` = 2";
   $exell111111 = mysqli_query($con,$ll111111);
    
  }


 $selectcus = "SELECT `subid` FROM `subaccount` WHERE `accountname`= '".$_POST['Customer']."' And accountid=1";
    $cusexe = mysqli_query($con,$selectcus);
    $rowcus = mysqli_fetch_array($cusexe);

$cus = "UPDATE `subaccount` SET `amount` = `amount` - $rowwef[0] where `subid`=".$rowcus[0];
    $execuse = mysqli_query($con,$cus);
   
    $cus1 = "UPDATE `subaccount` SET `amount` = `amount` + ".$_POST['Total']." where `subid`=".$rowcus[0];
    $execuse1 = mysqli_query($con,$cus1);
 

 $re = "UPDATE `account` SET `amount` = `amount` - $rowwef[0] where accountname='A/c Receivable'";
    $exere = mysqli_query($con,$re);


  $queryin = "UPDATE `account` SET `amount` = `amount` - $rowwef[0] where accountid=2";
    $exequeryin = mysqli_query($con,$queryin);





		$deletequery = "DELETE FROM `invoice` WHERE id =".$id;
    $deleteexe = mysqli_query($con,$deletequery);
  



 $queryReceivable = "UPDATE `account` SET `amount` = `amount` + $sum where accountname='A/c Receivable'";
    $exequeryReceivable = mysqli_query($con,$queryReceivable);

  $queryincome = "UPDATE `account` SET `amount` = `amount` + $sum where accountid=2";
    $exequeryincome = mysqli_query($con,$queryincome);

  $insertquery = "INSERT INTO `invoice`(`id`, `Date`, `Bill`, `Customer`, `subaccount`, `subaccount1`, `subaccount2`, `subaccount3`, `subaccount4`, `subaccount5`, `amountvalue`, `amountvalue1`, `amountvalue2`, `amountvalue3`, `amountvalue4`, `amountvalue5`, `Description`, `Total`) VALUES ($id,'".$_POST['date']."','".$_POST['bill']."','".$_POST['Customer']."','".$_POST['SubAccount']."','".$_POST['SubAccount1']."','".$_POST['SubAccount2']."','".$_POST['SubAccount3']."','".$_POST['SubAccount4']."','".$_POST['SubAccount5']."',".$_POST['Amount'].",".$_POST['Amount1'].",".$_POST['Amount2'].",".$_POST['Amount3'].",".$_POST['Amount4'].",".$_POST['Amount5'].",'".$_POST['Description']."',".$sum.")";




  $exe = mysqli_query($con,$insertquery);
  if($exe){
  ?>
    <script> location.replace("showinvoicedesign.php"); </script>
    <?php
  }else{
    echo "failed";
	
  }
	
   

}




 

?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PaymentVoucherRecords</title>
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
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
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
      <?php include("sidebar.php"); ?>        <div class="page-content">
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
            <li class="breadcrumb-item active">edit           </li>
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
                  <div class="title"><strong>Edit Invoice</strong></div>
                  <div class="block-body">
                 <form name="form" id="form1" action="" method="post">

<div >

<?php

$select = mysqli_query($con, "Select * from data");
$select1 = mysqli_query($con, "SELECT * FROM `chartaccount`");

?>



<?php

 $query1 = mysqli_query($con,"Select * from invoice WHERE `id` = ".$id);
 
while($row = mysqli_fetch_array($query1))
{
	?>

  
     <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic" >ID</label>
   <input class="form-control"  value="<?php echo $row[0] ?>" readonly></input>

        </div>
		
		
     
      </div>
    </div>
  </div>

       <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
   <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Date</label>
   <input class="form-control" id="date" name="date" value="<?php echo $row[1] ?>" ></input>

        </div>
		
		
     
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">

		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">BILL</label>
   <input class="form-control" id="bill" name="bill" value="<?php echo $row[2] ?>"></input>

        </div>
		
     
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">

		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Customer</label>
   <input class="form-control" id="Customer" name="Customer" value="<?php echo $row[3] ?>"></input>

        </div>
  		
     
      </div>
    </div>
  </div>

     <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">

		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Sub Account</label>

             <select id="SubAccount" name="SubAccount" class="form-control">
<option value="">Select Account</option>  
 <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row1 = mysqli_fetch_array($exe)){
  ?>
<option 
<?php if($row1['accountname'] == $row[4])
{
  echo "selected='selected'";
}
 ?>
 value= "<?php echo $row1['accountname']; ?>"><?php echo $row1['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>
        </div>
  		
     
      </div>
    </div>
  </div>

       <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Sub Account1</label>

                       <select id="SubAccount1" name="SubAccount1" class="form-control">
<option value="">Select Account</option>  
 <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row1 = mysqli_fetch_array($exe)){
  ?>
<option 
<?php if($row1['accountname'] == $row[5])
{
  echo "selected='selected'";
}
 ?>
 value= "<?php echo $row1['accountname']; ?>"><?php echo $row1['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>
 
       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Sub Account2</label>
<select id="SubAccount2" name="SubAccount2" class="form-control">
<option value="">Select Account</option>  
 <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row1 = mysqli_fetch_array($exe)){
  ?>
<option 
<?php if($row1['accountname'] == $row[6])
{
  echo "selected='selected'";
}
 ?>
 value= "<?php echo $row1['accountname']; ?>"><?php echo $row1['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>

       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Sub Account3</label>
          <select id="SubAccount3" name="SubAccount3" class="form-control">
<option value="">Select Account</option>  
 <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row1 = mysqli_fetch_array($exe)){
  ?>
<option 
<?php if($row1['accountname'] == $row[7])
{
  echo "selected='selected'";
}
 ?>
 value= "<?php echo $row1['accountname']; ?>"><?php echo $row1['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>

       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Sub Account4</label>
                    <select id="SubAccount4" name="SubAccount4" class="form-control">
          <option value="">Select Account</option>  
           <?php
          $query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
          $exe = mysqli_query($con,$query);
          if($exe){
            while($row1 = mysqli_fetch_array($exe)){
            ?>
          <option 
          <?php if($row1['accountname'] == $row[8])
          {
            echo "selected='selected'";
          }
           ?>
           value= "<?php echo $row1['accountname']; ?>"><?php echo $row1['accountname']; ?></option> 
          <?php }
          }else{
            echo "problem";
          }
          ?>  </select>
  
       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Sub Account5</label>
                      <select id="SubAccount5" name="SubAccount5" class="form-control">
          <option value="">Select Account</option>  
           <?php
          $query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
          $exe = mysqli_query($con,$query);
          if($exe){
            while($row1 = mysqli_fetch_array($exe)){
            ?>
          <option 
          <?php if($row1['accountname'] == $row[9])
          {
            echo "selected='selected'";
          }
           ?>
           value= "<?php echo $row1['accountname']; ?>"><?php echo $row1['accountname']; ?></option> 
          <?php }
          }else{
            echo "problem";
          }
          ?>  </select>

       </div>
      </div>
    </div>
  </div>
  
     
         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount</label>
   <input class="form-control" id="Amount" name="Amount" value="<?php echo $row[10] ?>"></input>
       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount1</label>
   <input class="form-control" id="Amount1" name="Amount1" value="<?php echo $row[11] ?>"></input>
       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount2</label>
   <input class="form-control" id="Amount2" name="Amount2" value="<?php echo $row[12] ?>"></input>
       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount3</label>
   <input class="form-control" id="Amount3" name="Amount3" value="<?php echo $row[13] ?>"></input>
       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount4</label>
   <input class="form-control" id="Amount4" name="Amount4" value="<?php echo $row[14] ?>"></input>
       </div>
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount5</label>
   <input class="form-control" id="Amount5" name="Amount5" value="<?php echo $row[15] ?>"></input>
       </div>
      </div>
    </div>
  </div>
  
  
   
         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Description</label>
   <input class="form-control" id="Description" name="Description" value="<?php echo $row[16] ?>"></input>
       </div>
      </div>
    </div>
  </div>
  
  
         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount Total</label>
   <input class="form-control" id="Total" name="Total" value="<?php echo $row[17] ?>"></input>
       </div>
      </div>
    </div>
  </div>
  
   <button type="submit" class="btn btn-secondary" name="btncancle">Cancel</button>
<button type="submit" class="btn btn-primary" name="btnshow" id="btnadd">Update Invoice</button>


 </div>
              </form>

<?php
}
?>
			  </div>
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