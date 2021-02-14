<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>An Access Controlled Page</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>
<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
$con = @mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110","cyberiadb");
if (!$con)
  {
  die(" connection error: " . mysql_error());
  }
 
 ?> 
<?php

@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="customer"; 

if(@mysql_connect($_POST["submit"]));
	 $CustomerName = $_POST['CustomerName'];
	 $CustomerService = $_POST['CustomerService'];
     $CustomerServiceProvider = $_POST['CustomerServiceProvider'];
     $CustomerFloor = $_POST['CustomerFloor'];
	 $CustomerBlock = $_POST['CustomerBlock'];
	 $CustomerType = $_POST['CustomerType'];
	 $CustomerStatus = $_POST['CustomerStatus'];
     $CustomerLandline = $_POST['CustomerLandline'];
	 $CustomerPhone = $_POST['CustomerPhone'];
	 $Salesperson = $_POST['Salesperson'];
	 $datecreated= $_POST['datecreated'];
	 $Notes = $_POST['Notes'];
	 $BuildingName = $_POST['BuildingName'];
	 if ($BuildingName != "") {
$sql="INSERT INTO $tbl_name( CustomerName, CustomerService, CustomerServiceProvider, CustomerFloor, CustomerBlock, CustomerType, CustomerStatus, CustomerLandline, CustomerPhone,Notes,Salesperson,BuildingName,datecreated)VALUES('$CustomerName', '$CustomerService', '$CustomerServiceProvider', '$CustomerFloor', '$CustomerBlock', '$CustomerType', '$CustomerStatus', '$CustomerLandline', '$CustomerPhone' ,'$Notes','$Salesperson','$BuildingName','$datecreated' )";
$result=mysql_query($sql);
	 }
else {
	echo "<a href='Create customer.php'>Return</a>";
die(" Please Select a building"); 

}	
if($result){
echo "Successful";
echo "<BR>";

}
else {
die(" Wrong Data Entry " . mysql_error());


}
	
?>
<div id='fg_membersite_content'>
<h2> </h2>

<p>
Logged in as: <?= $fgmembersite->UserFullName() ?>
</p>
<p>
<a href='login-home.php'>Home</a>
</p>
</div>
</body>
</html>