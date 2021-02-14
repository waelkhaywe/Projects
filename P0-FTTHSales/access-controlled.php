<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>

      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>An Access Controlled Page</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
      <script>
      function showhideDSPset(){
      if(document.getElementById('DSPava').checked){
      document.getElementById('DSPset').style.display='block';
      }
      else{
      document.getElementById('DSPset').style.display='none';
      }
      }
      </script>
</head>
<body>
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
 
 ?> 
<form action="data_entry.php" method="POST">
<br>
<br>
<br>
Building Name: <input type="text" SIZE="40" name="BuildingName" required><br><br>
Building Name Arabic: <input type="text" SIZE="40" name="BuildingNameAr" required><br><br>
Building Type: <SELECT NAME="BuildingType" required>
    <OPTION VALUE="Residential">Residential
    <OPTION VALUE="Commercial">Commercial
    <OPTION VALUE="Governmental">Governmental
	<OPTION VALUE="Mixed">Mixed
</SELECT><br><br>
DSP Available: <input type="checkbox" id="DSPava" name="DSPava" value="yes" onclick="showhideDSPset()" ><br>
<p id="DSPset" style="display:none;">
DSP:  <SELECT NAME="DSP">
    <OPTION VALUE="None">
    <OPTION VALUE="GDS">GDS
    <OPTION VALUE="Ogero">Ogero
	<OPTION VALUE="GDS+Ogero">GDS+Ogero
</SELECT><br><br>
FDU Number: <input type="text" name="FDUNumber" value="None"></p> 
<br>
Phone Box Number: <input type="text" name="PhoneBoxNum">&ensp;&ensp;&ensp; propertyId: <input type="text" name="propertyId"><br><br>
Building Class: <SELECT NAME="BuildingClass" required>
    <OPTION VALUE="A">A
    <OPTION VALUE="B">B
    <OPTION VALUE="C">C
	<OPTION VALUE="D">D
	<OPTION VALUE="E">E
</SELECT><br><br>
Blocks Number: <SELECT NAME="BlocksNumber" required>
    <OPTION VALUE="1">1
    <OPTION VALUE="2">2
    <OPTION VALUE="3">3
	<OPTION VALUE="4">4
	<OPTION VALUE="5">5
</SELECT><br><br>
Floor Number: <input type="text" SIZE="5" name="FLoorNumber"required><br><br>
Apartment Number: <input type="text" SIZE="5" name="ApartmentNumber"><br>
<br>
<input type="hidden"  name="Salesperson" value="<?= $fgmembersite->UserFullName()?>">
 <?php date_default_timezone_set("Israel"); ?>
<input type="hidden" name="datecreated"  value="<?php echo "". date("Y-m-d h:i:sa"); ?>"> 
<input type="submit" name="insert" value="Next">


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
