<?php ;
echo '
<!DOCTYPE html>
<html>
<title>Craft Pop House</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css"href="style.css">
<script src="font.js" crossorigin="anonymous"></script>
<body>
<header>
	<div id="header-content">
	<div id="topheadnav">';
	session_start();

	if(isset($_SESSION["loginstatus"]) && $_SESSION["loginstatus"] === "Seller"){
		echo '<a href="sellingpage.php" id="sellingcentre">Seller Centre</a>';
	}
	else if(isset($_SESSION["loginstatus"]) && $_SESSION["loginstatus"] === "Admin"){

		echo 'Welcome';
	}else{
		echo '<a href="register.php" id="sellingcentre">Become a Seller</a>';
	}
	echo'
		<div class="loginbox">';
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		echo'<a href="profile.php" class="loginbutton">'.$_SESSION["username"].'</a><a href="logout.php" class="loginbutton"> | logout</a>';
		
	}else{
		echo'<a href="login.php" class="loginbutton">Login</a>';
		$website="login.php";
	}
	echo'
    </div>
	</div>
		<div id="website-logo">
			<img src="pic/logo.png" alt="logo" id="logo" onclick="location.href=\'homepage.php\'">
		</div>
		

	</div>
	
</header>';
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

$sql = "SELECT name, price, quantity,img FROM products";
$result = $conn->query($sql);
$keyword1;



$conn->close();
		
echo'

</div>
</div>


</body>
</html>';  ?>
