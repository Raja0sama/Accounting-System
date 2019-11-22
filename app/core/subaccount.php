

<?php

$con = dbconnection();
if(isset($_POST['addaccount'])){
	$name = $_POST['name'];
	$id = $_POST['id'];

	$chart = $_POST['chart'];

	$query= "INSERT INTO `subaccount`( `accountname`, `accountid`, `subid`) VALUES ('$name',$chart,$id)";
	$exe = mysqli_query($con,$query);
	if($exe){
		echo "inserted";
	}else{
		echo "failed";
	}
	}
?>
<form method = "post">
<h1>Sub Account</h1>
<input type= "name" name="name" placeholder="Enter chart account" />
<input type= "name" name="id" placeholder="Enter id"/>

<select name="chart">

<?php
$query = "SELECT * FROM `account`";
$exe = mysqli_query($con,$query);
if($exe){
	while($row = mysqli_fetch_array($exe)){
	?>
<option value= "<?php echo $row['accountid']; ?>"><?php echo $row['accountname']; ?></option>
<?php	}
}else{
	echo "problem";
}
?>
</select>

<input type= "submit" name="addaccount" value="submit" />


</form>
