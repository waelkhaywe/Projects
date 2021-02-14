<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
@mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
mysql_select_db("cyberiadb");
$tbl_name="buildings"; 
$tbl_name2="keycontact";
$tbl_name3="customer";
 ?> 
<html>
<body>


<form action="" method="post">
    <input type="text" name="term2" size="60" placeholder="Search keycontact"/>
	<select id="drop"" name = "drop">
        <option value="keycontactName">Keycontact Name</option>
        <option value="keycontactPhone">Keycontact Phone</option>
        <option value="BuildingName">Building Name</option>
        <option value="City">City</option>
        <option value="Caza">Caza</option>
        <option value="Mohafaza">Mohafaza</option>
           <option value="Street">Street</option>
    </select>
    <button type="submit" class="button primary">Search</button>
</form>

<?php

 @mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
 mysql_select_db("cyberiadb");
if (!empty($_REQUEST['term2'])) {
    $term2 = @mysql_real_escape_string($_REQUEST['term2']);  
    $drop = ($_REQUEST['drop']);  
    $sql = "SELECT * FROM keycontact WHERE ".$drop." LIKE '%".$term2."%'";  
 $result2 = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
 $count=mysql_num_rows($result2);
 if ($count >0)   {  
	
	 $r_query = mysql_query($sql); 
	 

	 
	 echo "$count Records found";
echo "<table border='1'>";
echo "<tr>";
echo "<th>BuildingName</th>";
echo "<th>KeyContactName</th>";
echo "<th>KeyContactType</th>";
echo "<th>KeyContactPhone</th>";
echo "<th>KeyContactEmail</th>";
echo "<th>City</th>";
echo "<th>Mohafaza</th>";
echo "<th>Caza</th>";
echo "<th>Street</th>";
echo "<th>Directions</th>";
echo "<th>GPSCoodinations</th>";
echo "<th>Sales Person</th>";
echo "<th>Date Created</th>";
echo "<th>Edited By</th>";
echo "<th>Date Edited</th>";
echo "<th>Actions</th>";



    while ($row = mysql_fetch_array($r_query)){ 

	echo "<tr>";
	 echo "<td>".$row["BuildingName"]."</td>&ensp;&ensp;&ensp;<td>".$row["KeyContactName"]."</td>&ensp;&ensp;&ensp;<td>".$row["KeyContactType"]."</td>&ensp;&ensp;&ensp;<td>".$row["KeyContactPhone"]."</td>&ensp;&ensp;&ensp;<td>".$row["KeyContactEmail"]." </td>&ensp;&ensp;&ensp;<td> ".$row["City"]."<td>&ensp;&ensp;&ensp; ".$row["Mohafaza"]."</td><td>".$row["Caza"]."</td>&ensp;&ensp;&ensp;<td>".$row["Street"]."</td>&ensp;&ensp;&ensp;<td>".$row["Directions"]."</td>&ensp;&ensp;&ensp;<td>".$row["GPSCoodinations"]."</td>&ensp;&ensp;&ensp;<td>".$row["Salesperson"]."</td>&ensp;&ensp;&ensp;<td>".$row["datecreated"]."</td>&ensp;&ensp;&ensp;<td>".$row["Editby"]."</td>&ensp;&ensp;&ensp;<td>".$row["dateedited"]."</td>";
	echo "<td> <a href= 'Edit-keycontact.php?eid=$row[3]'>Edit</a> |<a href= 'Delete-keycontact.php?did=$row[3]'>Delete</a> </td>";
	echo "</tr>";
 
	} echo "</table>";

  }
 else {
  die(" No data " . mysql_error());
}
}
 
		   ?>
 
<div id='fg_membersite_content'>
<h2> </h2>


<p>
<a href='login-home.php'>Return Home</a>
</p>
</div>
</body>
</html>
