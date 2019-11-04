  
 <?php include("Connection.php");
 $id = $_GET['id'];
  if(isset($_POST['btncancle'])){
  header("Location: http://localhost/accounting/chartofaccount.php");
  }
 if(isset($_POST['btnshow'])){
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  
    $chartid = $_POST['chartid'];

	$query= "UPDATE `chartaccount` SET `accountname` = '".$name."',`amount` = '".$amount."',`chartid` = '".$chartid."' where id=".$id;
  
  $exe = mysqli_query($con,$query);
  if($exe){
    
     header("Location: http://localhost/accounting/chartofaccount.php");
  }else{
    echo "failed";
	
  }
	
}


 ?>
  <form name="form" id="form1" action="" method="post">

<div >

<?php

$select = mysqli_query($con, "Select * from data");
$select1 = mysqli_query($con, "SELECT * FROM `suppliers`");

?>

<br>

<?php

 $query1 = mysqli_query($con,"Select * from suppliers WHERE `SupplierId` = ".$id);
 
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
          <label class="col-md-5 control-label" for="selectbasic">Account Name</label>
   <input class="form-control" id="name" name="name" value="<?php echo $row[1] ?>" ></input>

        </div>
		
		
     
      </div>
    </div>
  </div>

         <div class="form-group row">
    <div class="col-sm-9">
      <div class="row">

		 <div class="col-md-5">
          <label class="col-md-5 control-label" for="selectbasic">Amount</label>
   <input class="form-control" id="amount" name="amount" value="<?php echo $row[2] ?>"></input>

        </div>
		
     
      </div>
    </div>
  </div>

         

   <button type="submit" class="btn btn-secondary" name="btncancle">Cancel</button>
<button type="submit" class="btn btn-primary" name="btnshow" id="btnadd">Update ChartAccount</button>


 </div>
              </form>

<?php
}
?>
