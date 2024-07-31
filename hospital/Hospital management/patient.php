<html>
<body bgcolor='yellow'>
<head>
<?php
	$dbh = mysqli_connect('localhost', 'root','') or die(mysqli_error());
	mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
		$patient_id = $_REQUEST['patient_id'];
		$patient_name = $_REQUEST['patient_name'];
		$patient_phone = $_REQUEST['patient_phone'];
		$patient_sex = $_REQUEST['patient_sex'];
		$patient_age = $_REQUEST['patient_age'];
		$patient_address = $_REQUEST['patient_address'];
		$problem = $_REQUEST['problem'];
		$doctor_id = $_REQUEST['doctor_id'];
	


	$query = "INSERT INTO patient VALUES('$patient_id','$patient_name','$patient_phone','$patient_sex','$patient_age','$patient_address','$problem','$doctor_id')";
	$request = mysqli_query($dbh,$query) or die(mysqli_error($dbh));

$var=mysqli_query($dbh,"select * from patient");
echo"<table border size=1>";
echo"<tr><th> patient_id</th> <th>patient_name</th> <th>patient_phone</th> <th>patient_sex</th> <th>patient_age</th> <th>patient_address</th> <th>problem</th> <th>doctor_id</th> </tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td> <td>$arr[4]</td> <td>$arr[5]</td> <td>$arr[6]</td> <td>$arr[7]</td> </tr>";
}
echo"</table>"; 
$db_host="localhost";
$db_name="temp";
$db_user="root";
$db_pass="";
$con = mysqli_connect("$db_host","$db_user","$db_pass") or die("could not connect");
mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
$rs=mysqli_query($dbh,'SELECT @out');
mysqli_close($con);
	
?>



</body>
</html>
<form>

<p><a href="home.html"> click here for home page:</a></p>
</form>