<html lang="en">
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

h1 {
    text-align:center;
}
h3 {
    text-align:center;
}
p {
    text-align:center;
}
.button1id{font-size: 24px;}


</style>
  <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-3/vendor/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome CSS-->
      <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-3/vendor/font-awesome/css/font-awesome.min.css">
      <!-- Custom Font Icons CSS-->
      <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-3/css/font.css">
      <!-- Google fonts - Muli-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-3/css/style.default.premium.css" id="theme-stylesheet"><link id="new-stylesheet" rel="stylesheet">
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/dark-admin-premium/1-4-3/css/custom.css">
      <!-- Favicon-->
      <link rel="shortcut icon" href="  ">
      
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<?php

include("connect.inc");

$id = $_GET['q'];

$select = mysqli_query($con, "Select * from invoice");

?>

<table border="1" class="table table-bordered">
<tr>
<th>ID</th>
<th>Date</th>
<th>Bill</th>
<th>SubAccount</th>
<th>SubAccount</th>
<th>SubAccount</th>
<th>SubAccount</th>
<th>SubAccount</th>
<th>SubAccount</th>
<th>Square</th>
<th>Rate</th>
<th>Description</th>
<th>Total</th>
</tr>

<?php

while($row = mysqli_fetch_array($select))
{
	echo '<tr>
	<td>'.$row[0].'</td>
	<td>'.$row[1].'</td>
	<td>'.$row[2].'</td>
	<td>'.$row[3].'</td>
	<td>'.$row[4].'</td>
	<td>'.$row[5].'</td>
	<td>'.$row[6].'</td>
	<td>'.$row[7].'</td>
	<td>'.$row[8].'</td>
	<td>'.$row[9].'</td>
	<td>'.$row[10].'</td>
	<td>'.$row[11].'</td>
	<td>'.$row[12].'</td>
	
	</tr>';
	}

?>
</table>
</div>