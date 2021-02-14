<?php
@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="customer"; 

$deleteid=$_GET['did'];

$q= mysql_query(" DELETE from customer where BuildingID='{$deleteid}'") or die(mysql_error());

header("location:Update customer.php");
?>
