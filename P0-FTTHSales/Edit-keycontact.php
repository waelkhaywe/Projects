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
$tbl_name="keycontact"; 


$editid = $_GET['eid'];
 
$editquery=mysql_query("Select * FROM keycontact where buildingID ='{$editid}'");
$editdata=mysql_fetch_row($editquery);

if($_POST)
{
     $BuildingName = $_POST['BuildingName'];
     $City = $_POST['City'];
	 $Mohafaza = $_POST['Mohafaza'];
	 $Caza = $_POST['Caza'];
     $Street = $_POST['Street'];
     $Directions = $_POST['Directions'];
	 $GPSCoodinations = $_POST['GPSCoodinations'];
	 $KeyContactType = $_POST['KeyContactType'];
	 $KeyContactName  = $_POST['KeyContactName'];
     $KeyContactPhone = $_POST['KeyContactPhone'];
	 $KeyContactEmail = $_POST['KeyContactEmail'];	
	 $buildingID=$_POST['buildingID'];
	 $dateedited=$_POST['dateedited'];
$Editby=$_POST['Editby'];
$q=mysql_query("update keycontact set BuildingName='{$BuildingName}',City='{$City}',Mohafaza='{$Mohafaza}',Caza='{$Caza}',Street='{$Street}',Directions='{$Directions}' ,GPSCoodinations='{$GPSCoodinations}',KeyContactType='{$KeyContactType}',KeyContactName='{$KeyContactName}',KeyContactPhone='{$KeyContactPhone}',KeyContactEmail='{$KeyContactEmail}',dateedited='{$dateedited}',Editby='{$Editby}' where buildingID='{$buildingID}' ");

	if($q) {
		
		echo "<script>alert ('Record Updated');window.location='Delete-keycontact.php';</script>";
		
		
	}

}
 ?> 
 
 <html>
 <head>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
	<script type="text/javascript">
			$(document).ready(function() {
				var Caza = ["Akkar", "Baalbeck", "Hermel", "Beirut", "Rashaya", "Western Bekaa", "Zahle", "Aley" ,"Baabda", "Chouf", "Jbeil", "Keserwan", "Matn ","Batroun", "Bsharri", "Koura", "Miniyeh-Danniyeh", "Tripoli","Bint Jbeil", "Hasbaya", "Marjeyoun", "Nabatiyeh", "Sidon","Jezzine", "Tyre"];
				$("#Caza").select2({
				  data: Caza
				});
			});
		</script>
		</head>

 <body>
 
<br><br><br>
 <form method="Post" >
 <input type="hidden" name="buildingID" value="<?php echo $editdata[3] ?>">
Building Name: &ensp; <SELECT Name ="BuildingName" value="<?php echo $editdata[11] ?>">
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
City: &ensp; <input type="text" name="City" value="<?php echo $editdata[4] ?>"><br><br>
Mohafaza: &ensp; <SELECT NAME="Mohafaza" value="<?php echo $editdata[10] ?>" >
    <OPTION VALUE="Beirut">Beirut
    <OPTION VALUE="Bekaa">Bekaa
    <OPTION VALUE="Mount Lebanon">Mount Lebanon
	<OPTION VALUE="Nabatiye">Nabatiye
	<OPTION VALUE="North">North
	<OPTION VALUE="South">South
</SELECT><br><br>
Caza: &ensp; <select name="Caza" id="Caza" style="width:200px;" value="<?php echo $editdata[5] ?>">
			<!-- Dropdown List  -->
			</select><br><br>
Street: &ensp; <input type="text" name="Street" value="<?php echo $editdata[6] ?>"><br><br>
Directions: &ensp; <input type="text" size="46" name="Directions" value="<?php echo $editdata[7] ?>"><br><br>
GPS Coodinations: &ensp; <input type="drop" name="GPSCoodinations" value="<?php echo $editdata[8] ?>"><br><br>
KeyContact Name: &ensp; <input type="text" name="KeyContactName" value="<?php echo $editdata[0] ?>" > <br><br>
KeyContact Type: &ensp; <SELECT NAME="KeyContactType" value="<?php echo $editdata[1] ?>">
    <OPTION VALUE="Gatekeeper">Gatekeeper
    <OPTION VALUE="Head of Building Committee">Head of Building Committee
    <OPTION VALUE="Facility Management Company">Facility Management Company
	<OPTION VALUE="Owner">Owner
	<OPTION VALUE="Contractor">Contractor
	<OPTION VALUE="Dealer">Dealer
</SELECT><br><br>
KeyContact Phone: &ensp; <input type="text" name="KeyContactPhone" value="<?php echo $editdata[2] ?>"><br><br>
KeyContact Email: &ensp; <input type="text" name="KeyContactEmail" value="<?php echo $editdata[9] ?>"> <br><br>

<br>
<input type="submit" name="insert" value="submit">
 <?php date_default_timezone_set("Israel"); 
?>
<input type="hidden" name="dateedited"  value="<?php echo "". date("Y-m-d h:i:sa"); ?>"> 
<input type="hidden"  name="Editby" value="<?= $fgmembersite->UserFullName()?>">

</form> 
 
 </body>
 
 </html>
 