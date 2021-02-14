<?php
@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="buildings"; 

$deleteid=$_GET['did'];

$q= mysql_query(" DELETE from buildings where BuildingID='{$deleteid}'") or die(mysql_error());

header("location:Update Reg.php");
?>
