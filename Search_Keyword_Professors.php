
<head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <style>

table

{

border-style:solid;

border-width:5px;

}

</style>
</head>

<?php

include "Connect.php";

$keywordfromform_Prof_SSN= $_GET["keyword_Prof_SSN"];
echo "Searching For: ". $keywordfromform_Prof_SSN;

 
//Search database for 88
echo "<h2> Professor Information </h2>";



$sql = "SELECT Section.Prof_SSN, Professor_Interface.Prof_Name, Professor_Interface.Title, 
Section.Classroom, Section.Meeting_Days, Section.Beginning_Time, Section.Ending_Time 
FROM Section INNER JOIN Professor_Interface 
ON Section.Prof_SSN = Professor_Interface.Prof_SSN 
WHERE Section.Prof_SSN LIKE '%".$keywordfromform_Prof_SSN."%' ";

$result = $mysqli->query($sql);

if ($keywordfromform_Prof_SSN == NULL) {
  while($row = $result->fetch_assoc()){
  echo "<table border='1'>
  <tr>
  <th>CWID</th>
  </tr>";
  echo "<tr>";
  echo "<td>" . $row['Prof_SSN'] . "</td>";
      echo "</tr>";
  }

  }else if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo "<table border='1'>

<tr>
<th>SSN</th>
<th>Title</th>
<th>Name</th>
<th>Classroom</th>
<th>Meeting Days</th>
<th>Beginning Time</th>
<th>Ending Time</th>
</tr>";
echo "<tr>";
  echo "<td>" . $row['Prof_SSN'] . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Prof_Name'] . "</td>";
  echo "<td>" . $row['Classroom'] . "</td>";
  echo "<td>" . $row['Meeting_Days'] . "</td>";
  echo "<td>" . $row['Beginning_Time'] . "</td>";
  echo "<td>" . $row['Ending_Time'] . "</td>";
  echo "</tr>";

  }
} 

?>

