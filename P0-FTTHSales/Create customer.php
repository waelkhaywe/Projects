<?PHP
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
 
 $query= "SELECT * FROM 'buildings'"; 
$result=mysql_query($query);

 ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>An Access Controlled Page</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>
<form action="Create customer2.php" method="POST">
<br>
<br>
Building Name: <SELECT Name ="BuildingName" required>
<option> </option>
 <?php
                mysql_connect ("localhost","r6bygbsbx9ve","Khaywe_110");
                mysql_select_db ("cyberiadb");
                $select="buildings";
               
            
            ?>
			  <?php
                $list=mysql_query("SELECT * FROM $select");
            while($row_list=mysql_fetch_array($list)){
                ?>
                    <option value="<?php echo $row_list[2]; ?>"<?php if($row_list[2]==$select){ echo "selected"; } ?>>
                                         <?php echo $row_list[2];?>
                    </option>
                <?php
                }
                ?>
</SELECT> <br><br>
Customer Name: <input type="text" SIZE="40" name="CustomerName" required> <br><br>
Customer Available Service: <SELECT NAME="CustomerService" required>
    <OPTION VALUE="ADSL">ADSL
    <OPTION VALUE="Cable">Cable
    <OPTION VALUE="Fiber">Fiber
	<OPTION VALUE="Wirelessbits">Wireless Bits
	<OPTION VALUE="Connect">Connect
	<OPTION VALUE="None">None
</SELECT><br><br>
Customer Service Provider: <SELECT NAME="CustomerServiceProvider" required>
    <OPTION VALUE="IDM">IDM
    <OPTION VALUE="Cyberia">Cyberia
    <OPTION VALUE="Ogero">Ogero
	<OPTION VALUE="Terranet">Terranet
	<OPTION VALUE="Sodetel">Sodetel
	<OPTION VALUE="Others">Others
</SELECT><br><br>
Customer Floor Number: <input type="text" name="CustomerFloor" required><br><br>
Customer Block:  <SELECT NAME="CustomerBlock">
    <OPTION VALUE="A">A
    <OPTION VALUE="B">B
    <OPTION VALUE="C">C
	<OPTION VALUE="D">D
	<OPTION VALUE="N/A">N/A
</SELECT><br><br>
Customer Type: <SELECT NAME="CustomerType" required>
    <OPTION VALUE="Residence">Residence
    <OPTION VALUE="Corporate">Corparate
    <OPTION VALUE="Vacant">Vacant
</SELECT><br><br>
Customer Status: <SELECT NAME="CustomerStatus" required>
    <OPTION VALUE="Installed">Installed
    <OPTION VALUE="Applied">Applied
    <OPTION VALUE="Follow up">Follow up
    <OPTION VALUE="Not Interested"> Not Interested
</SELECT><br><br>
Customer Landline: <input type="text" Size="15" name="CustomerLandline" required><br><br>
Customer Phone: <input type="text" SIZE="15" name="CustomerPhone" required><br><br>
Notes: <textarea name="Notes" rows="5" cols="40"> </textarea><br><br>
<input type="hidden"  name="Salesperson" value="<?= $fgmembersite->UserFullName()?>">
 <?php date_default_timezone_set("Israel"); ?>
<input type="hidden" name="datecreated"  value="<?php echo "". date("Y-m-d h:i:sa"); ?>"> 
<input type="submit" name="insert" value="Submit">
</form> 




<div id='fg_membersite_content'>
<h2> </h2>

<p>
Logged in as: <?= $fgmembersite->UserFullName() ?>
</p>
<p>
<a href='login-home.php'>Return Home</a>
</p>
</div>
</body>
</html>
