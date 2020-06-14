<?php echo '
<!DOCTYPE html>
<html>
<title>Craft Pop House</title>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css"href="style.css">
<script src="font.js" crossorigin="anonymous"></script>
<body>

<header>
	<div id="header-content">
	<div id="topheadnav">
        Any title here
	</div>
		<div id="website-logo">
			<img src="pic/logo.png" alt="logo" id="logo" onclick="location.href=\'homepage.php\'">
		</div>


	</div>
	
</header>
<h1>Login Page</h1>';

Function connect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dp2";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}
$conn = connect();
$sql = "SELECT name, price, quantity,img FROM products";
$result = $conn->query($sql);
$keyword1;


		
echo'<form id="loginform" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
	<label for="username">Username: </label><br>
	<input type="text" name="username" class="logininput"><br><br>
	<label for="password">Password: </label><br>
	<input type="password" name="password" class="logininput"><br>
	<a href=" " class="forgot">forgot password?</a>
	<input type="submit" value="Login" id="login">
	<a href="register.php" id="register">Register</a>
</form>
</body>
</html>';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	test_input($_POST["username"],$_POST["password"]);
}

function test_input($username,$password) {
	$match = false;
	$id = 0;
	$username = trim($username);
	$password = trim($password);
	$conn = connect();
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["username"]==$username || $row["password"]==$password){
				$match = true;
				$id = $row["id"];
				$status = $row["status"];
			}
		}
	} else {
		echo "0 results";
	}
	if($match == true){
		session_start();
		$_SESSION["loggedin"] = true;
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["loginid"] = $id;
		$_SESSION["loginstatus"] = $status;
		if($status == "Seller"){
			header("refresh: 2; url=sellingpage.php");
		}else{
			header("refresh: 2; url=homepage.php");
		}
		
		
	}
}?>
