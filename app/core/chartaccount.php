

<?php

$con = dbconnection();
if(isset($_POST['addchart'])){
	$name = $_POST['name'];
		$id = $_POST['id'];
	$query= "INSERT INTO `chartaccount`( `accountname`, `chartid`) VALUES ('$name',$id)";

	$exe = mysqli_query($con,$query);
	if($exe){
		echo "inserted";
	}else{
		echo "failed";
	}
	}



?>
<form method = "post">
<h1>Chart Account</h1>
<input type= "name" name="name" placeholder="Enter chart account" />
<input type= "name" name="id" placeholder="Enter Id" />
<input type= "submit" name="addchart" value="submit" />
<br>




</form>
