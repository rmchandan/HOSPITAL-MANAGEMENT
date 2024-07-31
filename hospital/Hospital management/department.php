<html>
<body bgcolor='yellow'>
<?php
	$dbh = mysqli_connect('localhost', 'root','') or die(mysqli_error());
	mysqli_select_db($dbh,'hospital') or die(mysqli_error($dbh));
		$dept_id = $_REQUEST['dept_id'];
		$dept_name = $_REQUEST['dept_name'];
		$dept_head = $_REQUEST['dept_head'];
	


	$query = "INSERT INTO department VALUES('$dept_id','$dept_name','$dept_head')";
	$request = mysqli_query($dbh,$query) or die(mysqli_error($dbh));

$var=mysqli_query($dbh,"select * from department");
echo"<table border size=1>";
echo"<tr><th> dept_id</th> <th>dept_name</th> <th>dept_head</th></t</tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> </tr>";
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