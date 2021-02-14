<?php
@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="keycontact"; 

$deleteid=$_GET['did'];

$q= mysql_query(" DELETE from keycontact where BuildingID='{$deleteid}'") or die(mysql_error());

header("location:Search-keycontact.php");
?>
