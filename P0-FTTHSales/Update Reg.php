<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="buildings";
$tbl_name2="keycontact";

 ?> 
<html>
<body>


<form  method="post">

<h1 > Building Search </h1 >
    <input type="text" name="term" size='90' placeholder="Search Terms"/>
    <select id="drop"" name = "drop">
        <option value="BuildingName">Building Name</option>
        <option value="FDUNumber">FDU Number</option>
        <option value="BuildingNameAr">Building Name Arabic</option>
        <option value="BuildingType">Building Type</option>
        <option value="DSP">DSP</option>
        <option value="PhoneBoxNum">PhoneBox Number</option>
        <option value="propertyId">Property Id</option>
        <option value="BuildingClass">Building Class</option>                
    </select>
    <br/>                   
    <br><button type="submit" class="button primary">Search</button>
</form>


<?php

 @mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
 mysql_select_db("cyberiadb");
if (!empty($_REQUEST['term'])) {
    $term = @mysql_real_escape_string($_REQUEST['term']);  
    $drop = ($_REQUEST['drop']);  
    $sql = "SELECT * FROM buildings WHERE ".$drop." LIKE '%".$term."%'";  
 $result2 = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
 $count=mysql_num_rows($result2);
 if ($count >0)   {  
	
	 $r_query = mysql_query($sql); 
	 

	 
	 echo "$count Records found";
echo "<table border='1'>";
echo "<tr>";
echo "<th>BuildingName&ensp;&ensp;</th>";
echo "<th>BuildingNameAr&ensp;&ensp;</th>";
echo "<th>BuildingClass&ensp;&ensp;</th>";
echo "<th>BlocksNumber&ensp;&ensp;</th>";
echo "<th>DSP&ensp;&ensp;</th>";
echo "<th>FDUNumber&ensp;&ensp;</th>";
echo "<th>propertyId&ensp;&ensp;</th>";
echo "<th>PhoneBox Number&ensp;&ensp;</th>";
echo "<th>Number of Floors&ensp;&ensp;</th>";
echo "<th>Number of Apartments&ensp;&ensp;</th>";
echo "<th>Salesperson&ensp;&ensp;</th>";
echo "<th>Date Created&ensp;&ensp;</th>";
echo "<th>Edited by&ensp;&ensp;</th>";
echo "<th>Date Edited&ensp;&ensp;</th>";
echo "<th>Actions&ensp;&ensp;</th>";



    while ($row = mysql_fetch_array($r_query)){ 

	echo "<tr>";
	 echo "<td>".$row["BuildingName"]."</td>&ensp;&ensp;&ensp;<td> ".$row["BuildingNameAr"]."</td>&ensp;&ensp;&ensp;<td>".$row["BuildingClass"]."</td>&ensp;&ensp;&ensp;<td>".$row["BlocksNumber"]."</td>&ensp;&ensp;&ensp;<td>".$row["DSP"]." </td>&ensp;&ensp;&ensp;<td>".$row["FDUNumber"]." </td>&ensp;&ensp;&ensp;<td> ".$row["propertyId"]."</td>&ensp;&ensp;&ensp;<td> ".$row["PhoneBoxNum"]."</td>&ensp;&ensp;&ensp;<td> ".$row["FLoorNumber"]."</td>&ensp;&ensp;&ensp;<td> ".$row["ApartmentNumber"]."</td>&ensp;&ensp;&ensp;<td> ".$row["Salesperson"]."</td>&ensp;&ensp;&ensp;<td> ".$row["datecreated"]."</td>&ensp;&ensp;&ensp;<td> ".$row["Editby"]."</td>&ensp;&ensp;&ensp;<td> ".$row["dateedited"]."</td>";
	echo "<td><a href= 'Edit-building.php?eid=$row[0]'>Edit</a> |<a href= 'Delete-building.php?did=$row[0]'>Delete</a> </td>";
	echo "</tr>";
 
	} echo "</table>";
	
 }
 else{
	 echo "<a href='login-home.php'>Return Home</a><br><br> ";
die(" No data " . mysql_error());

	}
}

		   ?>
<p>
<a href='New-keycontact.php'>Create Keycontact</a><br><br>
<a href='Search-keycontact.php'>Search Keycontact</a><br><br>
<a href='login-home.php'>Return Home</a>
</p>
</body>
</html>