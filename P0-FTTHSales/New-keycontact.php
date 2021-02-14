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



<form action="New-keycontact2.php" method="POST">
<br>
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
		 <BODY >
<br>
Building Name: &ensp; <SELECT Name ="BuildingName" required>
<option >--- Select ---</option>
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
City: &ensp; <input type="text" name="City" required><br><br>
Mohafaza: &ensp; <SELECT NAME="Mohafaza" required>
    <OPTION VALUE="Beirut">Beirut
    <OPTION VALUE="Bekaa">Bekaa
    <OPTION VALUE="Mount Lebanon">Mount Lebanon
	<OPTION VALUE="Nabatiye">Nabatiye
	<OPTION VALUE="North">North
	<OPTION VALUE="South">South
</SELECT><br><br>
Caza: &ensp; <select name="Caza" id="Caza" style="width:200px;" required>
			<!-- Dropdown List  -->
			</select><br><br>
Street: &ensp; <input type="text" name="Street" required><br><br>
Directions: &ensp; <input type="text" size="46" name="Directions"><br><br>
GPS Coordinations: &ensp; <input type="text" size="46" id="GPSCoodinations" name="GPSCoodinations" >
<br><br>
KeyContact Name: &ensp; <input type="text" name="KeyContactName" required> <br><br>
KeyContact Type: &ensp; <SELECT NAME="KeyContactType" required>
    <OPTION VALUE="Gatekeeper">Gatekeeper
    <OPTION VALUE="Head of Building Committee">Head of Building Committee
    <OPTION VALUE="Facility Management Company">Facility Management Company
	<OPTION VALUE="Owner">Owner
	<OPTION VALUE="Contractor">Contractor
	<OPTION VALUE="Dealer">Dealer
</SELECT><br><br>
KeyContact Phone: &ensp; <input type="text" name="KeyContactPhone" required><br><br>
KeyContact Email: &ensp; <input type="text" name="KeyContactEmail"> <br><br>

<br>
<input type="submit" name="insert" value="Submit"></form>
<button  onclick="getLocation()">Get location</button>
<p id="demo"></p> <button onclick="myFunction()">Copy Location</button>
<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";}
    }
    
function showPosition(position) {
    x.innerHTML="Latitude: " + position.coords.latitude + 
     "  Longitude: " + position.coords.longitude; }
    
    function myFunction() {
    document.getElementById("GPSCoodinations").value =  x.innerHTML;
}

</script>


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
