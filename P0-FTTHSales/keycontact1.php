<html>
    <head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
  <BODY >
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
$Salesperson = $_POST['Salesperson'];
	 $datecreated= $_POST['datecreated'];

	 
	 $sql2="INSERT INTO $tbl_name(City,Mohafaza, Caza, Street, Directions, GPSCoodinations, KeyContactType, KeyContactName, KeyContactPhone, KeyContactEmail,BuildingName,Salesperson,datecreated)VALUES('$City','$Mohafaza', '$Caza', '$Street', '$Directions', '$GPSCoodinations', '$KeyContactType', '$KeyContactName', '$KeyContactPhone', '$KeyContactEmail' , '$BuildingName','$Salesperson ','$datecreated')";
$query=mysql_query($sql2);

if($query){
echo "Successful<br><br>";
echo "<BR>";
echo "<a href='login-home.php'>Return Home</a><br><br>"; 
echo "<a href='access-controlled.php'>Create New Building</a><br><br>";
echo "<a href='Create customer.php'>Add a Customer</a><br><br>";

}
else {
die(" connection error: " . mysql_error());

}
?>
     </body>
</html>