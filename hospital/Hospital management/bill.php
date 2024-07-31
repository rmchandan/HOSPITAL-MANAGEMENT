<html>
<body bgcolor='yellow'>
<head>
<?php
	$dbh = mysqli_connect('localhost', 'root','') or die(mysqli_error());
	mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
		$bill_no = $_REQUEST['bill_no'];
        $patient_id = $_REQUEST['patient_id'];
        $amount = $_REQUEST['amount'];
	$tax=null;


	$query = "INSERT INTO bill VALUES ('$bill_no','$patient_id','$amount','$tax')";
	$request = mysqli_query($dbh,$query) or die(mysqli_error($dbh));

$var=mysqli_query($dbh,"select * from bill");
echo"<table border size=1>";
echo"<tr><th>Bill No</th> <th>Patient Id</th><th>Amount</th><th>Tax</th</tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td> </tr>";
}
echo"</table>"; 
$db_host="localhost";
$db_name="hospital";
$db_user="root";
$db_pass="";
$con = mysqli_connect("$db_host","$db_user","$db_pass") or die("could not connect");
mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
$p0=mysqli_query($dbh,"call total_amount(@out);");
$rs=mysqli_query($dbh,'SELECT @out');
while($row=mysqli_fetch_row($rs))
{
echo 'Total_Amount= '.$row[0];
}

echo "<br>";
mysqli_close($con);
echo"</table>"; 
$db_host="localhost";
$db_name="hospital";
$db_user="root";
$db_pass="";
$con = mysqli_connect("$db_host","$db_user","$db_pass") or die("could not connect");
mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
$p0=mysqli_query($dbh,"call total_tax(@out);");
$rs=mysqli_query($dbh,'SELECT @out');
while($row=mysqli_fetch_row($rs))
{
echo 'Total_Tax= '.$row[0];
}
mysqli_close($con);
?>
</head>
</body>
</html>
<form>

<p><a href="home.html"> click here for home page:</a></p>
</form>
<html>
Thank you
</html>