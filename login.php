<?php session_start(); 
include('dbconnection.php');
// Get session data
$storedData = isset($_SESSION['userData']) ? $_SESSION['userData'] : [];
//$userid = $storedData['userid'];

if(isset($_SESSION['userData'])){
	header('Location: productpage.php');
	exit();
}

// Get count number
$count = isset($_GET['count']) ? $_GET['count'] : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ecommerce</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section id="Login">
        <div class="container" style="height: 100%;width: 100%;">
            <div class="d-flex justify-content-center align-items-center" style="height: 100%;width: 100%;">
                <div class="login-form">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center align-items-center logo-div-img"><img class="login_img" src="assets/img/camp_logo.png"></div>
                        </div>
                        <div class="col">
                            <div>
    <?php 
if(isset($_POST['login'])){
	// Extract email and password
	$email = $_POST['email']; 
	$password = $_POST['password'];

	echo 'email: ' . $email . '<br>';
	echo 'password: ' . $password . '<br>';

	 $stmt1 = $conn ->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
	$stmt1->bind_param("ss", $email, $password);
	$stmt1->execute();
	$stmt1_results = $stmt1->get_result();
	if($stmt1_results->num_rows > 0) {
		$data = $stmt1_results->fetch_assoc();
		if($data['password'] === $password){
			// save user data in session
			$_SESSION['userData'] = [
	'userid' => $data['userid'],
	'password' => $data['password'],
	'fullname' => $data['fname'] . ' ' . $data['lname'],
	'email' => $data['email'],
	'role' => $data['role'],
	'address' => $data['address'],
		];

		$stmt1->close();
		$conn->close();

		// Redirect to productpage.php
			header('Location:productlist.php');
		}
		 
	}
	else {
			echo "<p style='color: red; font-style: italic;'>Invalid Username or Password</p>";
			$count++;
			echo '<p> Count = ' . $count . '</p>';
			if($count > 3){
				header('Location: registration.php');
				exit();
			}
		}
}
    ?>
        <div class="login-div-form" >
            <h2 style="text-align: center;">Account Login</h2>
            <form method="post" action="login.php?count=<?php echo $count;?>">
                <h2 class="visually-hidden">Login Form</h2>
                <div class="illustration"></div>
                <div class="mb-3"><input class="form-control" type="email" id="email" name="email" placeholder="Email"></div>
                <div class="mb-3"><input class="form-control" type="password" id="password" name="password" placeholder="Password"></div>
                <div class="mb-3"><input class="btn btn-primary d-block w-100" name="login" type="submit" value="Log In"></div><a class="forgot" href="#">Forgot your email or password?</a>
            </form>
        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php  ?>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imageupload.js"></script>
</body>

</html>