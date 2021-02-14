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


$editid = $_GET['eid'];
 
$editquery=mysql_query("Select * FROM $tbl_name where buildingID ='{$editid}'");
$editdata=mysql_fetch_row($editquery);

if($_POST)
{
$CustomerName =$_POST['CustomerName'];
$CustomerService =$_POST['CustomerService'];
$CustomerServiceProvider =$_POST['CustomerServiceProvider'];
$CustomerFloor =$_POST['CustomerFloor'];
$CustomerType =$_POST['CustomerType'];
$CustomerStatus =$_POST['CustomerStatus'];
$CustomerLandline=$_POST['CustomerLandline'];
$CustomerPhone=$_POST['CustomerPhone'];
$dateedited=$_POST['dateedited'];
$Editby=$_POST['Editby'];
$buildingID=$_POST['buildingID'];
$Notes=$_POST['Notes'];
$q=mysql_query("update customer set CustomerName='{$CustomerName}',CustomerService='{$CustomerService}',CustomerServiceProvider='{$CustomerServiceProvider}',CustomerFloor='{$CustomerFloor}',CustomerType='{$CustomerType}',CustomerStatus='{$CustomerStatus}',CustomerLandline='{$CustomerLandline}',CustomerPhone='{$CustomerPhone}',Notes='{$Notes}',dateedited='{$dateedited}',Editby='{$Editby}' where buildingID='{$buildingID}' ");

	if($q) {
		
		echo "<script>alert ('Record Updated');window.location='update customer.php';</script>";
		
		
	}

}
 ?> 
 
 <html>
 
 <body>
 
 <form method="Post" >
 <input type="hidden" name="buildingID" value="<?php echo $editdata[9] ?>">
Customer Name: <input type="text" SIZE="40" name="CustomerName" value="<?php echo $editdata[0] ?>"> <br><br>
Customer Available Service: <SELECT NAME="CustomerService" value="<?php echo $editdata[1] ?>">
    <OPTION VALUE="ADSL">ADSL
    <OPTION VALUE="Cable">Cable
    <OPTION VALUE="Fiber">Fiber
	<OPTION VALUE="Wirelessbits">Wireless Bits
	<OPTION VALUE="Connect">Connect
	<OPTION VALUE="None">None
</SELECT><br><br>
Customer Service Provider: <SELECT NAME="CustomerServiceProvider" value="<?php echo $editdata[2] ?>" >
    <OPTION VALUE="IDM">IDM
    <OPTION VALUE="Cyberia">Cyberia
    <OPTION VALUE="Ogero">Ogero
	<OPTION VALUE="Terranet">Terranet
	<OPTION VALUE="Sodetel">Sodetel
	<OPTION VALUE="Others">Others
</SELECT><br><br>
Customer Floor Number: <input type="text" name="CustomerFloor" value="<?php echo $editdata[3] ?>"><br><br>
Customer Block:  <SELECT NAME="CustomerBlock" value="<?php echo $editdata[4] ?>">
    <OPTION VALUE="A">A
    <OPTION VALUE="B">B
    <OPTION VALUE="C">C
	<OPTION VALUE="D">D
	<OPTION VALUE="N/A">N/A
</SELECT><br><br>
Customer Type: <SELECT NAME="CustomerType" value="<?php echo $editdata[5] ?>">
    <OPTION VALUE="Residence">Residence
    <OPTION VALUE="Corporate">Corparate
    <OPTION VALUE="Vacant">Vacant
</SELECT><br><br>
Customer Status: <SELECT NAME="CustomerStatus" value="<?php echo $editdata[6] ?>">
    <OPTION VALUE="Installed">Installed
    <OPTION VALUE="Applied">Applied
    <OPTION VALUE="Follow up">Follow up
    <OPTION VALUE="Not Interested"> Not Interested
</SELECT><br><br>
Customer Landline: <input type="text" Size="15" name="CustomerLandline" value="<?php echo $editdata[7] ?>"><br><br>
Customer Phone: <input type="text" SIZE="15" name="CustomerPhone" value="<?php echo $editdata[8] ?>"><br><br>
Notes: <textarea name="Notes" rows="5" cols="40" ><?php echo $editdata[10] ?></textarea><br><br>
<input type="submit" value="Update Record">
<?php date_default_timezone_set("Israel"); 
?>
<input type="hidden" name="dateedited"  value="<?php echo "". date("Y-m-d h:i:sa"); ?>"> 
<input type="hidden"  name="Editby" value="<?= $fgmembersite->UserFullName()?>">


 
 </form>
 
<p>
<a href='login-home.php'>Return Home</a>
</p>
</div>
</body>
</html>
 