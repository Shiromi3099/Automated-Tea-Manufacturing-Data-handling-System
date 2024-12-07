<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atmdhs";

// Create connection
$conn = new mysqli("localhost", "root", "", "atmdhs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["username"];
    $address = $_POST["address"];
    $cNum = $_POST["contact-number"];
    $uType = $_POST["user-type"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["confirm-password"];

    
    $sql = "INSERT INTO users (username, address, contact_number, user_type, email, Password, confirm_password)
            VALUES ('$uname', '$address', '$cNum', '$uType', '$email', '$password', '$cpassword')";

    if ($conn->query($sql) === true) {
        echo "<script>alert('User registered successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">   

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

   
</head>
<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-green p-4">
    <h5 class="text-white h4">Collapsed content</h5>
    <span class="text-muted">Toggleable via the navbar brand.</span>
  </div>
</div>
<nav class="navbar custom-navbar-color-green"></nav>
<nav class="navbar navbar-dark  bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="btn-group">
      <button class="btn btn-secondary btn-sm" type="button">
        Adminstrator
      </button>
      <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
      </button>
     
    </div>
  </div>
</nav>

<body>
  <script src="js/registration.js"></script>

    <div class="container-fluid">
      <div class="logo-container">
        <img src="img/l2.PNG" alt="logo" width="250">
      </div>
      <section class="h-70">
        <div class="container h-70">
        </div>
      </section>
    </div>
	<section class="h-70">
		<div class="container h-70">
			<div class="row justify-content-sm-left h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">User Account Creations</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<div class="mb-3">
                    <div class="mb-3">
                      <label class="mb-2 text-muted" for="username">User Name</label>
                      <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                      <div class="invalid-feedback" id="usernameValidationFeedback">
                          User Name is invalid
                      </div>
                  </div>
                  
                  <div class="mb-3">
                    <label class="mb-2 text-muted" for="address">Address</label>
                    <input id="address" type="text" class="form-control" name="address" value="" required autofocus>
                    <div class="invalid-feedback" id="addressValidationFeedback">
                        Address is invalid
                    </div>
                </div>
                
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="contact-number">Contact Number</label>
                  <input id="contact-number" type="text" class="form-control" name="contact-number" value="" required autofocus>
                  <div class="invalid-feedback" id="contactNumberValidationFeedback">
                      Please enter a valid contact number
                  </div>
              </div>
              
              <div class="mb-3">
                <label class="form-label select-label">User Type</label>
                <select class="form-control" id="user-type" name="user-type" required>
                    <option value="" disabled selected>Select User Type</option>
                    <option value="admin">Admin</option>
                    <option value="supplier">Supplier</option>
                    <option value="tea-buyer">Tea Buyer</option>
                    <option value="fo">F/O</option>
                    <option value="senior-fo">Senior F/O</option>
                    <option value="asst-fo1">Asst F/O 1</option>
                    <option value="asst-fo2">Asst F/O 2</option>
                    <option value="junior-fo1">Junior F/O 1</option>
                </select>
                <div class="invalid-feedback" id="userTypeValidationFeedback">
                    Please select a user type
                </div>
            </div>
            


            <div class="mb-3">
              <label class="mb-2 text-muted" for="email">Email</label>
              <input id="email" type="email" class="form-control" name="email" required autofocus>
                 <div class="invalid-feedback" id="emailValidationFeedback">
                  Email is invalid
              </div>
          </div>
          
          <div class="mb-3">
            <div class="mb-3">
                <div class="mb-2 w-100">
                    <label class="text-muted" for="password">Password</label>
                </div>
                <div class="password-toggle">
                  <input id="password" type="password" class="form-control" name="password" required>
                  <span class="toggle-icon" onclick="togglePasswordVisibility()">
                    <i class="far fa-eye-slash" id="toggleIcon"></i>
                  </span>
                </div>
                
                
            </div>
           
            <div class="invalid-feedback" id="passwordValidationFeedback">
                Password is required
            </div>
        </div>
        
        <div class="mb-3">
    <label class="mb-2 text-muted" for="confirm-password">Confirm Password</label>
    <input id="confirm-password" type="confirm-password" class="form-control" name="confirm-password" value="" required autofocus>
    <div class="invalid-feedback" id="confirmPasswordFeedback">
        Password is not matching
    </div>
</div>

      </div>
      
                                  
								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary ms-auto">
										create
									</button>
								</div>
							</form>
						</div>
                    </div>
                </div>
            </div>
        </div>>
 </section>


 

<script src="js/registration.js"></script>">

