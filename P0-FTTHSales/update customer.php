<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
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
<html>
<body>



<form action="" method="post">
<h1 > Customer Search </h1 >
    <input type="text" name="term2" size="90" placeholder="Search Customer"/>
    <input type="hidden" name="salesperson" value="Salesperson"/>
		<input type="hidden" name="term3" value="<?= $fgmembersite->UserFullName()?>"/>
	<select id="drop" name = "drop">
        <option value="CustomerName">Customer Name</option>
         <option value="BuildingName">Building Name</option>
        <option value="CustomerPhone">Customer Phone</option>
        <option value="CustomerLandline">Customer Landline</option>
         <option value="CustomerServiceProvider">Service Provider</option>
        <option value="CustomerStatus">Customer Status</option>
         <option value="Salesperson">Salesperson</option>
         
    </select><br>
    <br><button type="submit" class="button primary">Search</button>&ensp;&ensp;&ensp;<button type="submit" id="all" name="all" class="button primary">Show all data </button>
</form>

<?php

 @mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
 mysql_select_db("cyberiadb");
 
 
if (!empty($_REQUEST['term2'])) {

    $term2 = @mysql_real_escape_string($_REQUEST['term2']);  
    $drop = ($_REQUEST['drop']);  
$term3= ($_POST['term3']);
$salesperson= ($_POST['salesperson']);
    $sql ="SELECT * FROM customer WHERE ".$salesperson." LIKE '%".$term3."%'  AND  ".$drop." LIKE '%".$term2."%'" ; 
 $result2 = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
 $count=mysql_num_rows($result2);
 if ($count >0)   {  
	
	 $r_query = mysql_query($sql); 
	 

	 
	 echo "$count Records found";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Building Name</th>";
echo "<th>Customer Name</th>";
echo "<th>Customer Service</th>";
echo "<th>Customer Service Provider</th>";
echo "<th>Customer Floor</th>";
echo "<th>Customer Block</th>";
echo "<th>Customer Status</th>";
echo "<th>Customer Phone</th>";
echo "<th>Customer Landline</th>";
echo "<th>Notes</th>";
echo "<th>Sales Person</th>";
echo "<th>Date Created</th>";
echo "<th>Edited By</th>";
echo "<th>Date Edited</th>";
echo "<th>Actions</th>";



    while ($row = mysql_fetch_array($r_query)){ 

	echo "<tr>";
	 echo "<td>".$row["BuildingName"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerName"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerService"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerServiceProvider"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerFloor"]." </td>&ensp;&ensp;&ensp;<td> ".$row["CustomerBlock"]."<td>&ensp;&ensp;&ensp; ".$row["CustomerStatus"]."</td><td>".$row["CustomerPhone"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerLandline"]."</td>&ensp;&ensp;&ensp;<td>".$row["Notes"]."</td>&ensp;&ensp;&ensp;<td>".$row["Salesperson"]."</td>&ensp;&ensp;&ensp;<td>".$row["datecreated"]."</td>&ensp;&ensp;&ensp;<td>".$row["Editby"]."</td>&ensp;&ensp;&ensp;<td>".$row["dateedited"]."</td>";
	echo "<td> <a href= 'Edit-customer.php?eid=$row[9]'>Edit</a> |<a href= 'Delete-customer.php?did=$row[9]'>Delete</a> </td>";
	echo "</tr>";
 
	} echo "</table>";

  }
 else {
  die(" No data " . mysql_error());
}
}
 

	 else {	

 @mysql_connect("localhost","r6bygbsbx9ve","Khaywe_110");
 mysql_select_db("cyberiadb");
 $term3= ($_POST['term3']);
$salesperson= ($_POST['salesperson']);
if (isset($_POST['all']))  {
    $sql = "SELECT * FROM customer WHERE ".$salesperson." LIKE '%".$term3."%' ";  
 $result1 = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
 $count=mysql_num_rows($result1);
 if ($count >0)   {  
	
	 $r_query = mysql_query($sql); 
	 

	 
	 echo "$count Records found";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Building Name</th>";
echo "<th>Customer Name</th>";
echo "<th>Customer Service</th>";
echo "<th>Customer Service Provider</th>";
echo "<th>Customer Floor</th>";
echo "<th>Customer Block</th>";
echo "<th>Customer Status</th>";
echo "<th>Customer Phone</th>";
echo "<th>Customer Landline</th>";
echo "<th>Notes</th>";
echo "<th>Sales Person</th>";
echo "<th>Date Created</th>";
echo "<th>Edited By</th>";
echo "<th>Date Edited</th>";
echo "<th>Actions</th>";



    while ($row = mysql_fetch_array($r_query)){ 

	echo "<tr>";
	 echo "<td>".$row["BuildingName"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerName"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerService"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerServiceProvider"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerFloor"]." </td>&ensp;&ensp;&ensp;<td> ".$row["CustomerBlock"]."<td>&ensp;&ensp;&ensp; ".$row["CustomerStatus"]."</td><td>".$row["CustomerPhone"]."</td>&ensp;&ensp;&ensp;<td>".$row["CustomerLandline"]."</td>&ensp;&ensp;&ensp;<td>".$row["Notes"]."</td>&ensp;&ensp;&ensp;<td>".$row["Salesperson"]."</td>&ensp;&ensp;&ensp;<td>".$row["datecreated"]."</td>&ensp;&ensp;&ensp;<td>".$row["Editby"]."</td>&ensp;&ensp;&ensp;<td>".$row["dateedited"]."</td>";
	echo "<td> <a href= 'Edit-customer.php?eid=$row[9]'>Edit</a> |<a href= 'Delete-customer.php?did=$row[9]'>Delete</a> </td>";
	echo "</tr>";
 
	} echo "</table>";

  }

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
