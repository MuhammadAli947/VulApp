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
if(isset($_POST['submitButton']))
{
	$UserName = $_POST['name'];
	$Password = $_POST['password'];

	//echo $UserName . '<br>';
	//echo $Password;
	//$sql = "SELECT Id,Name,Username,Password from users";
	$sql = "SELECT Id,Name,Username,Password from users where Name='$UserName'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($UserName == $row['Name'] && $Password == $row['Password']){
				$id = $row['Id'];
				header('Location: Dashboard.php?id='.$id);
			}
			//echo " ID:".$row['Id']. " Name: ".$row['Name']." Username: ".$row['Username']." Password: ".$row['Password']."<br>";
		}
		echo "Login Failed";
	
	}
	else
	{
		echo "NO Results";
	}	

}





?>
<html>

<body>
<form action="" method="POST">
 	Name: <input type="text" name="name"><br>
	Password: <input type="password" name="password"><br>
	<input type="submit" value="submit" name="submitButton">
</form>
</body>

</html>

	
