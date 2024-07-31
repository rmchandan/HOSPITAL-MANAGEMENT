<html>
<body bgcolor='yellow'>
<head>
<?php
	$dbh = mysqli_connect('localhost', 'root','') or die(mysqli_error());
	mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
		$doctor_id = $_REQUEST['doctor_id'];
		$doctor_name = $_REQUEST['doctor_name'];
		$doctor_phone = $_REQUEST['doctor_phone'];
		$doctor_sex = $_REQUEST['doctor_sex'];
		$doctor_address = $_REQUEST['doctor_address'];
		$doctor_specialisation = $_REQUEST['doctor_specialisation'];
		$dept_id = $_REQUEST['dept_id'];


	$query = "INSERT INTO doctor1 VALUES('$doctor_id','$doctor_name','$doctor_phone','$doctor_sex','$doctor_address','$doctor_specialisation','$dept_id')";
	$request = mysqli_query($dbh,$query) or die(mysqli_error($dbh));

$var=mysqli_query($dbh,"select * from doctor1");
echo"<table border size=1>";
echo"<tr><th> doctor_id</th> <th>doctor_name</th> <th>doctor_phone</th> <th>doctor_sex</th> <th>doctor_address</th> <th>doctor_specialisation</th> <th>dept_id</th> </tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td> <td>$arr[4]</td> <td>$arr[5]</td> <td>$arr[6]</td>  </tr>";
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
</head>
</body>
</html>
<form>

<p><a href="home.html"> click here for home page:</a></p>
</form>