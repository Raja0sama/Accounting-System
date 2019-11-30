<?php
session_start();
error_reporting(1);

include("Connection.php");

 
 if($_SESSION['s_uname'] !="" && $_SESSION['s_pass'] !="")
 {


if (isset($_POST['btnshow'])){
  header("Location: showadjustment.php");
}



if(isset($_POST['projectId']))
{
$myid=$_POST['projectId'];

  echo $myid;
}  


if(isset($_POST['btnadd'])){
  $date = $_POST['datevalue'];
    $date = $_POST['datevalue'];
    $value1 = $_POST['value1'];
  $value2 = $_POST['value2'];
  if($value1 == '')
  {
       echo "<script>alert('Enter Debit Value');</script>";
  }
  elseif($value2 == '')
  {
       echo "<script>alert('Enter Credit Value');</script>";
  }
  elseif($value1 != $value2)
   {
    echo "<script>alert('Debit & Credit Values Should Be Same!');</script>";
   }elseif($date == '')
   {
       echo "<script>alert('Date Is Empty!');</script>";
   }
  else{
  $mainvalue = $_POST['mainvalue'];
  $main = "SELECT accountname FROM `account` where accountid=".$mainvalue;
  $exe2 = mysqli_query($con,$main);
if($exe2){
  while($row2 = mysqli_fetch_array($exe2)){
  $mainaccountvalue1 = $row2['accountname'];
  }
}else{
  echo "problem";
}
  
  $mainvalue1 = $_POST['mainvalue1'];
  $main1 = "SELECT accountname FROM `account` where accountid=".$mainvalue1;
  $exemain1 = mysqli_query($con,$main1);
if($exemain1){
  while($rowmain = mysqli_fetch_array($exemain1)){
  $mainvalue11 = $rowmain['accountname'];
  }
}else{
  echo "problem";
} 
  
  $subvalue = $_POST['subvalue'];
  
  $sub = "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$subvalue;
  $exe4 = mysqli_query($con,$sub);

  if($exe4){
  while($row4 = mysqli_fetch_array($exe4)){
  $subaccountvalue1 = $row4['accountname'];
  }
  
$subvalue1 = $_POST['subvalue1'];
  
  $sub1 = "SELECT  `accountname`, `accountid`, `subid` FROM `subaccount` where subid=".$subvalue1;
  $exesub = mysqli_query($con,$sub1);

  if($exesub){
  while($rowsub = mysqli_fetch_array($exesub)){
  $subvalue11 = $rowsub['accountname'];
  }
  
}
 
  $description = $_POST['description'];

 
  $chartvalue = $_POST['chartvalue'];
  $chart = "SELECT accountname FROM `chartaccount` where chartid=".$chartvalue;
  $exe1 = mysqli_query($con,$chart);
if($exe1){
  while($row1 = mysqli_fetch_array($exe1)){
  $chartaccountvalue1 = $row1['accountname'];
  }
}else{
  echo "problem";
}

  $chartvalue1 = $_POST['chartvalue1'];
  $chart1 = "SELECT accountname FROM `chartaccount` where chartid=".$chartvalue;
  $exechart = mysqli_query($con,$chart1);
if($exechart){
  while($rowchart = mysqli_fetch_array($exechart)){
  $chartaccountvalue11 = $rowchart['accountname'];
  }
}else{
  echo "problem";
}
  
  
   $checkvalue = $_POST['chartvalue'];
   $checkmainvalue = $_POST['mainvalue'];
   $checksubvalue = $_POST['subvalue'];
   $checkvalue1 = $_POST['chartvalue1'];
   $checkmainvalue1 = $_POST['mainvalue1'];
   $checksubvalue1 = $_POST['subvalue1'];
 

   if($checkvalue==1)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` + ".$value1." where chartid=1";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` + ".$value1." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue==2)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` - ".$value1." where chartid=2";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` - ".$value1." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` - ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue==4)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` + ".$value1." where chartid=4";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` + ".$value1." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue==5)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` - ".$value1." where chartid=5";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` - ".$value1." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` - ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue==3)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` - ".$value1." where chartid=3";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` - ".$value1." where accountid=".$checkmainvalue;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` - ".$value1." where subid=".$checksubvalue;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue1==1)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` - ".$value1." where chartid=1";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` - ".$value1." where accountid=".$checkmainvalue1;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` - ".$value1." where subid=".$checksubvalue1;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue1==2)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` + ".$value1." where chartid=2";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` + ".$value1." where accountid=".$checkmainvalue1;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value1." where subid=".$checksubvalue1;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue1==4)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` - ".$value1." where chartid=4";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` - ".$value1." where accountid=".$checkmainvalue1;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` - ".$value1." where subid=".$checksubvalue1;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue1==5)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` + ".$value1." where chartid=5";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` + ".$value1." where accountid=".$checkmainvalue1;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value1." where subid=".$checksubvalue1;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

   if($checkvalue1==3)
{

	  $amountquery = "UPDATE `chartaccount` SET `amount` = `amount` + ".$value1." where chartid=3";
  $exe = mysqli_query($con,$amountquery);

 $amountquery1 = "UPDATE `account` SET `amount` = `amount` + ".$value1." where accountid=".$checkmainvalue1;
  $exe10 = mysqli_query($con,$amountquery1);
 
 $amountquery11 = "UPDATE `subaccount` SET `amount` = `amount` + ".$value1." where subid=".$checksubvalue1;
  $exe101 = mysqli_query($con,$amountquery11);
$checkvalue = "";

}

  }
  $query= "INSERT INTO `adjustment`(`date`, `chartaccount`, `MainAccount`, `subaccount`, `amount`, `chartaccount1`, `MainAccount1`, `subaccount1`, `amount1`, `description`) 
  VALUES ('$date','$chartaccountvalue1','$mainaccountvalue1','$subaccountvalue1',$value1,'$chartaccountvalue11','$mainvalue11','$subvalue11',$value2,'$description')";
  
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

  
error_reporting(1);

?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adjustment</title>
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
            <li class="breadcrumb-item active">adjustment           </li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Basic Form-->
          
              <!-- Form Elements -->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Adjustment</strong></div>
                  <div class="block-body">
                   <form name="form" id="form1" action="" method="post" class="form-horizontal">


<div id="HTMLtoPDF">
  <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-5">
          <label class="col-md-4 control-label" for="selectbasic">No</label>

           <select id="selectbasic" name="selectbasic" class="form-control">
               <?php
$query = "SELECT id FROM adjustment ORDER BY id DESC LIMIT 1;";
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
  <div class="line"> </div>

</br>
  <div class="form-group row">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-md-3">
          <label class="col-md-12 control-label" for="selectbasic">Chart Of Account</label>
<div class="show_product" ></div>
   <select id="chartvalue" name="chartvalue" class="form-control">
<option>Select Account</option>  
  <?php
$query = "SELECT * FROM `chartaccount`";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['chartid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>  
 
 <script>
 
 $(document).ready(function(){  
      $('#chartvalue').change(function(){  
    var brand_id = $(this).val();  
  $.ajax({
        type: "POST",
    url: "Change-status.php",
    data:  { "brand": brand_id },
    dataType: "text",
    error: function(jqXHR,textStatus,errorThrown) {
        // ERROR
    },
    success:function(datos){
  jQuery('#mainvalue').html('');
  jQuery('#mainvalue').html(' <option>Select Account</option>');

              $("#mainvalue").append(datos);
            }
});
  

      });  
 });  
 </script>
 
 
 
</div>
   <div class="col-md-3">
     <label class="col-md-8 control-label" for="selectbasic">Main Account</label>

<select id="mainvalue" name="mainvalue" class="form-control">

</select>  </div>


<div class="col-md-3">
  <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>

<select id="subvalue" name="subvalue" class="form-control">

</select> 

<script>
 
 $(document).ready(function(){  
      $('#mainvalue').change(function(){  
    var brand_id = $(this).val();  
  $.ajax({
        type: "POST",
    url: "Change-status2.php",
    data:  { "brand": brand_id },
    dataType: "text",
    error: function(jqXHR,textStatus,errorThrown) {
        // ERROR
    },
    success:function(datos){
  jQuery('#subvalue').html('');
  jQuery('#subvalue').html('<option>Select Account</option>');
              $("#subvalue").append(datos);
       
            }
});
  


      });  
 });  
 </script>
 </div>


<div class="col-md-3">
  <label class="col-md-8 control-label" for="selectbasic">Debit</label>
<input class="col-md-8 form-control" id="value1" name="value1" placeholder="Rs." type="number"></input>

    </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-3">
    </div>
     <div class="col-md-3">
  </select>  </div>




          </div>
  </div>




  </div>

  <div id="HTMLtoPDF">
  <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">
      </div>
    </div>
  </div>
  <div class="line"> </div>

  <div class="form-group row">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-md-3">
          <label class="col-md-12 control-label" for="selectbasic">Chart Of Account</label>
<div class="show_product" ></div>
   <select id="chartvalue1" name="chartvalue1" class="form-control">
<option>Select Account</option>  
  <?php
$query = "SELECT * FROM `chartaccount`";
$exe = mysqli_query($con,$query);
if($exe){
  while($row = mysqli_fetch_array($exe)){
  ?>
<option value= "<?php echo $row['chartid']; ?>"><?php echo $row['accountname']; ?></option> 
<?php }
}else{
  echo "problem";
}
?>  </select>  
 
 <script>
 
 $(document).ready(function(){  
      $('#chartvalue1').change(function(){  
    var brand_id = $(this).val();  
  $.ajax({
        type: "POST",
    url: "Change-status.php",
    data:  { "brand": brand_id },
    dataType: "text",
    error: function(jqXHR,textStatus,errorThrown) {
        // ERROR
    },
    success:function(datos){
  jQuery('#mainvalue1').html('');
  jQuery('#mainvalue1').html(' <option>Select Account</option>');

              $("#mainvalue1").append(datos);
            }
});
  

      });  
 });  
 </script>
 
 
 
</div>
   <div class="col-md-3">
     <label class="col-md-8 control-label" for="selectbasic">Main Account</label>

<select id="mainvalue1" name="mainvalue1" class="form-control">

</select>  </div>


<div class="col-md-3">
  <label class="col-md-8 control-label" for="selectbasic">Sub Account</label>

<select id="subvalue1" name="subvalue1" class="form-control">

</select> 

<script>
 
 $(document).ready(function(){  
      $('#mainvalue1').change(function(){  
    var brand_id = $(this).val();  
  $.ajax({
        type: "POST",
    url: "Change-status2.php",
    data:  { "brand": brand_id },
    dataType: "text",
    error: function(jqXHR,textStatus,errorThrown) {
        // ERROR
    },
    success:function(datos){

        jQuery('#subvalue1').html('');
        jQuery('#subvalue1').html('<option>Select Account</option>');
  
              $("#subvalue1").append(datos);
       
  
            }
});
  


      });  
 });  
 </script>
 </div>


<div class="col-md-3">
  <label class="col-md-8 control-label" for="selectbasic">Credit</label>
<input class="col-md-8 form-control" id="value2" name="value2" placeholder="Rs." type="number"></input>

    </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-3">
    </div>
     <div class="col-md-3">
  </select>  </div>




       

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
				

	<!-- these js files are used for making PDF -->
	<script src="js/jspdf.js"></script>
	<script src="js/jquery-2.1.3.js"></script>
	<script src="js/pdfFromHTML.js"></script>
                    </form>
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
  </body>

</html>