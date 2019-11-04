 <?php include("Connection.php"); ?>

<?php  

 //load_data.php  

 $output = '';  
 if(isset($_POST["brand"]))  
 {  
      if($_POST["brand"] != '')  
      {  
           $sql = "SELECT `accountname`,`accountid` FROM `account` WHERE `chartid` =".$_POST["brand"]."";  
      }  
    
      $result = mysqli_query($con, $sql);  
	  print_r($result);
	  if($result){
		    $rowcount=mysqli_num_rows($result);
if($rowcount == 0 ){
echo "<script>jQuery('#mainvalue').html('');
</script>";	
}else{

	while($row = mysqli_fetch_array($result))  
      	
	  
	  {  ?>
  
 <option value= "<?php echo $row['accountid']; ?>"><?php echo $row['accountname']; ?></option>	
     
	 <?php  
     	
	  }
}	  
 }else{
	  echo "fail";
  }
 }
 ?>  