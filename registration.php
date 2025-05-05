<?php session_start();
include('dbconnection.php');
if(isset($_SESSION['userData'])){
	// redirect to product page
	header('Location:productpage.php');
	exit();
} 


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
        <div class="login-div-form">
            <h2 style="text-align: center;">Account Registration</h2>
<form method="post" action="registration.php">
	<?php
// Enter data
if(isset($_POST['register'])){
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$role = $_POST['role'];
	$address = $_POST['address'];

	if($password1 === $password2){
		// Insert into database
		$stmt = $conn->prepare("INSERT INTO users(fname, email, password, role, address) VALUES (?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $fname, $email, $password1, $role, $address);
			$stmt->execute();
			echo "Registration Successfully...";
			$stmt->close();
			$conn->close();

			echo '<a href="login.php" class="btn btn-primary" >Go to Login Page</a>';
	} else {
		echo '<p style="color:red;">Passwords do not match</p>';
	}
}
	?>
    <h2 class="visually-hidden">Login Form</h2>
    <div class="illustration"></div>
    <div class="inputs"><label class="form-label" style="margin-bottom: .2rem;">Name:</label><input class="form-control" type="text" name="fname" id="fname" required></div>
    <div class="inputs"><label class="form-label" style="margin-bottom: .2rem;">Email:</label><input class="form-control" type="email" name="email" id="email" required></div>
    <div class="inputs"><label class="form-label" style="margin-bottom: .2rem;">Password:</label><input class="form-control" type="password" name="password1" id="password1" required></div>
    <div class="inputs"><label class="form-label" style="margin-bottom: .2rem;">Re-enter password:</label><input class="form-control" type="password" name="password2" id="password2" required></div>
    <div class="inputs"><label class="form-label" style="margin-bottom: .2rem;">Role:</label><select class="form-select" name="role" id="role">
        <optgroup label="This is a group">
            <option value="customer">Customer</option>
            <option value="buyer">Buyer</option>
        </optgroup>
    </select></div>
    <div class="inputs"><label class="form-label" style="margin-bottom: .2rem;">Address:</label><textarea class="form-control" name="address" id="address" required></textarea></div>
    <div class="mb-3"><input class="btn btn-primary d-block w-100" type="submit" name="register" id="register" value="Register"></div>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imageupload.js"></script>
</body>

</html>