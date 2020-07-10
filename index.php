<?php
// start/create a new session 
session_start();
$output = NULL;
//a session is a variable
//$_SESSION['logged_in'];

/*
if (!isset($_SESSION['logged_in'])) {
	# code...
	$output = "Welcome Guest <p />";
}
*/
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
	# code...
	header('location: welcome.php');
	exit();
}

//db_connection
require_once 'db_config.php';

//init variables;
$username = $password = NULL;

//process form data when submitted
if ($_SESSION['REQUEST_METHOD'] == 'POST') {
	# code...
	//check is username is empty
	if (empty(trim($_POST['username']))) {
		# code...
		$output = "Enter username!";
	}else{
		$username = trim($_POST['username']);
	}
	//check if password is empty
	if (empty(trim($_POST['password']))) {
		# code...
		$output = "Enter password!";
	}else {
		$password = trim($_POST['password']);
	}
	//validate credentials(username and password)
	if ($output =NULL) {
		# code...
		$run_sql = "SELECT id, username, password FROM admin WHERE username =?";
		if ($statement=mysqli_prepare($db_connect, $run_sql)) {
			# code...
			mysqli_stmt_para,($statement, 's', $param_username);
		}
	}

}

?>

<!DOCTYPE html>
<html>
	<head>
		<?php include "../elements/head.php"; ?>
	</head>
	<body>
		<div class="container">
			<?php require "../elements/header.php"; ?>


			<div class="login">
				<div class="adminreg">
					<h3>Admin Login</h3>
				</div>
				<form method="post">
					<table class="table table-striped">
						<tr>
							<td>Email:</td>
							<td><input type="email" name="email"></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="Password" name="password"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-success" type="submit">Login</button>
								<a href="register_admin.php"><button class="btn btn-danger">Register</button></a>
							</td>
						</tr>
					</table>
				</form>
			</div>

			
			<?php include "../elements/footer.php"; ?>	

		</div>
	</body>
</html>

<?php
/*
echo "Man's World!";
echo "<br />";
print "Hello World!";	


eCHo "<table border='1'>
		<tr>
			<td>TABLE</TD>
		</Tr>
	</taBLE>";
*/
?>
