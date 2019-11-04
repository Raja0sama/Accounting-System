  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li 

<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'paymentdesign.php') !== false) {
    echo 'class="active"';
}
?>
                ><a href="paymentdesign.php"> <i class="fa fa-file-text-o"></i>Payment Voucher </a></li>
                <li
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'reciptdesign.php') !== false) {
    echo 'class="active"';
}
?>

                ><a href="reciptdesign.php"> <i class="fa fa-file-text-o"></i>Recipt Voucher </a></li>
                <li 
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'invoicedesign.php') !== false) {
    echo 'class="active"';
}
?>

                ><a href="invoicedesign.php"> <i class="icon-padnote"></i>Invoice </a></li>
                	 <li 
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'adjustment.php') !== false) {
    echo 'class="active"';
}
?>
                   ><a href="adjustment.php"> <i class="icon-padnote"></i>Adjustment </a></li>
	 <li 
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'genral.php') !== false) {
    echo 'class="active"';
}
?>
                   ><a href="genral.php"> <i class="fa fa-bar-chart"></i>General Ledger</a></li>
				     <li
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'chartofaccount.php') !== false) {
    echo 'class="active"';
}
?>
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'mainaccounts.php') !== false) {
    echo 'class="active"';
}
?>
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'subaccounts.php') !== false) {
    echo 'class="active"';
}
?>
             ><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Create Account</a>
                  <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                    <li
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'chartofaccount.php') !== false) {
    echo 'class="active"';
}
?>
                    ><a href="chartofaccount.php">Chart Of Account</a></li>
                    <li
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'mainaccounts.php') !== false) {
    echo 'class="active"';
}
?>
                    ><a href="mainaccounts.php">Main Account</a></li>
                    <li
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'subaccounts.php') !== false) {
    echo 'class="active"';
}
?>
                    ><a href="subaccounts.php">Sub Account</a></li>
					
                  </ul>
                </li>
              <li 
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showreciptdesign.php') !== false) {
    echo 'class="active"';
}
?>
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showpaymentdesign.php') !== false) {
    echo 'class="active"';
}
?>
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showadjustment.php') !== false) {
    echo 'class="active"';
}
?>
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showinvoicedesign.php') !== false) {
    echo 'class="active"';
}
?>
              ><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>All Records</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li 
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showpaymentdesign.php') !== false) {
    echo 'class="active"';
}
?>
                    ><a href="showpaymentdesign.php">Payement Voucher Records</a></li>
                    <li
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showreciptdesign.php') !== false) {
    echo 'class="active"';
}
?>
                    ><a href="showreciptdesign.php">Recipt Voucher Records</a></li>
                    <li 
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showinvoicedesign.php') !== false) {
    echo 'class="active"';
}
?>
                    ><a href="showinvoicedesign.php">Invoice Records</a></li>
                    <li 
<?php
$a=  $_SERVER['REQUEST_URI'];
if (strpos($a, 'showadjustment.php') !== false) {
    echo 'class="active"';
}
?>

                    ><a href="showadjustment.php">Adjustment Records</a></li>
                  
				  </ul>
                </li>
        
               
      
      </nav>
      <!-- Sidebar Navigation end-->
      