<?php
@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="buildings"; 


$editid = $_GET['eid'];
 
$editquery=mysql_query("Select * FROM $tbl_name where buildingID ='{$editid}'");
$editdata=mysql_fetch_row($editquery);

if($_POST)
{
$BuildingName =$_POST['BuildingName'];
$BuildingNameAr =$_POST['BuildingNameAr'];
$BuildingType =$_POST['BuildingType'];
$DSP=$_POST['DSP'];
$FDUNumber =$_POST['FDUNumber'];
$PhoneBoxNum =$_POST['PhoneBoxNum'];
$propertyId =$_POST['propertyId'];
$buildingID=$_POST['buildingID'];
$dateedited=$_POST['dateedited'];
$Editby=$_POST['Editby'];
$q=mysql_query("update buildings set BuildingName='{$BuildingName}',BuildingNameAr='{$BuildingNameAr}',BuildingType='{$BuildingType}',DSP='{$DSP}',FDUNumber='{$FDUNumber}',PhoneBoxNum='{$PhoneBoxNum}',propertyId='{$propertyId}',dateedited='{$dateedited}',Editby='{$Editby}' where buildingID='{$buildingID}' ");

	if($q) {
		
		echo "<script>alert ('Record Updated');window.location='Update Reg.php';</script>";
		
		
	}

}
 ?> 
 
 <html>
 
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
 
 $query= "SELECT * FROM 'buildings'"; 
$result=mysql_query($query);

 ?> 
 
 <form method="Post" >
 <input type="hidden" name="buildingID" value="<?php echo $editdata[0] ?>">
 Building Name: <input type="text" SIZE="40" value="<?php echo $editdata[2] ?>" name="BuildingName" required><br><br>
Building Name Arabic: <input type="text" SIZE="40" value="<?php echo $editdata[1] ?>" name="BuildingNameAr" required><br><br>
Building Type: <SELECT NAME="BuildingType" value="<?php echo $editdata[3] ?>" required>
   <OPTION VALUE="<?php echo $editdata[3] ?>"><?php echo $editdata[3] ?>
    <OPTION VALUE="Residential">Residential
    <OPTION VALUE="Commercial">Commercial
    <OPTION VALUE="Governmental">Governmental
	<OPTION VALUE="Mixed">Mixed
</SELECT><br><br>
DSP: <SELECT NAME="DSP" value="<?php echo $editdata[11] ?>">
<OPTION VALUE="<?php echo $editdata[11] ?>"><?php echo $editdata[11] ?>
    <OPTION VALUE="None">None
    <OPTION VALUE="GDS">GDS
    <OPTION VALUE="Ogero">Ogero
	<OPTION VALUE="GDS+Ogero">GDS+Ogero
</SELECT><br><br>
FDU Number: <input type="text" name="FDUNumber" value="<?php echo $editdata[4] ?>"><br><br>
Phone Box Number: <input type="text" name="PhoneBoxNum" value="<?php echo $editdata[5] ?>">&ensp;&ensp;&ensp; propertyId: <input type="text" value="<?php echo $editdata[6] ?>" name="propertyId"><br><br>
Building Class: <SELECT NAME="BuildingClass" value="<?php echo $editdata[7] ?>" required>
     <OPTION VALUE="<?php echo $editdata[7] ?>"><?php echo $editdata[7] ?>
    <OPTION VALUE="A">A
    <OPTION VALUE="B">B
    <OPTION VALUE="C">C
	<OPTION VALUE="D">D
	<OPTION VALUE="E">E
</SELECT><br><br>
Blocks Number: <SELECT NAME="BlocksNumber" value="<?php echo $editdata[8] ?>" required>
<OPTION VALUE="<?php echo $editdata[8] ?>"><?php echo $editdata[8] ?>
    <OPTION VALUE="1">1
    <OPTION VALUE="2">2
    <OPTION VALUE="3">3
	<OPTION VALUE="4">4
	<OPTION VALUE="5">5
</SELECT><br><br>
Floor Number: <input type="text" SIZE="5" name="FLoorNumber" VALUE="<?php echo $editdata[9] ?>" required><br><br>
Apartment Number: <input type="text" SIZE="5"  VALUE="<?php echo $editdata[10] ?>" name="ApartmentNumber"><br>
<br>
 
<input type="submit" value="Update Record">
 <?php date_default_timezone_set("Israel"); 
?>
<input type="hidden" name="dateedited"  value="<?php echo "". date("Y-m-d h:i:sa"); ?>"> 
<input type="hidden"  name="Editby" value="<?= $fgmembersite->UserFullName()?>">


 
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
 