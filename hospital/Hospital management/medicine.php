<html>
<body bgcolor='yellow'>
<head>
<?php
	$dbh = mysqli_connect('localhost', 'root','') or die(mysqli_error());
	mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
		$medicine_no = $_REQUEST['medicine_no'];
        $medicine_name = $_REQUEST['medicine_name'];
        $patient_id = $_REQUEST['patient_id'];
	 $amount = $_REQUEST['amount'];

	$query = "INSERT INTO medicine VALUES('$medicine_no','$medicine_name','$patient_id','$amount')";
	$request = mysqli_query($dbh,$query) or die(mysqli_error($dbh));

$var=mysqli_query($dbh,"select * from medicine");
echo"<table border size=1>";
echo"<tr><th>Medicine No</th> <th>Medicine Name</th><th>Patient id</th><th>Amount</th></tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td> </tr>";
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