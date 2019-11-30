 <?php include("Connection.php"); ?>

<?php  





 $output = '';  
 if(isset($_POST["brand"]))  
 {  
      if($_POST["brand"] != '')  
      {  
           $sql = "SELECT `accountname`, `accountid`, `subid` FROM `subaccount` WHERE `accountid` =".$_POST["brand"]."";  
      }  
    
      $result = mysqli_query($con, $sql);  
	  print_r($result);
	  if($result){
		    $rowcount=mysqli_num_rows($result);
if($rowcount == 0 ){
echo "<script>jQuery('#byvalue').html('');
</script>";	
}else{

	while($row = mysqli_fetch_array($result))  
      	
	  
	  {  ?>
  <option value= "<?php echo $row['subid']; ?>"><?php echo $row['accountname']; ?></option>	
     <?php  
     	
	  }
}	  
 }else{
	  echo "fail";
  }
 }
 ?>  