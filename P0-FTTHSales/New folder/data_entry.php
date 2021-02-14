<?php
@mysql_connect("localhost","root","");
mysql_select_db("cyberdb");
$tbl_name="buildings"; 
 ?> 
<body>
<?php  
if(@mysql_connect($_POST["insert"]));
	 $BuildingName = $_POST['BuildingName'];
	 $BuildingNameAr = $_POST['BuildingNameAr'];
     $BuildingType = $_POST['BuildingType'];
     $FDUNumber = $_POST['FDUNumber'];
	 $PhoneBoxNum = $_POST['PhoneBoxNum'];
	 $propertyId = $_POST['propertyId'];
	 $BuildingClass = $_POST['BuildingClass'];
     $BlocksNumber = $_POST['BlocksNumber'];
	 $FLoorNumber = $_POST['FLoorNumber'];
 $ApartmentNumber = $_POST['ApartmentNumber'];

$sql="INSERT INTO $tbl_name VALUES('$BuildingName', '$BuildingNameAr', '$BuildingType', '$FDUNumber', '$PhoneBoxNum', '$propertyId', '$BuildingClass', '$BlocksNumber', '$FLoorNumber', '$ApartmentNumber')";
$result=mysql_query($sql);
if($result){
echo "Successful";
echo "<BR>";
}

else {
echo "ERROR";
}
?> 

<?php 
mysql_close();
?>

</body>

