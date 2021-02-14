<?php
@mysql_connect("localhost","root","");
mysql_select_db("cyberdb"); 
 ?> 
<body>
<?php  
if(@mysql_connect($_POST["insert"])) 
     $BuildingNameAr = $_POST["BuildingNameAr"];
     $BuildingName = $_POST["BuildingName"];
     $BuildingType = $_POST["BuildingType"];
     $FDUNumber = $_POST["FDUNumber"];
	 $PhoneBoxNum = $_POST["PhoneBoxNum"];
	 $propertyId = $_POST["propertyId"];
	 $BuildingClass = $_POST["BuildingClass"];
     $BlocksNumber = $_POST["BlocksNumber"];
	 $FLoorNumber = $_POST["FLoorNumber"];
 $ApartmentNumber = $_POST["ApartmentNumber"];
$insert_data = mysql_query('INSERT INTO buildings VALUES("$BuildingName", "$BuildingNameAr", "$BuildingType", "$FDUNumber", "$PhoneBoxNum", "$propertyId","$BuildingClass", "$BlocksNumber", "$FLoorNumber", "$ApartmentNumber")');
if (!mysql_query($insert_data))
  {
  die("Error: " . mysql_error());
  }
echo "data successfully added";

mysql_close($con);

?>
</body>

