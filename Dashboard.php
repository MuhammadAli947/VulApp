<?PHP

$servername = "localhost";
$username = "root";
$password = "";

$UserName = '' ;
$Password = '' ;


$conn = new mysqli($servername, $username, $password, "vulapp");

if($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}
//echo "connected successfully". '<br>';

$message = "";

echo "Welcome to dashboard"."<br>";
echo $_GET['id']."<br>";
$ID = $_GET['id'];
$sql = "SELECT Id,Name,Username,Password from users where Id='$ID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$UserName = $row['Name'];
echo "User is ".$UserName ."<br>";



if(isset($_POST['submitButton']))
{
	$UserName = $_POST['name'];

	echo "<br><br><br>";
	$output = null;
	$retval = null;
	$command = "ping ".$UserName; 
	exec('$command',$output, $retval);

	echo "Returned with status $retval and output:\n";
	//print_r($output);
	foreach ($output as $value){
		echo "$valur <br>";
	
	}

}


?>
<html>

<body>
<form action="" method="POST">
 	Enter Host to ping: <input type="text" name="name"><br>
	<input type="submit" value="submit" name="submitButton">
</form>
</body>

</html>