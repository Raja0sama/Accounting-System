<?php
session_start();
error_reporting(1);

include("Connection.php");

 
 if($_SESSION['s_uname'] !="" && $_SESSION['s_pass'] !="")
 {



if (isset($_POST['btnshow'])){
  header("Location: showinvoicedesign.php");
}


if(isset($_POST['projectId']))
{
$myid=$_POST['projectId'];

  echo $myid;
}  


if(isset($_POST['btnadd'])){
  $date = $_POST['datevalue'];
    $date = $_POST['datevalue'];
   if ($date === '')
   {
    echo "<script>alert('Date Is empty');</script>";
   }
  else{
  //$mainvalue = $_POST['mainvalue'];
  //$main = "SELECT accountname FROM `account` where accountid=".$mainvalue;
  //$exe2 = mysqli_query($con,$main);
//if($exe2){
//  while($row2 = mysqli_fetch_array($exe2)){
//  $mainvalue1 = $row2['accountname'];
/// }
//}else{
//  echo "problem";
//}
  

  
  $subvalue = $_POST['subvalue'];
  
  $sub = "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$_POST['subvalue'];
  $exe4 = mysqli_query($con,$sub);

  if($exe4){
  while($row4 = mysqli_fetch_array($exe4)){
  $subvalue1 = $row4['accountname'];
  }
}
$sub1= "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$_POST['subvalue1'];
  $exe41 = mysqli_query($con,$sub1);

  if($exe41){
  while($row41 = mysqli_fetch_array($exe41)){
  $subvalue11 = $row41['accountname'];
  }
}
$sub11= "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$_POST['subvalue2'];
  $exe411 = mysqli_query($con,$sub11);

  if($exe411){
  while($row411 = mysqli_fetch_array($exe411)){
  $subvalue22 = $row411['accountname'];
  }
}
$sub111= "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$_POST['subvalue3'];
  $exe4111 = mysqli_query($con,$sub111);

  if($exe4111){
  while($row4111 = mysqli_fetch_array($exe4111)){
  $subvalue33 = $row4111['accountname'];
  }
}
$sub1111= "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$_POST['subvalue4'];
  $exe41111 = mysqli_query($con,$sub1111);

  if($exe41111){
  while($row41111 = mysqli_fetch_array($exe41111)){
  $subvalue44 = $row41111['accountname'];
  }
}
$sub11111= "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$_POST['subvalue5'];
  $exe411111 = mysqli_query($con,$sub11111);

  if($exe411111){
  while($row411111 = mysqli_fetch_array($exe411111)){
  $subvalue55 = $row411111['accountname'];
  }
}
  
      $cussub = "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$_POST['Customer'];
  $cexe4 = mysqli_query($con,$cussub);

  if($cexe4){
  while($crow4 = mysqli_fetch_array($cexe4)){
  $Customervalue11 = $crow4['accountname'];
  }
}
  
  
  $description = $_POST['description'];
  $value1 = $_POST['value1'];
  $value2 = $_POST['value2'];
  $value3 = $_POST['value3'];
  $value4 = $_POST['value4'];
  $value5 = $_POST['value5'];
  $value6 = $_POST['value6'];

  $bill = $_POST['bill'];
  $billquery = "SELECT `accountname` FROM `account` WHERE `accountid` = 1";
    $billexe = mysqli_query($con,$billquery);
if($billexe){
  while($billrow = mysqli_fetch_array($billexe)){
  $bill01 = $billrow['accountname'];
  }
}
  

  
  $paymentsum = $value1+$value2+$value3+$value4+$value5+$value6;

  
 $queryReceivable = "UPDATE `account` SET `amount` = `amount` + ".$paymentsum." where accountname='A/c Receivable'";
    $exequeryReceivable = mysqli_query($con,$queryReceivable);

	$queryincome = "UPDATE `account` SET `amount` = `amount` + ".$paymentsum." where accountid=2";
    $exequeryincome = mysqli_query($con,$queryincome);

	
	   $subquery = "UPDATE `subaccount` SET `amount` = `amount` + ".$paymentsum." where subid=".$_POST['Customer'];
  $exesubby = mysqli_query($con,$subquery);

  if($value1 !="")
{
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value1." where subid=".$_POST['subvalue'];
  $exe101 = mysqli_query($con,$amountquery11);

}
if($value2 !="")
{
 $amountquery111 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value2." where subid=".$_POST['subvalue1'];
  $exe1011 = mysqli_query($con,$amountquery111);


}
if($value3 !="")
{
 $amountquery1111 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value3." where subid=".$_POST['subvalue2'];
  $exe10111 = mysqli_query($con,$amountquery1111);

}
if($value4 !="")
{
 $amountquery11111 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value4." where subid=".$_POST['subvalue3'];
  $exe101111 = mysqli_query($con,$amountquery11111);


}
if($value5 !="")
{
 $amountquery111111 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value5." where subid=".$_POST['subvalue4'];
  $exe1011111 = mysqli_query($con,$amountquery111111);


}
if($value6 !="")
{
 $amountquery1111111 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value6."' where subid=".$_POST['subvalue5'];
  $exe10111111 = mysqli_query($con,$amountquery1111111);


}
  
  $query= "INSERT INTO `invoice`(  `Date`, `Bill`, `Customer`, `subaccount`, `subaccount1`, `subaccount2`, `subaccount3`, `subaccount4`, `subaccount5`, 
  `amountvalue`, `amountvalue1`, `amountvalue2`, `amountvalue3`, `amountvalue4`, `amountvalue5`, `Description`, `Total`) 
  VALUES ('$date','$bill01','$Customervalue11','$subvalue1','$subvalue11','$subvalue22','$subvalue33','$subvalue44','$subvalue55',$value1,$value2,$value3,$value4,$value5,$value6,'$description',$paymentsum)";
  
  $exe = mysqli_query($con,$query);
  if($exe){
    echo "";
    echo "<script>alert('Inserted')</script>";
  }else{
    echo "failed";
  }
  
  
  }
  }
  }else{
   header('Location:login.php');
 }
?>


<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice</title>
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

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
     <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
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
          
      </nav>
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
         <?php include("sidebar.php"); ?>     <div class="page-content">
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
            <li class="breadcrumb-item active">Invoice           </li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Basic Form-->
          
              <!-- Form Elements -->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Invoice</strong></div>
                  <div class="block-body">
                   <form name="form" id="form1" action="" method="post">

<div >

  <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-5">
          <label class="col-md-4 control-label" for="selectbasic">No</label>

           <select id="selectbasic" name="selectbasic" class="form-control">
               <?php
$query = "SELECT id FROM invoice ORDER BY id DESC LIMIT 1;";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['id']; ?>"><?php echo "".$row['id']+1; ?></option>  
<?php }
}else{
  echo "problem";
}
?> 
           </select>
        </div>
        <div class="col-md-4">
          <label class="col-md-4 control-label" for="selectbasic" class="form-control">Date</label>

           <input type="date" id="datevalue" name="datevalue" class="form-control"
                  value="2018-00-00 "
                  min="2018-01-01" max="2018-12-31" />
       </div>
      </div>
    </div>
  </div>
   <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-5">
          <label class="col-md-4 control-label" for="selectbasic">Bill</label>

               <select id="bill" name="bill" class="form-control">
 
      <?php
$query = "SELECT * FROM `account` WHERE `accountname` = 'A/c Receivable'";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['accountid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>  
        </div>
        <div class="col-md-4">
          <label class="col-md-4 control-label" for="selectbasic" class="form-control">Customer</label>

           
 
 <select id="Customer" name="Customer" class="form-control">
     <option>Select Account</option>    
 <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =1";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>  
       </div>
      </div>
    </div>
  </div>
</br>
  <div class="form-group row">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-md-4">
          <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>
<div class="show_product" ></div>
   <select id="subvalue" name="subvalue" class="form-control">
<option>Select Account</option>  
 <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>  
 
 

</div>
 

<div class="col-md-3">
  <label class="col-md-8 control-label" for="selectbasic">Amount</label>
<input class="col-md-8 form-control" id="value1" name="value1" placeholder="Rs." type="text" value="0"></input>

    </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-4">
  <br>       
       <select id="subvalue1" name="subvalue1" class="form-control">
       
<option>Select Account</option>  
    <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>   </select>  
    </div>


  <div class="col-md-3">
  
<br>
   <input class="col-md-8 form-control" id="value2" name="value2" placeholder="Rs." type="text" value="0"></input>

      </div>
      </div>


    <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-4">
  <br>       
       <select id="subvalue2" name="subvalue2" class="form-control">
       
<option>Select Account</option>  
     <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>  
    </div>


  <div class="col-md-3">
  
<br>
   <input class="col-md-8 form-control" id="value3" name="value3" placeholder="Rs." type="text" value="0"></input>

      </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-4">
  <br>       
       <select id="subvalue3" name="subvalue3" class="form-control">
       
<option>Select Account</option>  
   <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?> </select>  
    </div>


  <div class="col-md-3">
  
<br>
   <input class="col-md-8 form-control" id="value4" name="value4" placeholder="Rs." type="text" value="0"></input>

      </div>
      </div>

    <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-4">
  <br>       
       <select id="subvalue4" name="subvalue4" class="form-control">
       
<option>Select Account</option>  
  <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?></select>  
    </div>



  <div class="col-md-3">
  
<br>
   <input class="col-md-8 form-control" id="value5" name="value5" placeholder="Rs." type="text" value="0"> </input>

      </div>
      </div>

    <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-4">
  <br>       
       <select id="subvalue5" name="subvalue5" class="form-control">
       
<option>Select Account</option>  
      <?php
$query = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =2";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>  
    </div>





  <div class="col-md-3">
  
<br>
   <input class="col-md-8 form-control" id="value6" name="value6" placeholder="Rs." type="text" value="0"></input>

      </div>
      </div>

<hr>
        <div class="form-group row">
          <div class="col-sm-12">
            <div class="row">
  
              <div class="col-md-4">
             <label class="col-md-8 control-label" for="selectbasic">Total</label>

        </div>
 


        <div class="col-md-3">
        <label class="col-md-8 control-label" for="selectbasic">Rs.<?php

if(isset($_POST['btnadd'])){
  $value1 = $_POST['value1'];
  $value2 = $_POST['value2'];
  $value3 = $_POST['value3'];
  $value4 = $_POST['value4'];
  $value5 = $_POST['value5'];
  $value6 = $_POST['value6'];
  
  $sum = $value1+$value2+$value3+$value4+$value5+$value6;
  
  echo $sum;
  }

    ?></label>

          </div>
          </div>
  </div>



   
  </div>



                    <div class="form-horizontal">
                      <div class="form-group row">

                        <label class="col-sm-1 form-control-label">Description</label>
                        <div class="col-sm-5">

                          <textarea class="form-control" id="description" name="description"></textarea>

                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-12 ml-auto">
                          <button type="submit" class="btn btn-secondary">Cancel</button>
              <button type="submit" class="btn btn-primary" name="btnshow" id="btnadd">Show All</button>
                          <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd">Add To Database</button>
             
              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

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
  </body>
</html>