

<?php

$con =dbconnection();
if(isset($_POST['addaccount'])){
	$name = $_POST['name'];
		$id = $_POST['id'];
	$chart = $_POST['chart'];

	$query= "INSERT INTO `account`( `accountname`, `accountid`, `chartid`) VALUES ('$name','$id',$chart)";
	$exe = mysqli_query($con,$query);
	if($exe){
		echo "inserted";
	}else{
		echo "failed";
	}
	}
?>
<form method = "post">
<h1>Account</h1>
<input type= "name" name="name" placeholder="Enter chart account" />
<input type= "name" name="id" placeholder="Enter id" />

<select name="chart">

<?php
$query = "SELECT * FROM `chartaccount`";
$exe = mysqli_query($con,$query);
if($exe){
	while($row = mysqli_fetch_array($exe)){
	?>
<option value= "<?php echo $row['chartid']; ?>"><?php echo $row['accountname']; ?></option>
<?php	}
}else{
	echo "problem";
}
?>
</select>

<input type= "submit" name="addaccount" value="submit" />

<br>



</form>
