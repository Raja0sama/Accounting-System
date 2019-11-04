<?php
 session_start();

 
 if($_SESSION['s_uname'] !="" && $_SESSION['s_pass'] !="")
 {

	 echo "Welcome <br>";
	 echo $_SESSION['s_uname'];
	 echo $_SESSION['s_pass'];
 }else{
	 header('Location:login.php');
 }

?>	