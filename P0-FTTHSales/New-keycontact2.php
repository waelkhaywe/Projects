<html>
    <head>
  <BODY >
     </body>
</html>
 <?php
@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="keycontact"; 

if(@mysql_connect($_POST["insert"]));

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


	 
	 $sql2="INSERT INTO $tbl_name(City,Mohafaza, Caza, Street, Directions, GPSCoodinations, KeyContactType, KeyContactName, KeyContactPhone, KeyContactEmail,BuildingName)VALUES('$City','$Mohafaza', '$Caza', '$Street', '$Directions', '$GPSCoodinations', '$KeyContactType', '$KeyContactName', '$KeyContactPhone', '$KeyContactEmail' , '$BuildingName')";
$query=mysql_query($sql2);

if($query){
echo "Successful<br><br>";
echo "<BR>";
echo "<a href='login-home.php'>Return Home</a><br><br>"; 


}
else {
die(" connection error: " . mysql_error());

}
?>